<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $price = $this->faker->numberBetween(5000, 100000);

        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'short_description' => $this->faker->sentence(),
            'price' => $price,
            'original_price' => $price + $this->faker->numberBetween(1000, 5000),
            'stock' => $this->faker->numberBetween(1, 100),
            'featured' => $this->faker->boolean(20),
            'status' => 'active',
        ];
    }
}
