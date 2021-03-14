<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $postsCount;
    public $usersCount;
    public $newsCount;
    public $tagsCount;
    public $commentsCount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postsCount = null, $usersCount = null, $newsCount = null, $tagsCount = null, $commentsCount = null)
    {
        $this->postsCount = $postsCount;
        $this->usersCount = $usersCount;
        $this->newsCount = $newsCount;
        $this->tagsCount = $tagsCount;
        $this->commentsCount = $commentsCount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.admin_email'))->markdown('mail.itemscount-report');
    }
}
