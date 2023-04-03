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
    $test_api = new TestApi();

    $user = $examAnswers->user;
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
    $reading_question_1 = $exam->question_1;
    $reading_question_2 = $exam->question_2;
    $reading_question_3 = $exam->question_3;
    //obtener respuestas reading 1.1
    $reading_answer_1 = $examAnswers->reading_answer_1;
    $reading_answer_2 = $examAnswers->reading_answer_2;
    $reading_answer_3 = $examAnswers->reading_answer_3;

    print "Corrigiendo reading 1.1..." . PHP_EOL;
    //Primero generamos el reading
    //generar texto a leer + 3 preguntas
    $PROMPT = "FROM NOW You'll answer ONLY in JSON FORMAT. You're going to correct an exercice for an exam.";
    $PROMPT .= "You're answer format will have 'response' array with is_correct(bool) and valoration (string with the valoration of the answer) for each exercice.";
    $PROMPT .= "The user answer has to be related to the text. To give an answer as correct, the answer has to be minimally extensive and explanatory. An answer that is too short will be incorrect.";
    $PROMPT .= "Exercice:  Read the text and answer the answers according to the text.";
    $PROMPT .= " TEXT: " . $reading_text;
    $PROMPT .= "-  QUESTIONS: 1" . $reading_question_1 . " " . $reading_answer_1 . " -- 2" . $reading_question_2 . " " . $reading_answer_2 . " --3 " . $reading_question_3 . " " . $reading_answer_3;
    print "Enviando prompt: " . PHP_EOL;

    $reading = $test_api->send($PROMPT);
    print "Respuesta obtenida " . PHP_EOL;
    $reading = json_decode($reading);
    $response_text = $reading->choices[0]->message->content;
    //copnvertir string a json
    $response_text = json_decode($response_text);
    var_dump($response_text) . PHP_EOL;
    $score = 0;
    $examCorrection->reading_correction_1 = $response_text->response[0]->is_correct;
    $examCorrection->reading_correction_1_text = $response_text->response[0]->valoration;
    //$examCorrection->reading_correction_1 es true -> sumar 1 al score
    if ($examCorrection->reading_correction_1) {
      $score++;
    }

    print "Score: " . $score . PHP_EOL;
    print "Reading 1.1 corrected" . PHP_EOL;

    $examCorrection->reading_correction_2 = $response_text->response[1]->is_correct;
    $examCorrection->reading_correction_2_text = $response_text->response[1]->valoration;
    //$examCorrection->reading_correction_2 es true -> sumar 1 al score
    if ($examCorrection->reading_correction_2) {
      $score++;
    }

    $examCorrection->reading_correction_3 = $response_text->response[2]->is_correct;
    $examCorrection->reading_correction_3_text = $response_text->response[2]->valoration;
    //$examCorrection->reading_correction_3 es true -> sumar 1 al score
    if ($examCorrection->reading_correction_3) {
      $score++;
    }

    $examCorrection->reading_score = $score;


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

    //grammar 2.2 (vocabulary)

    //writing 3.1 (texto a corregir)


    //save
    $examCorrection->save();
    $exam->status = 4;
    $exam->save();
  }
}
