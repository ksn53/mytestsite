<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        \App\Http\Controllers\Posts::class => App\Policies\PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(\Illuminate\Contracts\Auth\Access\Gate $gate)
    {
        $this->registerPolicies();
        $gate->before(function($user) {
            if ($user->id == 1) {
                return true;
            }
        });
        //
    }
}
