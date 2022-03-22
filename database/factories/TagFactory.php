<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->realText($this->faker->numberBetween(10, 15)),
            'created_at' => $this->faker->dateTimeBetween('-10days', '0days'),
        ];
    }
}
