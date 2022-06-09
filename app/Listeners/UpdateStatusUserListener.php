<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UpdateStatusUserListener
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
     * @param Login $event
     * @return void
     */
    public function handleLogin(Login $event): void
    {
        $event->user->statusOnline();
    }

    public function handleLogout(Logout $event): void
    {
        $event->user->statusOffline();
    }
}
