<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Orhanerday\OpenAi\OpenAi;

///testapi
use App\Models\TestApi;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test API openai';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $test = new TestApi();
        $prompt = 'Como profesor, vas a generar un exámen de inglés, solo la primera pregunta. Máximo 100 palabras';

        $response = $test->send($prompt);
        var_dump($response);
    }
}
