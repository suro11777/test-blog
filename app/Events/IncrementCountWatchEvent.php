<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class IncrementCountWatchEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $article_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($article_id)
    {
        $this->article_id = $article_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
