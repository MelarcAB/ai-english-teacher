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

class ExamGenerator extends Model
{


    public function generateExam($level = "A1", $log = false)
    {

        ($log == true) ? print "Generando examen de nivel " . $level . "..." . PHP_EOL : null;
        //     print "Generando examen de nivel " . $level . "..." . PHP_EOL;

        //obtener ejemplo de examen
        $example_exam = (new ExamExamples())->getExampleExam($level);
        //inicio de examen
        $exam = new Exam();
        //usuario


        //check if user is logged in, if not, set user_id to 0
        if (Auth::check()) {
            $exam->user_id = Auth::user()->id;
        } else {
            $exam->user_id = 0;
        }



        $test_api = new TestApi();


        //Primero generamos el reading
        //generar texto a leer + 3 preguntas


        ($log == true) ? print "Generando texto de reading..." . PHP_EOL : null;
        $reading = $test_api->send(
            "Genera un texto totalmente distinto al anterior, con la misma estructura y número de palabras. Recuerda escribir siempre en inglés, ya que es parte de un examen.",
            '',
            $example_exam['EXAMPLE_READING']
        );


        $reading = json_decode($reading);
        $response_text = $reading->choices[0]->message->content;

        $exam->reading = $response_text;


        //generar preguntas de reading
        ($log == true) ? print "Generando preguntas de reading..." . PHP_EOL : null;
        $reading_questions = $test_api->send(
            "Genera, en INGLES, tres (3) preguntas de exámen para el texto anterior. LAS PREGUNTAS SEPARADAS POR  |.",
            '',
            "Texto del reading del examen: " . $exam->reading . "     EJEMPLO ESTRUCTURA PREGUNTAS(SOLO SON EJEMPLOS):" . $example_exam['EXAMPLE_READING_QUESTIONS']
        );



        $response = json_decode($reading_questions);
        //   var_dump($response);
        $response_text = $response->choices[0]->message->content;

        ($log == true) ? print "Preguntas de reading generadas: " . $response_text . PHP_EOL : null;

        //separar por || y guardar en array
        $questions = explode("|", $response_text);

        $exam->reading_question_1 = $questions[0];
        $exam->reading_question_2 = $questions[1];
        $exam->reading_question_3 = $questions[2];




        //Parte GRAMMAR / GRAMATICA -> generar 5 preguntas de gramatica
        ($log == true) ? print "Generando preguntas de gramática..." . PHP_EOL : null;
        $grammar_questions = $test_api->send(
            "GENERA EN INGLES 5 EJERCICIOS DE GRAMATICA. Solo una solución correcta. En este formato: Pregunta + opciones + '|' . Deben quedar separas las 5 generaciones por '|'",
            '',
            "EJEMPLO EJERCICIOS DE GRAMATICA(SOLO SON EJEMPLOS):" . $example_exam['GAMMAR_QUESTIONS']
        );

        $response = json_decode($grammar_questions);
        $response_text = $response->choices[0]->message->content;
        ($log == true) ? print "Preguntas de gramática generadas: " . $response_text . PHP_EOL : null;
        $questions = explode("|", $response_text);
        $exam->grammar_question_1 = $questions[0];
        $exam->grammar_question_2 = $questions[1];
        $exam->grammar_question_3 = $questions[2];
        $exam->grammar_question_4 = $questions[3];
        $exam->grammar_question_5 = $questions[4];


        // print "Guardando examen..." . PHP_EOL;
        ($log == true) ? print "Guardando examen..." . PHP_EOL : null;
        $exam->save();

        // print "Examen generado con éxito!" . PHP_EOL;
        ($log == true) ? print "Examen generado con éxito!" . PHP_EOL : null;
        // print "Examen generado con éxito!" . PHP_EOL;
        return $exam;
    }
}
