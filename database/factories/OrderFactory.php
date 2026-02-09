<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_number' => strtoupper('ORD-' . $this->faker->unique()->bothify('####')),
            'total_amount' => 0,
            'status' => $this->faker->randomElement(['pending', 'paid', 'shipped']),
            'payment_method' => $this->faker->randomElement(['card', 'paypal', 'mobile_money']),
        ];
    }
}
