<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Service\Pushall;

class PushAllServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pushall::class, function() {
            return new Pushall(config('services.pushall.key'), config('services.pushall.id'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
