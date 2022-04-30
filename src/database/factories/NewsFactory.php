<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'owner_id' => User::factory(),
            'brief' => $this->faker->sentences(2, true),
            'content' => $this->faker->paragraph(3),
            'published' => 1,
            'slug' => $this->faker->lexify(),
        ];
    }
}
