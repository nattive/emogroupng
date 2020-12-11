<?php

namespace App\Providers;

use App\Events\ContactUsEvent;
use App\Events\TransactionInitiatedEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        TransactionInitiatedEvent::class => [
            \App\Listeners\SendTrabsactionEmailListener::class,
            \App\Listeners\SendTransactionNotificationListener::class,
        ],
        ContactUsEvent::class => [
            \App\Listeners\MessengeSentListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
