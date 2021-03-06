<?php

namespace App\Listeners;

use App\Events\RegisterAlert;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserAlert;

class SendWelcomeEmail
{  
    use Notifiable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterAlert  $event
     * @return void
     */
    public function handle(RegisterAlert $event)
    {
        //
        $user = $event->user;
        $user->notify(new UserAlert());
    }
}
