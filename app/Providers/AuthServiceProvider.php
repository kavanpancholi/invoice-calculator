<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        $user = \Auth::user();

        // User Management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_profile', function ($user){
            return in_array($user->role_id, [2]);
        });

        // Auth gates for: Positions
        Gate::define('position_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('position_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('position_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('position_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('position_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Departments
        Gate::define('department_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('department_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('department_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('department_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('department_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Invoice
        Gate::define('invoice_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('invoice_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('invoice_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('invoice_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('invoice_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
