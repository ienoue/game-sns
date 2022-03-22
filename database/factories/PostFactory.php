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
            'text' => preg_replace("/。/", "。\n\n", $this->faker->realText(150)),
            'created_at' => $this->faker->dateTimeBetween('-10days', '-7days'),
            'updated_at' => $this->faker->dateTimeBetween('-6days', '0days'),
        ];
    }
}
