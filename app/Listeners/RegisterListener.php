<?php

namespace App\Listeners;

use App\Events\LogoutEvent;
use App\Notifications\RegisterNotification;
use App\Notifications\LogoutNotification;
use Illuminate\Events\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\RegisterEvent;


class RegisterListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    
    /**
     * Handle user login events.
     */
    public function handleUserRegister( RegisterEvent $event): void {
        $event->user->notify(new RegisterNotification());
    }
 
    /**
     * Handle user logout events.
     */
    public function handleUserLogout(LogoutEvent $event): void {
        $event->user->notify(new LogoutNotification());
    }
 
    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            RegisterEvent::class => 'handleUserRegister',
            LogoutEvent::class => 'handleUserLogout',
        ];
    }
    /**
     * Handle the event.
     */
    public function handle(RegisterEvent $event): void
    {
        $event->user->notify( new RegisterNotification());
    }
}
