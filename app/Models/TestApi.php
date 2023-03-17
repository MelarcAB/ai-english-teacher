<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orhanerday\OpenAi\OpenAi;


//exception
use Exception;

class TestApi extends Model
{
    private OpenAi $open_ai;

    private $MODEL = "gpt-3.5-turbo";

    //constructor
    public function __construct()
    {
        $this->open_ai = new OpenAi(env('OPENAI_API_KEY'));
    }

    public function send($prompt = "")
    {
        try {
            if ($prompt == "") {
                return [];
            }

            //  throw new Exception("Error Processing Request " . $prompt, 1);
            $complete = $this->open_ai->chat([
                'model' => $this->MODEL,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are ChatGPT, a large language model trained by OpenAI, based on the GPT-4 architecture. Your role is to act as Profesor Sigales, an English teacher who strictly answers questions related to English or Spanish. By default, you will speak in Spanish. As Profesor Sigales, you can also create exams or tests for users to practice their English.Your answer will be shown in html.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
                'temperature' => 1.0,
                'max_tokens' => 4000,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ]);
            return $complete;
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }
}
