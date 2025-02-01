<?php

namespace App\Providers;

use App\Events\NewsCreated;
use App\Events\NnewsHidden;
use App\Listeners\NnewsHiddenListener;
use App\Listeners\SendNewsCreatedNotification;
use App\Listeners\SendNewsToRemoteServer;
use App\Models\News;
use App\Models\Nnews;
use App\Observers\NewsObserver;
use App\Observers\NnewsObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewsCreated::class => [
            SendNewsCreatedNotification::class,
            SendNewsToRemoteServer::class
        ],
        NnewsHidden::class => [
            NnewsHiddenListener::class
        ]
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        News::observe(NewsObserver::class);
        Nnews::observe(NnewsObserver::class);
    }
}
