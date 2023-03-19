<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
//exam generator
use App\Models\Generators\ExamGenerator;

class GenerateExam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $tipo_exam;
    public function __construct($tipo_exam = "A1")
    {
        $this->tipo_exam = $tipo_exam;
    }


    public function handle(): void
    {
        print "Start queue Generating exam";
        $generator = new ExamGenerator();
        $generator->generateExam($this->tipo_exam, true);

        print "End queue Generating exam";
    }
}
