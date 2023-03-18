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


class ExamGenerator extends Model
{


    public function generateExam($level = "A1")
    {

        //     print "Generando examen de nivel " . $level . "..." . PHP_EOL;

        //obtener ejemplo de examen
        $example_exam = (new ExamExamples())->getExampleExam($level);
        //inicio de examen
        $exam = new Exam();

        $test_api = new TestApi();

        //Primero generamos el reading
        //generar texto a leer + 3 preguntas


        //  print "Generando reading..." . PHP_EOL;
        $reading = $test_api->send(
            "Genera un texto totalmente distinto al anterior, con la misma estructura y número de palabras. Recuerda escribir siempre en inglés, ya que es parte de un examen.",
            '',
            $example_exam['EXAMPLE_READING']
        );


        $reading = json_decode($reading);
        $response_text = $reading->choices[0]->message->content;

        $exam->reading = $response_text;
        // print "Generando preguntas..." . PHP_EOL;
        $reading_questions = $test_api->send(
            "Genera tres preguntas relacionadas al texto anterior. Preguntas obligatoriamente separadas por |.  Deben parecerse de ejemplo anteriores.",
            '',
            "Te muestro un texto de ejemplo y preguntas ajenas al texto. " . $example_exam['EXAMPLE_READING_QUESTIONS'] . "     " . $example_exam['EXAMPLE_READING_QUESTIONS']
        );

        $response = json_decode($reading_questions);
        //   var_dump($response);
        $response_text = $response->choices[0]->message->content;
        //separar por || y guardar en array
        $questions = explode("|", $response_text);

        $exam->reading_question_1 = $questions[0];
        $exam->reading_question_2 = $questions[1];
        $exam->reading_question_3 = $questions[2];


        // print "Guardando examen..." . PHP_EOL;
        $exam->save();

        // print "Examen generado con éxito!" . PHP_EOL;
        return $exam;
    }
}
