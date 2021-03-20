<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class PostUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('PostUpdate-channel');
    }
    public function broadcastWith()
    {
        $fields = '';
        foreach (json_decode($this->post->history->last()->pivot->after, true) as $key => $value) {
            $fields = $fields . " " . $key;
        }

        return ['title' => $this->post->title,
                'slug' => $this->post->slug,
                'fields' => $fields,
                ];
    }
}