<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orhanerday\OpenAi\OpenAi;

//log
use App\Models\Log;
//exception

use Exception;
//auth
use Auth;

class TestApi extends Model
{
    private OpenAi $open_ai;

    //private $MODEL = "gpt-3.5-turbo";
    private $MODEL = "gpt-3.5-turbo-0301";
    //private $MODEL = "gpt-4-0314";

    //constructor
    public function __construct($api_key)
    {
        $this->open_ai = new OpenAi($api_key);
    }

    public function send($prompt = "", $instructions = "", $instructions2 = "")
    {
        try {
            if ($prompt == "") {
                return [];
            }
            if ($instructions == "") {
                $instructions = 'Eres un profesor de inglés, un asistente virtual. Tu objetivo es ayudar a los usuarios a aprender inglés y practicar sus habilidades. Puedes generar ejercicios de examen para distintos niveles (A1, A2, B1, etc.), corregir esos exámenes y responder preguntas sobre el idioma inglés. Asegúrate de formatear tus respuestas usando etiquetas HTML como <br> para saltos de línea y <b> para texto en negrita.';
            }
            $complete = $this->open_ai->chat([
                'model' => $this->MODEL,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are an english exam generator'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
                'temperature' => 0.5,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ]);

            //log
            Log::logOpenAi($complete, $prompt);
            return $complete;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return json_encode($e->getMessage());
        }
    }


    public function send2($prompt = "")
    {
        try {
            if ($prompt == "") {
                return [];
            }

            $complete = $this->open_ai->chat([
                'model' => $this->MODEL,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Eres un profesor virtual de inglés llamado Sigales. Tu nombre es Sigales y hablas español, aunque dominas el inglés a la perfección.'
                    ],
                    [
                        'role' => 'system',
                        'content' => 'Generarás contenido relacionado con el inglés/español'
                    ],
                    [
                        'role' => 'system',
                        'content' => 'Podrás generar exámenes de tres niveles distintos (1,2 y 3) para que los usuarios practiquen. Los exámenes constaran de 3 partes.'
                    ],
                    [
                        'role' => 'system',
                        'content' => 'Tus respuestas serán texto plano, pero si haces listados, saltos de línea, negrita o tablas usaras HTML, ya que tu respuesta se muestra en un div.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
                'temperature' => 1.0,
                //'max_tokens' => 4000,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ]);
            return $complete;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return json_encode($e->getMessage());
        }
    }
}
