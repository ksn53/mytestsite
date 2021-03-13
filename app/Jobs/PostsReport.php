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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostReportMail;

class PostsReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $showPostsCount;
    protected $showUsersCount;
    protected $showNewsCount;
    protected $showTagsCount;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($showPostsCount = null, $showUsersCount = null, $showNewsCount = null, $showTagsCount = null)
    {
        $this->showPostsCount = $showPostsCount;
        $this->showUsersCount = $showUsersCount;
        $this->showNewsCount = $showNewsCount;
        $this->showTagsCount = $showTagsCount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = Auth::user()->email;
        $postsCount = null;
        $usersCount = null;
        $newsCount = null;
        $tagsCount = null;
        if ($this->showPostsCount == 1) {
            $postsCount = Post::get()->count();
        }
        if ($this->showUsersCount == 1) {
            $usersCount = User::get()->count();
        }
        if ($this->showNewsCount == 1) {
            $newsCount = News::get()->count();
        }
        if ($this->showTagsCount == 1) {
            $tagsCount = Tag::get()->count();
        }
        $commentsCount = Comment::get()->count();
        Mail::to($email)->send(new PostReportMail($postsCount, $usersCount, $newsCount, $tagsCount));
    }
}
