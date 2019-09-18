<?php

namespace App\Listeners;

use App\Events\AddJobAlert;
use App\Http\Controllers\AlertController;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPayEmail
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
     * @param  AddJobAlert  $event
     * @return void
     */
    public function handle(AddJobAlert $event)
    {
        //Log::info('TESTEVENT',['email' => $event->user_mail]);
        $sendemail = new AlertController();
        $sendemail->sendmail($event->user_mail,$event->user_name,$event->subject,$event->msg);
    }
}
