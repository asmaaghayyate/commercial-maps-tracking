<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Command;
use App\Models\Commercial;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('addlocation', function (Commercial $commercial, Command $command) {
            return $commercial->id === $command->commercial_id;
        });
    }
}
