<?php

namespace App\Providers;

use App\Services\SmsSenderInterface;
use App\Services\SmsSenderServise;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SmsSenderInterface::class, function(){
            return new SmsSenderServise('89853018747', 'ghkggftfdtyj');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
