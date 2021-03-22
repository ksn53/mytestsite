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
use App\Models\User;
use App\Models\News;
use App\Models\Tag;
use App\Models\Comment;

class ReportCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $posts;
    public $users;
    public $news;
    public $tags;
    public $comments;
    protected $showPostsCount;
    protected $showUsersCount;
    protected $showNewsCount;
    protected $showTagsCount;
    protected $showCommentsCount;
    public function __construct($showPostsCount = null, $showUsersCount = null, $showNewsCount = null , $showTagsCount = null, $showCommentsCount = null)
    {
        $this->showPostsCount = $showPostsCount;
        $this->showUsersCount = $showUsersCount;
        $this->showNewsCount = $showNewsCount;
        $this->showTagsCount = $showTagsCount;
        $this->showCommentsCount = $showCommentsCount;
    }

    public function broadcastOn()
    {
        if ($this->showPostsCount) {
            $this->posts = Post::count();
        }
        if ($this->showUsersCount) {
            $this->users = User::count();
        }
        if ($this->showNewsCount) {
            $this->news = News::count();
        }
        if ($this->showTagsCount) {
            $this->tags = Tag::count();
        }
        if ($this->showCommentsCount) {
            $this->comments = Comment::count();
        }
        return new PrivateChannel('ReportCreated-channel');
    }

}