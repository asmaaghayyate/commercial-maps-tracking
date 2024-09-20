<?php

namespace App\Events\Api\V1;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
class TakeCommandEvent implements ShouldBroadcast
{
    
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public function __construct($message)
    {
        $this->message = $message;
    
    }

    public function broadcastOn()
    {
       
        return ["admin"];
    }

    public function broadcastAs()
    {
        $event = 'Take_new_commande';

        Log::info("Broadcasting to event: " . $event);
        return $event;
    }
}
