<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(5000, 100000),
        ];
    }
}
