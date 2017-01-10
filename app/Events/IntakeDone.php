<?php

namespace App\Events;

use App\Intake;
use App\PhoneLine;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class IntakeDone
{
    use InteractsWithSockets, SerializesModels;

    public $intake;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Intake $intake)
    {
        $this->intake = $intake;
    }


    public function updatePhoneLineBalance(){

        // Get a phoneLine model with the phone_number
        $phone_line = PhoneLine::where('phone_number', $this->intake->phone_number)->first();

        // If exists, update
        if($phone_line != null ){
            $phone_line->balance -= $this->intake->total;

        // If not exists, insert
        } else {
            $phone_line = new PhoneLine;
            $phone_line->phone_number = $this->intake->phone_number;
            $phone_line->balance = $this->intake->total;
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
