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
            ($log == true) ? print "Generando texto + preguntas de reading..." . PHP_EOL : null;
            $READING_PROMTP = "You have to answer in JSON format. ";
            $READING_PROMTP .= '{"text": YOUR_TEXT, "question_1":"QUESTION_1","question_2":"QUESTION_2","question_3":"QUESTION_3"} .';
            $READING_PROMTP .= 'Now you have to generate a text for an english exam and 3 questions related to it. For the reading part of the exam. Long and original text , can be a narration, letter, magazine post, new, etc. Text minimum 400 words. EXAM LEVEL : ' . $level;
            $reading = json_decode($test_api->send($READING_PROMTP));
            $response_text = json_decode($reading->choices[0]->message->content);
            $exam->reading =  $response_text->text;
            $exam->reading_question_1 = $response_text->question_1;
            $exam->reading_question_2 = $response_text->question_2;
            $exam->reading_question_3 = $response_text->question_3;

            $exam->save();
            ($log == true) ? print "Texto + preguntas de reading generadas: " . $exam->reading . PHP_EOL : null;

            exit;

            //reading TRUE OR FALSE sobre el texto
            ($log == true) ? print "Generando preguntas de reading TRUE OR FALSE..." . PHP_EOL : null;
            $reading_questions = $test_api->send(
                "Generate 5 sentences true or false (exam reading $level), split by |. Without answers.  " . $exam->reading . "     EXAMPLE STRUCTURE OF QUESTIONS:" . $example_exam['EXAMPLE_READING_QUESTIONS']
            );

            $response = json_decode($reading_questions);
            $response_text = $response->choices[0]->message->content;
            ($log == true) ? print "Preguntas de reading TRUE OR FALSE generadas: " . $response_text . PHP_EOL : null;
            //separar por | y guardar en array
            $questions = explode("|", $response_text);

            $exam->reading_true_false_1 = $questions[0];
            $exam->reading_true_false_2 = $questions[1];
            $exam->reading_true_false_3 = $questions[2];
            $exam->reading_true_false_4 = $questions[3];
            $exam->reading_true_false_5 = $questions[4];
            //descansar 1 segundo
            $exam->save();

            sleep(2);

            //Parte GRAMMAR / GRAMATICA -> generar 5 preguntas de gramatica
            ($log == true) ? print "Generando preguntas de gramática..." . PHP_EOL : null;
            $grammar_questions = $test_api->send(
                "Generates 4 grammar questions (grammar test level $level). Separated by |. With options, only one correct. Similar level to these: " . $example_exam['GAMMAR_QUESTIONS']
            );

            $response = json_decode($grammar_questions);
            $response_text = $response->choices[0]->message->content;
            ($log == true) ? print "Preguntas de gramática generadas: " . $response_text . PHP_EOL : null;

            //verificar que las preguntas esten separadas por | y tienen 5 preguntas
            //count de preguntas, split por | y guardar en array
            $split = explode("|", $response_text);
            if (count($split) < 2) {
                // print "Error al generar las preguntas de gramática, se generaron " . count($split) . " preguntas, se esperaban 5" . PHP_EOL;
                ($log == true) ? print "Error al generar las preguntas de gramática, se generaron " . count($split) . " preguntas, se esperaban 5" . PHP_EOL : null;
                throw new \Exception("Error al generar las preguntas de gramática, se generaron " . count($split) . " preguntas, se esperaban 5");
            }

            $questions = explode("|", $response_text);
            $exam->grammar_question_1 = $questions[0];
            $exam->grammar_question_2 = $questions[1];
            $exam->grammar_question_3 = $questions[2];
            $exam->grammar_question_4 = $questions[3];

            $exam->save();


            //descansar 1 segundo
            sleep(1);

            //writing
            ($log == true) ? print "Generando texto de writing..." . PHP_EOL : null;
            $writing = $test_api->send(
                "Generate a writing exercise for an $level English exam. I will show you an example but MAKE A TOTALLY DIFFERENT TEXT based on this: " . $example_exam['WRITING'] . ". ANSWER ONLY WITH THE EXERCICE"
            );

            $response = json_decode($writing);
            $response_text = $response->choices[0]->message->content;

            ($log == true) ? print "Texto de writing generado: " . $response_text . PHP_EOL : null;
            $exam->writing = $response_text;




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
