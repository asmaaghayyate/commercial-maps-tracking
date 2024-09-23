<?php

namespace App\Events\Api\V1;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;

class AddLocationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $commandId;

    public function __construct($commandId)
    {
        $this->commandId = $commandId;
    }
    public function broadcastOn()
    {
        return ["admin"];
    }
    public function broadcastAs()
    {
        $event = 'new_location_' . $this->commandId;

        Log::info("Broadcasting to event: " . $event);
        return $event;
    }
}
