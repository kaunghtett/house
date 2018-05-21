<?php

namespace App\Providers;

use App\House;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerHousePolicies();
        $this->registerUserPolicies();
        //
    }

    public function registerHousePolicies()
    {
        Gate::define('show-house', function ($user) {
            return $user->hasAccess(['show-house']);
        });
        Gate::define('create-house', function ($user) {
            return $user->hasAccess(['create-house']);
        });
        Gate::define('update-house', function ($user, House $house) {
            return $user->hasAccess(['update-house']) or $user->id == $house->user_id;
        });
        Gate::define('delete-house', function ($user) {
            return $user->hasAccess(['delete-house']);
        });
        Gate::define('approve-house', function ($user) {
            return $user->hasAccess(['approve-house']);
        });
        Gate::define('block-house', function ($user) {
            return $user->hasAccess(['block-house']);
        });
        Gate::define('add-favourite', function ($user, House $house) {
            return $user->id != $house->user_id;
        });
    }

    public function registerUserPolicies()
    {
        Gate::define('delete-user', function ($user) {
            return $user->hasAccess(['delete-user']);
        });

        Gate::define('create-role', function($user) {
            return $user->hasAccess(['create-role']);
        });

    }
}
