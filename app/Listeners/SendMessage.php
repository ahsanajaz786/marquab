<?php

namespace App\Listeners;

use App\Events\MessagingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessage
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
     * @param  MessagingEvent  $event
     * @return void
     */
    public function handle(MessagingEvent $event)
    {
        //
    }
}
