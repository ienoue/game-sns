<?php

namespace Database\Factories;

use App\Models\Rarity;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonsterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->country(),
            'rarity_id' => Rarity::inRandomOrder()->first(),
            'image_path' => $this->faker->imageUrl(640, 480, 'monsters', true),
            'attack' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
