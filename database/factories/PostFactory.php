<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'owner_id' => User::factory()->create(),
            'brief' => $this->faker->sentences(2, true),
            'content' => $this->faker->paragraph(2),
            'published' => 1,
            'slug' => $this->faker->lexify(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
