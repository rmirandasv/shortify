<?php

namespace App\Listeners;

use App\Events\PasswordReset;
use App\Mail\PasswordReseted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PasswordReset $event): void
    {
        Mail::to($event->user->email)->send(new PasswordReseted($event->user));
    }
}
