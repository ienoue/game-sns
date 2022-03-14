<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => Post::factory(),
            'text' => $this->faker->realText(100),
            'created_at' => $this->faker->dateTimeBetween('-10days', '0days'),
        ];
    }
}
