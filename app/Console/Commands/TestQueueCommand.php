<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateExam;

class TestQueueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test queue with multiple jobs';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        GenerateExam::dispatch('A1');
        GenerateExam::dispatch('A1');
        GenerateExam::dispatch('A1');
        GenerateExam::dispatch('A1');
        $this->info('4 jobs have been dispatched to the queue.');
    }
}
