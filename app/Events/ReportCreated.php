<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $posts, $users, $news, $tags, $comments;

    public function __construct($posts = null, $users = null, $news = null , $tags = null, $comments = null)
    {
        $this->posts = $posts;
        $this->users = $users;
        $this->news = $news;
        $this->tags = $tags;
        $this->comments = $comments;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('ReportCreated-channel');
    }

}