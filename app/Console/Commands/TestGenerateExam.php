<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//generar examen
use App\Models\Generators\ExamGenerator;


class TestGenerateExam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate_exam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Llama la funcion de generar examen';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $exam_generator = new ExamGenerator();
        $exam_generator->generateExam('A1', true);
    }
}
