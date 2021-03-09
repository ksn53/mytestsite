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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postsCount)
    {
        $this->postsCount = $postsCount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.admin_email'))->markdown('mail.postcount-report');
    }
}
