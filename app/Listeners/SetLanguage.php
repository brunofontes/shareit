<?php

namespace App\Listeners;

use App\User;
use Illuminate\Auth\Events\Login;
use IlluminateAuthEventsLogin;

class SetLanguage
{
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
     * @param  IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(Login $event)
    {
        session(['lang' => User::loggedIn()->language]);
        session()->save();
    }
}
