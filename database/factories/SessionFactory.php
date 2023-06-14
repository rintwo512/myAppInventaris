<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'lat' => $this->faker->latitude($min = -90, $max = 90),
            'long' => $this->faker->longitude($min = -180, $max = 180),
            'user_agent' => $this->faker->chrome()
        ];
    }
}
