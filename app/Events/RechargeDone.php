<?php

namespace App\Events;

use App\Recharge;
use App\PhoneLine;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RechargeDone
{
    use InteractsWithSockets, SerializesModels;

    public $recharge;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Recharge $recharge)
    {
        $this->recharge = $recharge;
    }


    public function updatePhoneLineBalance(){

        // Get a phoneLine model with the phone_number
        $phone_line = PhoneLine::where('phone_number', $this->recharge->phone_number)->first();

        // If exists, update
        if($phone_line != null ){
            $phone_line->balance += $this->recharge->value;

        // If not exists, insert
        } else {
            $phone_line = new PhoneLine;
            $phone_line->phone_number = $this->recharge->phone_number;
            $phone_line->balance = $this->recharge->value;
        }

        $phone_line->save();

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
