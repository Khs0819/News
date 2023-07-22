<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'password' => $this->faker->password(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
