<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'customer',
            'remember_token' => str()->random(10),
        ];
    }

    public function admin()
    {
        return $this->state(fn () => ['role' => 'admin']);
    }

    public function vendor()
    {
        return $this->state(fn () => ['role' => 'vendor']);
    }

    public function customer()
    {
        return $this->state(fn () => ['role' => 'customer']);
    }
}
