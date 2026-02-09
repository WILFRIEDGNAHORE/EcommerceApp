<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->admin()->create([
            'email' => 'admin@sellzy.test',
        ]);

        User::factory()->count(3)->vendor()->create();
        User::factory()->count(10)->customer()->create();
    }
}
