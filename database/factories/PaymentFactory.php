<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'provider' => $this->faker->randomElement(['stripe', 'paypal', 'mobile_money']),
            'transaction_id' => strtoupper($this->faker->uuid()),
            'amount' => $this->faker->numberBetween(5000, 200000),
            'status' => 'success',
            'payload' => [
                'mock' => true,
            ],
        ];
    }
}
