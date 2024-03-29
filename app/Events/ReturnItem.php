<?php

namespace App\Events;

use \App\Item;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReturnItem
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * Item
     *
     * @var Item
     */
    public $item;

    /**
     * Create a new event instance.
     *
     * @param Item $item The returned item.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('touchedItem');
    }

    public function broadcastAs()
    {
        return 'ReturnItem';
    }
}
