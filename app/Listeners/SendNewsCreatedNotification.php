<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNewsCreatedNotification
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
     * @param \App\Events\NewsCreated $event
     * @return false
     */
    public function handle(NewsCreated $event): bool
    {
        //
        Log::info('Send News created notification listener fired id ' . $event->news->id);
        return false;
    }
}
