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


    public function generateExam($level = "A1", $log = false, $user_id = 0)
    {
        //si el examen es de nivel A1, B1, C1, etc, se genera un examen de A1
        if ($level == "A1" || $level == "B1" || $level == "C1" || $level == "A2" || $level == "B2" || $level == "C2") {
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
            "Genera 5 ejercicios de gramatica en ingles separados por |. Varias opciones (a,b,c,d) pero solo una solución correcta. Separados por el simbolo |",
            'ERES UN GENERADOR DE EJERCICIOS DE GRAMATICA. Generás preguntas + opciones + | . Ejemplo: Pregunta 1 + opciones + | + Pregunta 2 + opciones + | + Pregunta 3 + opciones + | + Pregunta 4 + opciones + | + Pregunta 5 + opciones + |',
            "EJEMPLO DE EJERCICIOS DE GRAMATICA Y FORMATO : " . $example_exam['GAMMAR_QUESTIONS']
        );

        $response = json_decode($grammar_questions);
        $response_text = $response->choices[0]->message->content;
        ($log == true) ? print "Preguntas de gramática generadas: " . $response_text . PHP_EOL : null;

        //verificar que las preguntas esten separadas por | y tienen 5 preguntas
        //count de preguntas, split por | y guardar en array
        $split = explode("|", $response_text);
        if (count($split) < 5) {
            // print "Error al generar las preguntas de gramática, se generaron " . count($split) . " preguntas, se esperaban 5" . PHP_EOL;
            ($log == true) ? print "Error al generar las preguntas de gramática, se generaron " . count($split) . " preguntas, se esperaban 5" . PHP_EOL : null;
            throw new \Exception("Error al generar las preguntas de gramática, se generaron " . count($split) . " preguntas, se esperaban 5");
        }

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
