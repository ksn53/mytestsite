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
        Post::factory()->count(8)->create(['owner_id' => $user])->each(
            function(Post $post)
            {
                $post->tags()->saveMany(Tag::all()->random(3));
                Comment::factory()->count(2)->create(['post_id' => $post]);
            }
        );
    }
    public function createNews(User $user)
    {
        News::factory()->count(8)->create(['owner_id' => $user]);
    }
}
