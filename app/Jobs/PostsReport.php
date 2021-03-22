<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use App\Models\User;
use App\Models\News;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostReportMail;

class PostsReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $showPostsCount;
    protected $showUsersCount;
    protected $showNewsCount;
    protected $showTagsCount;
    protected $showCommentsCount;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $showPostsCount = null, $showUsersCount = null, $showNewsCount = null, $showTagsCount = null, $showCommentsCount = null)
    {
        $this->showPostsCount = $showPostsCount;
        $this->showUsersCount = $showUsersCount;
        $this->showNewsCount = $showNewsCount;
        $this->showTagsCount = $showTagsCount;
        $this->showCommentsCount = $showCommentsCount;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $postsCount = null;
        $usersCount = null;
        $newsCount = null;
        $tagsCount = null;
        $commentsCount = null;
        if ($this->showPostsCount) {
            $postsCount = Post::count();
        }
        if ($this->showUsersCount) {
            $usersCount = User::count();
        }
        if ($this->showNewsCount) {
            $newsCount = News::count();
        }
        if ($this->showTagsCount) {
            $tagsCount = Tag::count();
        }
        if ($this->showCommentsCount) {
            $commentsCount = Comment::count();
        }
        Mail::to($this->email)->send(new PostReportMail($postsCount, $usersCount, $newsCount, $tagsCount, $commentsCount));
    }
}
