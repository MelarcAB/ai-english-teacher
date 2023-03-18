<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';
    protected $fillable = [
        'text',
        'prompt',
        'model',
        'prompt_tokens',
        'completion_tokens',
        'total_tokens',
    ];

    static public function log($prompt, $text, $model = '-', $prompt_tokens = '0', $completion_tokens = '0', $total_tokens = '0')
    {
        $log = new Log();

        $log->text = $text;

        $log->model = $model;
        $log->prompt = $prompt;
        $log->prompt_tokens = $prompt_tokens;
        $log->completion_tokens = $completion_tokens;
        $log->total_tokens = $total_tokens;
        $log->save();
    }


    static public function logOpenAi($response, $prompt = '-')
    {
        $response = json_decode($response);
        $log = new Log();

        $response_text = ($response->choices[0]->message->content);
        $promp_tokens = ($response->usage->prompt_tokens);
        $completion_tokens = ($response->usage->completion_tokens);
        $total_tokens = ($response->usage->total_tokens);

        $log->prompt = $prompt;
        $log->text = $response_text;
        $log->model = $response->model;
        $log->prompt_tokens = $promp_tokens;
        $log->completion_tokens = $completion_tokens;
        $log->total_tokens = $total_tokens;

        $log->save();

        // var_dump(($response->object));
    }
}
