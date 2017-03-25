<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

class SendMailFired
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $ClientInfo['user_data'] = $event->userDatas;

        Mail::send($ClientInfo['user_data']['viewTemplate'], $ClientInfo, function ($message) {

            $message->to('vaghasiyaravi.mobiosolutions@gmail.com')->subject('Client Contact Detail');

            $message->from('vaghasiyaravi.mobiosolutions@gmail.com','Monk Mad');

        });
    }
}
