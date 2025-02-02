<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SyncNews implements ShouldQueue
{
    use Queueable;

    private int $amount;
    /**
     * Create a new job instance.
     */
    public function __construct(int $amount)
    {
        //
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        sleep(10);
        Log::info($this->amount . 'news synsed');
    }
}
