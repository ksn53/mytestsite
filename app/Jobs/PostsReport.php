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

    protected $postsCount;
    protected $usersCount;
    protected $newsCount;
    protected $tagsCount;
    protected $commentsCount;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $postsCount = null, $usersCount = null, $newsCount = null, $tagsCount = null, $commentsCount = null)
    {
        $this->postsCount = $postsCount;
        $this->usersCount = $usersCount;
        $this->newsCount = $newsCount;
        $this->tagsCount = $tagsCount;
        $this->commentsCount = $commentsCount;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new PostReportMail($this->postsCount, $this->usersCount, $this->newsCount, $this->tagsCount, $this->commentsCount));
    }
}
