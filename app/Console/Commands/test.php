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
        $response = $test->send("Hola dime quien eres");
        var_dump($response);
    }
}
