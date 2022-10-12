<?php

namespace App\Providers;

use App\Events\NewProductEvent;
use App\Events\NewUserEvent;
use App\Listeners\AddToFrontPage;
use App\Listeners\NemokamasProduktas;
use App\Listeners\SendUsersEmailAboutProduct;
use App\Listeners\SendWelcomeEmail;
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
        NewProductEvent::class =>[
            SendUsersEmailAboutProduct::class,
           // AddToFrontPage::class,
            NemokamasProduktas::class
        ],
        NewUserEvent::class=>[
            SendWelcomeEmail::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
