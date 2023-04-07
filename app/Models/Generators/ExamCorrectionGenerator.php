<?php

namespace App\Models\Generators;

use App\Models\Exam;
use App\Models\ExamAnswers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//TestApi
use App\Models\TestApi;
//ExamCorrection
use App\Models\ExamCorrection;

class ExamCorrectionGenerator extends Model
{
  use HasFactory;


  public function correctExam(Exam $exam, ExamAnswers $examAnswers)
  {
    //set te exam on correction
    //status 3
    $exam->status = 3;
    $exam->save();

    $user = $examAnswers->user;
    $test_api = new TestApi($user->openai_token);
    //empezar a corregir
    print "Corrigiendo examen " . $exam->level . "..." . PHP_EOL;

    //instancia de examen correction  
    $examCorrection = new ExamCorrection();
    $examCorrection->exam_id = $exam->id;
    //user
    $examCorrection->user_id = $user->id;

    //reading 1.1 (texto + preguntas)
    //You're an english teacher. You're going to correct an exercice for an exam. You'll respond ONLY WITH a json with answer_1,2,3 array with correct(bool) and valoration (string). Exercice:  Read the text and answer the answers according to the text. 
    //obtener texto reading 1.1
    $reading_text = $exam->reading;
    print "Corrigiendo reading 1.1.(Preguntas de la lectura)" . PHP_EOL;
    $arr_reading_1 = [
      [
        "question" => $exam->question_1,
        "answer" => $examAnswers->reading_answer_1
      ],
      [
        "question" => $exam->question_2,
        "answer" => $examAnswers->reading_answer_2
      ],
      [
        "question" => $exam->question_3,
        "answer" => $examAnswers->reading_answer_3
      ]
    ];

    $idx = 1;
    $reading_1_score = 0;
    foreach ($arr_reading_1 as $read) {
      print "Corrigiendo pregunta " . $idx . "..." . PHP_EOL;
      $PROMPT = "FROM NOW You MUST answer ONLY in JSON FORMAT. You're going to valorate the user answers in an exam, you will correct it. Minimal reasoning.";
      $PROMPT .= "You're answer (JSON) format will have 'response' (array) with 'user_failed' (Bool. Value of whether the user's result is incorrect.) and 'valoration'(string: explanation in this format: 'Your choice was [USER CHOICE], the correct answer is [CORRECT CHOICE], because ...')";
      $PROMPT .= "The user will answer a question in relation to a previous text. His/her answer must be minimally elaborated and correct (in relation to the text). If the answer is empty, incorrect or too short, it will be counted as wrong.";
      $PROMPT .= "Before correcting, you will review the text and the user's response to give a correct verdict.";
      $PROMPT .= "\n TEXT: " . $reading_text . " \n";
      $PROMPT .= " EXERCICE: " . $read['question'] . " \n";
      $PROMPT .= " USER ANSWER: " . $read['answer'];
      $reading = $test_api->send($PROMPT);
      $reading = json_decode($reading);
      $response_text = json_decode($reading->choices[0]->message->content);
      $number_activity = 'reading_correction_' . $idx;
      $number_activity_text = 'reading_correction_' . $idx . '_text';
      $examCorrection->$number_activity = ($response_text->response[0]->user_failed ? 'WRONG' : 'OK');
      $examCorrection->$number_activity_text = $response_text->response[0]->valoration;
      if ($examCorrection->number_activity != "WRONG") {
        $reading_1_score++;
      }
      $idx++;
    }
    //guardar score reading 1.1
    $examCorrection->reading_score = $reading_1_score;
    print "Reading 1.1 score: " . $reading_1_score . PHP_EOL;
    //save exam correction
    //reading 1.2 (texto + true/false)

    print "Corrigiendo reading 1.2.(Verdadero o falso)" . PHP_EOL;

    $arr_true_false = [
      [
        "question" => $exam->reading_true_false_1,
        "answer" => $examAnswers->reading_true_false_answer_1
      ],
      [
        "question" => $exam->reading_true_false_2,
        "answer" => $examAnswers->reading_true_false_answer_2
      ],
      [
        "question" => $exam->reading_true_false_3,
        "answer" => $examAnswers->reading_true_false_answer_3
      ],
      [
        "question" => $exam->reading_true_false_4,
        "answer" => $examAnswers->reading_true_false_answer_4
      ],
      [
        "question" => $exam->reading_true_false_5,
        "answer" => $examAnswers->reading_true_false_answer_5
      ]
    ];

    $idx = 1;
    $reading_2_score = 0;

    foreach ($arr_true_false as $tof) {
      print "Corrigiendo verdadero/falso " . $idx . "..." . PHP_EOL;
      $PROMPT = "FROM NOW You MUST answer ONLY in JSON FORMAT. You're going to valorate the user answers in an exam, you have to correct it. Minimal reasoning.";
      $PROMPT .= "You're answer (JSON) format will have 'response[]' (array) with 'user_failed' (Bool. Value of whether the user's result is incorrect.) and 'valoration'(string: explanation in this format: 'Your choice was [USER CHOICE], the correct answer is [CORRECT CHOICE], because ...')";
      $PROMPT .= "The user taking the test must answer 'TRUE' or 'FALSE' to a statement about a text. Keep this in mind when correcting. if a user leaves a null answer, it will count as a wrong.";
      $PROMPT .= "\n TEXT: " . $reading_text;
      $PROMPT .= "\n STATEMENT: " . $tof['question'];
      //if user answer is null, it will be considered wrong, replace as NULL_ANSWER, 1=TRUE, 0=FALSE
      $user_answer = $tof['answer'];
      if ($user_answer == null) {
        $user_answer = "NULL_ANSWER";
      } else if ($user_answer == 1) {
        $user_answer = "TRUE";
      } else if ($user_answer == 2) {
        $user_answer = "FALSE";
      }
      $PROMPT .= "\n USER ANSWER: " . $user_answer;
      $reading = json_decode($test_api->send($PROMPT));
      $response_text = json_decode($reading->choices[0]->message->content);
      $number_activity = 'reading_true_false_correction_' . $idx;
      $number_activity_text = 'reading_true_false_correction_' . $idx . '_text';
      $examCorrection->$number_activity = ($response_text->response[0]->user_failed ? 'WRONG' : 'OK');
      $examCorrection->$number_activity_text = $response_text->response[0]->valoration;
      if ($examCorrection->$number_activity != "WRONG") {
        $reading_2_score++;
      }
      $idx++;
    }
    print "Reading 1.2 (verdadero/falso) score: " . $reading_2_score . PHP_EOL;
    //guardar score reading 1.2
    $examCorrection->reading_true_false_score = $reading_2_score;
    //grammar 2.1 (opcion correcta)
    //formato array para ejecutar el prompt para cada pregunta

    $gammar_questions1 = [
      ['question' => $exam->grammar_question_1, 'answer' => $examAnswers->grammar_answer_1],
      ['question' => $exam->grammar_question_2, 'answer' => $examAnswers->grammar_answer_2],
      ['question' => $exam->grammar_question_3, 'answer' => $examAnswers->grammar_answer_3],
      [
        'question' => $exam->grammar_question_4, 'answer' => $examAnswers->grammar_answer_4
      ]
    ];

    print "Correcting grammar 2.1 (opcion correcta)" . PHP_EOL;
    $score_grammar1 = 0;
    $idx = 1;
    foreach ($gammar_questions1 as $grammar) {
      print "Correcting grammar 2.1 (opcion correcta) " . $idx . "..." . PHP_EOL;
      $PROMPT = "FROM NOW You MUST answer ONLY in JSON FORMAT. You're going to valorate the user choices in an exam, you will correct it. Minimal reasoning.";
      $PROMPT .= "You're answer (JSON) format will have 'response' (array) with 'user_failed' (Bool. Value of whether the user's result is incorrect.) and 'valoration'(string: explanation in this format: 'Your choice was [USER CHOICE], the correct answer is [CORRECT CHOICE], because ...')";
      $PROMPT .= "The user will will choose one of the options. You will correct their choices. if a user leaves a null answer, it will count as a fault.";
      $PROMPT .= "Before correcting, you will review the text and the user's response to give a correct verdict.";
      $PROMPT .= " EXERCICE: " . $grammar['question'] . " \n";
      $PROMPT .= " USER ANSWER: " . $grammar['answer'];
      $correction_response = json_decode($test_api->send($PROMPT));
      $response_text = $correction_response->choices[0]->message->content;
      //copnvertir string a json
      $response_text = json_decode($response_text);

      //guardar correccion en la base de datos
      $number_activity = 'grammar_correction_' . $idx;
      $number_activity_text = 'grammar_correction_' . $idx . '_text';
      $examCorrection->$number_activity = ($response_text->response[0]->user_failed ? 'WRONG' : 'OK');
      $examCorrection->$number_activity_text = $response_text->response[0]->valoration;

      //sumar 1 al score si la respuesta es correcta
      if ($examCorrection->$number_activity == 'OK') {
        $score_grammar1++;
      }
      $idx++;
    }
    //guardar correccion en la base de datos
    $examCorrection->grammar_score = $score_grammar1;


    $arr_vocabulary =   [
      ['question' => $exam->vocabulary_question_1, 'answer' => $examAnswers->vocabulary_answer_1],
      ['question' => $exam->vocabulary_question_2, 'answer' => $examAnswers->vocabulary_answer_2],
      ['question' => $exam->vocabulary_question_3, 'answer' => $examAnswers->vocabulary_answer_3],
      ['question' => $exam->vocabulary_question_4, 'answer' => $examAnswers->vocabulary_answer_4],
      ['question' => $exam->vocabulary_question_5, 'answer' => $examAnswers->vocabulary_answer_5]
    ];

    //grammar 2.2 (vocabulary)
    print "Correcting grammar 2.2 (vocabulary)" . PHP_EOL;
    $score_vocabulary = 0;
    $idx = 1;
    foreach ($arr_vocabulary as $vocabulary) {
      print "Correcting grammar 2.2 (vocabulary) " . $idx . "..." . PHP_EOL;
      $PROMPT = "FROM NOW You MUST answer ONLY in JSON FORMAT. You're going to valorate the user choices in an exam, you have to correct it. Minimal reasoning.";
      $PROMPT .= "You're answer (JSON) format will have 'response' (array) with 'user_failed' (Bool. Value of whether the user's result is incorrect.) and 'valoration'(string: explanation in this format: 'Your choice was [USER CHOICE], the correct answer is [CORRECT CHOICE], because ...')";
      $PROMPT .= "The user will will choose one of the options. You will correct their choices. if a user leaves a null answer, it will count as a fault.";
      $PROMPT .= "Before correcting, you will review the text and the user's response to give a correct verdict.";
      $PROMPT .= " EXERCICE: " . $vocabulary['question'] . " \n";
      $PROMPT .= " USER ANSWER: " . $vocabulary['answer'];
      $correction_response = json_decode($test_api->send($PROMPT));
      $response_text = $correction_response->choices[0]->message->content;
      //copnvertir string a json
      $response_text = json_decode($response_text);
      //guardar correccion en la base de datos
      $number_activity = 'vocabulary_correction_' . $idx;
      $number_activity_text = 'vocabulary_correction_' . $idx . '_text';
      $examCorrection->$number_activity = ($response_text->response[0]->user_failed ? 'WRONG' : 'OK');
      $examCorrection->$number_activity_text = $response_text->response[0]->valoration;
      //sumar 1 al score si la respuesta es correcta
      if ($examCorrection->$number_activity == 'OK') {
        $score_vocabulary++;
      }
      $idx++;
    }

    //guardar correccion en la base de datos
    $examCorrection->vocabulary_score = $score_vocabulary;








    //writing 3.1 (texto a corregir)


    //save
    $examCorrection->save();
    $exam->status = 4;
    $exam->save();
  }
}
