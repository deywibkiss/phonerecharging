<?php

namespace App\Listeners;

use App\Events\RechargeDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RechargeDoneListener
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
     * @param  RechargeDone  $event
     * @return void
     */
    public function handle(RechargeDone $event)
    {
        $event->updatePhoneLineBalance();
    }

}
