<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'color' => $this->faker->safeColorName(),
            'weight' => $this->faker->randomFloat(2, 0.5, 5),
            'stock' => $this->faker->numberBetween(1, 50),
            'price' => $this->faker->numberBetween(5000, 100000),
            'image' => null,
        ];
    }
}
