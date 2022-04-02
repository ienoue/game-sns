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
            'text' => preg_replace("/。/", "。\n", $this->faker->realText($this->faker->numberBetween(30, 200), 5)),
            'created_at' => $this->faker->dateTimeBetween('-30days', '-15days'),
            'updated_at' => $this->faker->dateTimeBetween('-14days', '0days'),
        ];
    }
}
