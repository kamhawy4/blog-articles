<?php

namespace App\Listeners;

use App\Events\EventTest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use App\Events\Event;
use App\Jobs\sendMailJob;


class EventListenerTest
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
     * @param  EventTest  $event
     * @return void
     */
    public function handle(EventTest $event)
    {
      dispatch(new sendMailJob());
      Log::info('=== TestEventListener  ========');
    }
}
