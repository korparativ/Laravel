<?php

namespace App\Listeners;

use App\Events\NnewsHidden;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NnewsHiddenListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NnewsHidden $event): void
    {
        //
        Log::info('Nnews' . $event->nnews->id . 'hidden');
    }
}
