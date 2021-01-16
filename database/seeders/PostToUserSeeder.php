<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class PostToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(10)->create();
        $user = User::factory()->count(2)->create();
        $this->createPosts($user[0]);
        $this->createPosts($user[1]);
    }

    public function createPosts(User $user)
    {
        Post::factory()->count(10)->create(['owner_id' => $user])->each(
            function(Post $post)
            {
                $post->tags()->saveMany(Tag::all()->random(3));
            }
        );
    }
}
