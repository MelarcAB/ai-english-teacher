<?php

namespace App\Models\Generators;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//exam
use App\Models\Exam;
//exam examples
use App\Models\Helpers\ExamExamples;

//testapi
use App\Models\TestApi;
//auth
use Auth;
//User
use App\Models\User;


class ExamGenerator extends Model
{


    public function generateExam($level, $log = false, $user_id = 0)
    {
        //si el examen es de nivel A1, B1, C1, etc, se genera un examen de A1
        if ($level == "A1" || $level == "B1" || $level == "C1" || $level == "A2" || $level == "B2" || $level == "C2") {
        } else {
            $level = "A1";
        }
        ($log == true) ? print "Generando examen de nivel " . $level . "..." . PHP_EOL : null;
        //obtener ejemplo de examen
        $example_exam = (new ExamExamples())->getExampleExam($level);

        //inicio de examen
        $exam = new Exam();
        $exam->level = $level;

        //check if user is logged in, if not, set user_id to 0
        if ($user_id != 0) {
            $exam->user_id = $user_id;
        }
        //obtener usuario
        $user = User::find($exam->user_id);

        //save exam
        $exam->save();
        try {
            $test_api = new TestApi($user->openai_token, $user->openai_model);
            //Primero generamos el reading
            //generar texto a leer + 3 preguntas
            ($log
                == true) ? print "Generando texto + preguntas de reading..." . PHP_EOL : null;
            $READING_PROMTP = "You have to answer in JSON format following this structure: ";
            $READING_PROMTP .= '{"text": YOUR_TEXT, "question_1":"QUESTION_1","question_2":"QUESTION_2","question_3":"QUESTION_3"} \n';
            $READING_PROMTP .= "Where A1 exam = easy, A2 = normal, B1 = hard \n";
            $READING_PROMTP .= 'Now you have to generate a text for an english exam and 3 questions related to it. For the reading part of the exam. Long and original text , can be a narration, letter, magazine post, new, etc. Text minimum 400 words. EXAM LEVEL : ' . $level;
            $reading = json_decode($test_api->send($READING_PROMTP));
            $response_text = json_decode($reading->choices[0]->message->content);
            $exam->reading =  $response_text->text;
            $exam->reading_question_1 = $response_text->question_1;
            $exam->reading_question_2 = $response_text->question_2;
            $exam->reading_question_3 = $response_text->question_3;

            $exam->save();
            ($log == true) ? print "Texto + preguntas de reading generadas: " . $exam->reading . PHP_EOL : null;


            //reading TRUE OR FALSE sobre el texto
            ($log == true) ? print "Generando preguntas de reading TRUE OR FALSE..." . PHP_EOL : null;
            $READING_TRUE_FALSE_PROMTP = "You have to answer in JSON format following this structure: ";
            $READING_TRUE_FALSE_PROMTP .= '{"sentence_1": YOUR_SENTENCE1,"sentence_2": YOUR_SENTENCE2,"sentence_3": YOUR_SENTENCE3,"sentence_4": YOUR_SENTENCE4,"sentence_5": YOUR_SENTENCE5, } \n';
            $READING_TRUE_FALSE_PROMTP .= "Where A1 exam = easy, A2 = normal, B1 = hard \n";
            $READING_TRUE_FALSE_PROMTP .= "You have to generate 5 sentences for a true or false english exam. EXAM LEVEL : " . $level . " \n";
            $READING_TRUE_FALSE_PROMTP .= "The sentences can be true or false, but they have to be related to the reading text. TEXT:\n";
            $READING_TRUE_FALSE_PROMTP .= $exam->reading;
            $reading_questions = json_decode($test_api->send($READING_TRUE_FALSE_PROMTP));
            $response_text = json_decode($reading_questions->choices[0]->message->content);

            $exam->reading_true_false_1 = $response_text->sentence_1;
            $exam->reading_true_false_2 = $response_text->sentence_2;
            $exam->reading_true_false_3 = $response_text->sentence_3;
            $exam->reading_true_false_4 = $response_text->sentence_4;
            $exam->reading_true_false_5 = $response_text->sentence_5;

            $exam->save();
            ($log == true) ? print "Preguntas de reading TRUE OR FALSE generadas: " . $exam->reading_true_false_1 . PHP_EOL : null;

            //Parte GRAMMAR / GRAMATICA -> generar 5 preguntas de gramatica
            ($log == true) ? print "Generando preguntas de gramática..." . PHP_EOL : null;
            $GAMMAR_QUESTIONS_PROMPT = "You have to answer in JSON format following this structure: ";
            $GAMMAR_QUESTIONS_PROMPT .= '{"question_1": YOUR_QUESTION1,"question_2": YOUR_QUESTION2,"question_3": YOUR_QUESTION3,"question_4": YOUR_QUESTION4,"question_5": YOUR_QUESTION5, } \n';
            $GAMMAR_QUESTIONS_PROMPT .= "Where A1 exam = easy, A2 = normal, B1 = hard \n";
            $GAMMAR_QUESTIONS_PROMPT .= "You have to generate 5 questions for a grammar english exam. EXAM LEVEL : " . $level . " \n";
            $GAMMAR_QUESTIONS_PROMPT .= "The questions have to be about english grammar. Here you have an example: \n";
            $GAMMAR_QUESTIONS_PROMPT .= $example_exam['GAMMAR_QUESTIONS'];
            $grammar_questions = json_decode($test_api->send($GAMMAR_QUESTIONS_PROMPT));
            $response_text = json_decode($grammar_questions->choices[0]->message->content);


            $exam->grammar_question_1 = $response_text->question_1;
            $exam->grammar_question_2 = $response_text->question_2;
            $exam->grammar_question_3 = $response_text->question_3;
            $exam->grammar_question_4 = $response_text->question_4;

            $exam->save();
            ($log == true) ? print "Preguntas de gramática generadas: " . $exam->grammar_question_1 . PHP_EOL : null;


            //writing
            ($log == true) ? print "Generando texto de writing..." . PHP_EOL : null;
            $WRITING_PROMPT = "You have to answer in JSON format following this structure: ";
            $WRITING_PROMPT .= '{"text": YOUR_TEXT} \n';
            $WRITING_PROMPT .= "Where A1 exam = easy, A2 = normal, B1 = hard \n";
            $WRITING_PROMPT .= "You have to generate a writing exercise for an $level English exam. \n";
            $WRITING_PROMPT .= "I will show you an example but MAKE A TOTALLY DIFFERENT TEXT based on this, with different plot: \n";
            $WRITING_PROMPT .= $example_exam['WRITING'];

            $writing = $test_api->send($WRITING_PROMPT);

            $response = json_decode($writing);
            $response_text = json_decode($response->choices[0]->message->content);

            $exam->writing = $response_text->text;
            $exam->save();

            ($log == true) ? print "Texto de writing generado: " . $exam->writing . PHP_EOL : null;




            //generar 5 frases de vocabulario
            ($log == true) ? print "Generando frases de vocabulario..." . PHP_EOL : null;
            //Generate 5 vocabulary sentences for an $level English exam separated by | . Based on this examples: I ___ my bike at the weekend. | This is a bad film. Turn ___ the TV! | Can you ___ that noise? | I can’t ___ my keys. SEPARATED BY |

            $vocabulary = $test_api->send(
                "Create 5 vocabulary exercises for an English examl IMPORTANT separated by | . Sentences with two options, only one option  correct. Structure like this: ' Mike ride a _[option1/option2] | ' EXAMPLES : " . $example_exam['VOCABULARY'] . ". YOU HAVE TO PUT | IN THE END OF EACH SENTENCE. "
            );

            $response = json_decode($vocabulary);
            $response_text = $response->choices[0]->message->content;
            ($log == true) ? print "Frases de vocabulario generadas: " . $response_text . PHP_EOL : null;
            //separar por |
            $questions = explode("|", $response_text);
            $exam->vocabulary_question_1 = $questions[0];
            $exam->vocabulary_question_2 = $questions[1];
            $exam->vocabulary_question_3 = $questions[2];
            $exam->vocabulary_question_4 = $questions[3];
            $exam->vocabulary_question_5 = $questions[4];

            // print "Guardando examen..." . PHP_EOL;
            ($log == true) ? print "Guardando examen..." . PHP_EOL : null;

            //status 1
            $exam->status = 1;
            $exam->save();
            // print "Examen generado con éxito!" . PHP_EOL;
            ($log == true) ? print "Examen generado con éxito!" . PHP_EOL : null;
            // print "Examen generado con éxito!" . PHP_EOL;
            return $exam;
        } catch (\Exception $e) {
            print("Error al guardar examen: " . $e->getMessage());
            //eliminar el examen
            $exam->delete();
        }
    }
}
