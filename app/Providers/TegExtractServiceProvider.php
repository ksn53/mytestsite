<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Service\TagExtract;

class TegExtractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagExtract::class, function() {
            return new TagExtract();
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
