<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DateTime;
use App\Mail\MessageAboutPosts;
use App\Models\User;
use App\Models\Post;

class SendNotificationAboutPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendAboutNewPosts {from} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправляет на почту всем пользователям список статей за указанный период. Пример аргументов 2021-01-07 2021-01-09';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = $this->argument('from');
        $to = $this->argument('to');
        $posts = Post::whereBetween('created_at', [$from, $to])->get();
        Mail::to(User::all()->pluck('email'))->queue(new MessageAboutPosts($posts));
    }
}
