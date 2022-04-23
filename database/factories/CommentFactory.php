<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = Post::inRandomOrder()->first();
        return [
            'user_id' => User::inRandomOrder()->first(),
            'post_id' => $post,
            'text' => preg_replace("/。/", "。\n", $this->faker->realText($this->faker->numberBetween(10, 100), 5)),
            'created_at' => $this->faker->dateTimeBetween($post->updated_at, '0days'),
            'updated_at' => $this->faker->dateTimeBetween($post->updated_at, '0days'),
        ];
    }
}
