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
    private $user_id;
    public function __construct($tipo_exam, $user_id)
    {
        $this->tipo_exam = $tipo_exam;
        $this->user_id = $user_id;
    }


    public function handle(): void
    {
        try {
            print "Start queue Generating exam";
            $generator = new ExamGenerator();
            $generator->generateExam($this->tipo_exam, true, $this->user_id);

            print "End queue Generating exam";
        } catch (\Exception $e) {
            print "Error generating exam" . PHP_EOL;
            //volver a poner el examen en la cola
            GenerateExam::dispatch($this->tipo_exam, $this->user_id);
            print "Se ha vuelto a poner el examen en la cola";
        }
    }
}
