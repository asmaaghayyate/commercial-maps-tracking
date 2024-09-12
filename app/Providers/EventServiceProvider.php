<?php

namespace App\Providers;

use App\Models\Facture;
use App\Models\Payement;
use App\Observers\FactureObserver;
use App\Observers\PayementObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Facture::observe(FactureObserver::class);
        Payement::observe(PayementObserver::class);
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
