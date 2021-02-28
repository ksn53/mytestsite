<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;

class PostToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(8)->create();
        $user = User::factory()->count(2)->create();
        $this->createPosts($user[0]);
        $this->createPosts($user[1]);
        $this->createNews($user[0]);
        $this->createNews($user[1]);
    }

    public function createPosts(User $user)
    {
        Post::factory()->count(12)->create(['owner_id' => $user])->each(
            function(Post $post)
            {
                $post->tags()->saveMany(Tag::all()->random(3));
                $post->comments()->saveMany(Comment::factory()->count(2)->create());
            }
        );
    }
    public function createNews(User $user)
    {
        News::factory()->count(12)->create(['owner_id' => $user])->each(
            function(News $news)
            {
                $news->tags()->saveMany(Tag::all()->random(3));
                $news->comments()->save(Comment::factory()->create());
            }
        );
    }
}
