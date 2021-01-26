<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostCreated;
use App\Mail\PostCreated as PostCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Service\Pushall;

class SendPostCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        Mail::to($event->post->owner->email)->queue(new PostCreatedMail($event->post));
        app(Pushall::class)->send('Статья создана', $event->post->title);
    }

    public function sendPush(Pushall $pushall)
    {
        dd($pushall);
    }
}
