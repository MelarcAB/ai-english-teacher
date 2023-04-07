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


  /**
   * 
   * promp que parece que funciona
   * 
   */

  /*
      "content": "You're going to correct an exam exercice. After that you'll will give a score out of 3. Exercice:The Haunted House The old abandoned house on the outskirts of town had always been a source of curiosity and fear for the locals. It was said to be haunted by the ghosts of the previous owners who had died in mysterious circumstances. As a dare, a group of teenagers decided to spend the night in the house to see if the rumors were true. As they entered the house, they felt a chill in the air and heard strange noises coming from the dark corners. They explored the dusty rooms and found old furniture and personal belongings left behind by the previous owners. Suddenly, they heard footsteps and saw shadows moving on the walls. They panicked and tried to leave, but the doors and windows were locked from the outside. As the night progressed, the teenagers experienced more and more paranormal activity. Doors opened and closed by themselves, objects moved on their own, and eerie voices whispered in their ears. They realized they were not alone in the house and that the ghosts were trying to communicate with them. In the morning, the teenagers were found huddled together in fear. They recounted their terrifying experience to the police and the locals, who were skeptical at first. However, when they investigated the house, they found evidence of supernatural activity and confirmed the presence of ghosts. The haunted house became a popular attraction for ghost hunters and thrill-seekers, who came from all over the world to experience the supernatural phenomena. The teenagers never forgot their night in the haunted house and were forever changed by their encounter with the unknown.1. What was the source of curiosity and fear for the locals about the old abandoned house? I think its the imagination 2. What did the group of teenagers find inside the house? A red flower.3. What paranormal activities did the teenagers experience throughout the night? A lot of ghosts"
*/

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
      var_dump($reading);
      $reading = json_decode($reading);
      $response_text = json_decode($reading->choices[0]->message->content);
      $number_activity = 'reading_correction_' . $idx;
      $number_activity_text = 'reading_correction_' . $idx . '_text';
      $examCorrection->number_activity = ($response_text->response[0]->user_failed ? 'WRONG' : 'OK');
      $examCorrection->$number_activity_text = $response_text->response[0]->valoration;
      if ($examCorrection->number_activity != "WRONG") {
        $reading_1_score++;
      }
      $idx++;
    }
    //guardar score reading 1.1
    $examCorrection->reading_score = $reading_1_score;
    //save exam correction


    //reading 1.2 (texto + true/false)
    $reading_true_false_1 = $exam->reading_true_false_1;
    $reading_true_false_2 = $exam->reading_true_false_2;
    $reading_true_false_3 = $exam->reading_true_false_3;
    $reading_true_false_4 = $exam->reading_true_false_4;
    $reading_true_false_5 = $exam->reading_true_false_5;

    //obtener respuestas reading 1.2
    //if null/0 -> no answer, 2 -> false, 1 -> true

    if (is_null($examAnswers->reading_true_false_answer_1)) {
      $reading_true_false_answer_1 = 'NO_ANSWER';
    } else {
      $reading_true_false_answer_1 = $examAnswers->reading_true_false_answer_1 == 1 ? 'TRUE' : 'FALSE';
    }

    if (is_null($examAnswers->reading_true_false_answer_2)) {
      $reading_true_false_answer_2 = 'NO_ANSWER';
    } else {
      $reading_true_false_answer_2 = $examAnswers->reading_true_false_answer_2 == 1 ? 'TRUE' : 'FALSE';
    }

    if (is_null($examAnswers->reading_true_false_answer_3)) {
      $reading_true_false_answer_3 = 'NO_ANSWER';
    } else {
      $reading_true_false_answer_3 = $examAnswers->reading_true_false_answer_3 == 1 ? 'TRUE' : 'FALSE';
    }

    if (is_null($examAnswers->reading_true_false_answer_4)) {
      $reading_true_false_answer_4 = 'NO_ANSWER';
    } else {
      $reading_true_false_answer_4 = $examAnswers->reading_true_false_answer_4  == 1 ? 'TRUE' : 'FALSE';
    }

    if (is_null($examAnswers->reading_true_false_answer_5)) {
      $reading_true_false_answer_5 = 'NO_ANSWER';
    } else {
      $reading_true_false_answer_5 = $examAnswers->reading_true_false_answer_5 == 1 ? 'TRUE' : 'FALSE';
    }

    //Primero generamos el reading
    //generar texto a leer + 3 preguntas
    $PROMPT = "FROM NOW You MUST answer ONLY in JSON FORMAT. You're going to valorate the user choices.Minimal reasoning.";
    $PROMPT .= "You're answer format will have 'response' (array) with 'user_failed' (Bool. Value of whether the user's result is incorrect.) and 'valoration'(string: explanation in this format: 'Your choice was [TRUE/FALSE/NULL], the correct answer is [TRUE/FALSE], because ...') for each exercice.";
    $PROMPT .= "The user will will choose true or false. You will correct their choices. if a user leaves a null answer, it will count as a fault.";
    $PROMPT .= "Before correcting, you will review the text and the user's response to give a correct verdict.";
    $PROMPT .= " TEXT: " . $reading_text;
    $PROMPT .= "-- USER ACTIVITY :  1 ." . $reading_true_false_1 . "  USER SAYS '" . $reading_true_false_answer_1 . "'. -- 2." . $reading_true_false_2 . "  USER SAYS '" . $reading_true_false_answer_2 . "' -- 3. " . $reading_true_false_3 . "  USER SAYS'" . $reading_true_false_answer_3 . "' -- 4. " . $reading_true_false_4 . "  USER  SAYS '" . $reading_true_false_answer_4 . "' -- 5. " . $reading_true_false_5 . "  USER SAYS'" . $reading_true_false_answer_5 . "'";
    $reading = $test_api->send($PROMPT);

    var_dump($PROMPT);
    $reading = json_decode($reading);
    $response_text = $reading->choices[0]->message->content;
    //copnvertir string a json
    $response_text = json_decode($response_text);
    var_dump($response_text);


    //recorrer el json y guardar en la base de datos en reading_true_false_correction_1
    $score = 0;
    $examCorrection->reading_true_false_correction_1 = ($response_text->response[0]->user_failed ? 'WRONG' : 'OK');
    $examCorrection->reading_true_false_correction_1_text = $response_text->response[0]->valoration;
    //$examCorrection->reading_true_false_correction_1 es true -> sumar 1 al score
    if ($examCorrection->reading_true_false_correction_1 == 'OK') {
      $score++;
    }

    $examCorrection->reading_true_false_correction_2 = ($response_text->response[1]->user_failed ? 'WRONG' : 'OK');
    $examCorrection->reading_true_false_correction_2_text = $response_text->response[1]->valoration;
    //$examCorrection->reading_true_false_correction_2 es true -> sumar 1 al score
    if ($examCorrection->reading_true_false_correction_2 == 'OK') {
      $score++;
    }

    $examCorrection->reading_true_false_correction_3 = ($response_text->response[2]->user_failed ? 'WRONG' : 'OK');
    $examCorrection->reading_true_false_correction_3_text = $response_text->response[2]->valoration;
    //$examCorrection->reading_true_false_correction_3 es true -> sumar 1 al score
    if ($examCorrection->reading_true_false_correction_3 == 'OK') {
      $score++;
    }

    $examCorrection->reading_true_false_correction_4 = ($response_text->response[3]->user_failed ? 'WRONG' : 'OK');
    $examCorrection->reading_true_false_correction_4_text = $response_text->response[3]->valoration;
    //$examCorrection->reading_true_false_correction_4 es true -> sumar 1 al score
    if ($examCorrection->reading_true_false_correction_4 == 'OK') {
      $score++;
    }

    $examCorrection->reading_true_false_correction_5 = ($response_text->response[4]->user_failed ? 'WRONG' : 'OK');
    $examCorrection->reading_true_false_correction_5_text = $response_text->response[4]->valoration;
    //$examCorrection->reading_true_false_correction_5 es true -> sumar 1 al score
    if ($examCorrection->reading_true_false_correction_5 == 'OK') {
      $score++;
    }

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

    print "Correcting grammar 2.1 (opcion correcta)";
    $score_grammar1 = 0;
    $idx = 1;
    foreach ($gammar_questions1 as $grammar) {
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
    print "Correcting grammar 2.2 (vocabulary)";
    $score_vocabulary = 0;
    $idx = 1;
    foreach ($arr_vocabulary as $vocabulary) {
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
