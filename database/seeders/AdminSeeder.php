<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
    ['email' => 'admin@sellzy.test'],
    [
        'name' => 'Super Admin',
        'password' => Hash::make('password'),
        'role' => User::ROLE_ADMIN,
        'email_verified_at' => now(),
    ]
);
    }
}
