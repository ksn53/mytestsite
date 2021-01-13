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
        Post::factory()->count(4)->create(['owner_id' => User::factory()->create()->id])->each(function(Post $post){
            $post->tags()->saveMany(Tag::factory()->count(rand(1, 4))->make(['']));
        });
    }
}
