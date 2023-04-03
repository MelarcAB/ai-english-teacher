<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

//exam y exam answers
use App\Models\Exam;
use App\Models\ExamAnswers;
use App\Models\Generators\ExamCorrectionGenerator;

class ExamCorrection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private Exam $exam;
    private ExamAnswers $exam_answers;


    public function __construct(Exam $exam, ExamAnswers $exam_answers)
    {
        $this->exam = $exam;
        $this->exam_answers = $exam_answers;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        print "Start queue Correcting exam" . PHP_EOL;
        try {
            $exam_correction_generator = new ExamCorrectionGenerator();

            //verificar que las respuestas correspondan al examen
            $exam = $this->exam;
            $exam_answers = $this->exam_answers;

            if ($exam->id != $exam_answers->exam_id) {
                print "Error correcting exam: exam and exam answers do not match" . PHP_EOL;
                return;
            }

            $exam_correction_generator->correctExam($exam, $exam_answers);
        } catch (\Exception $e) {
            print "Error correcting exam" . PHP_EOL;
            //volver a poner la corrección en la cola
            ExamCorrection::dispatch($this->exam, $this->exam_answers);
            print "Se ha vuelto a poner la corrección en la cola" . PHP_EOL;
        }
    }
}
