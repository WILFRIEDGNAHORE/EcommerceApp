<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        User::where('role', 'vendor')->each(function ($user) {
            Vendor::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
