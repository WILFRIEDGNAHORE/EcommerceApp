<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'logo' => null,
            'status' => 'active',
            'rating' => $this->faker->randomFloat(1, 3, 5),
        ];
    }
}
