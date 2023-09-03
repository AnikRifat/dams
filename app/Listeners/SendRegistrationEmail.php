<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;



        // Send the email
        Mail::send('email.test', function ($message) use ($user) {
            $message->to($user->email)->speacialist('Welcome to Lekhapora - Your Learning Journey Begins!');
        });
    }
}
