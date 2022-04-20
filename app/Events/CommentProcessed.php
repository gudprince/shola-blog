<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;
    public $user;
    public $commenter_name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post, $user, $commenter_name)
    {
        $this->post = $post;
        $this->user = $user;
        $this->commenter_name = $commenter_name;
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
