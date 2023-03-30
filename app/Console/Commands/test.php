<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateExam;

use Orhanerday\OpenAi\OpenAi;

//examcorrectiongenerator
use App\Models\Generators\ExamCorrectionGenerator;

///testapi
use App\Models\TestApi;
//exam y exam answers
use App\Models\Exam;
use App\Models\ExamAnswers;

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
        /*  $test = new TestApi();
        $prompt = 'que tal';

        $response = $test->send($prompt);
        var_dump($response);*/

        //test poner examen en cola
        // GenerateExam::dispatch("A1");

        //test exam correction generator
        $exam_correction_generator = new ExamCorrectionGenerator();
        //examen 3 y correccion 3
        $exam = Exam::find(3);
        //exam answers find 3
        $exam_answers = ExamAnswers::find(3);
        $exam_correction_generator->correctExam($exam, $exam_answers);
    }
}
