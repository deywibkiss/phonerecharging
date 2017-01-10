<?php

namespace App\Listeners;

use App\Events\IntakeDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IntakeDoneListener
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
     * @param  IntakeDone  $event
     * @return void
     */
    public function handle(IntakeDone $event)
    {
        $event->updatePhoneLineBalance();
    }
}
