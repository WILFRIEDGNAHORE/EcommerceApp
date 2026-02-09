<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        User::where('role', 'customer')->each(function ($user) use ($products) {
            Wishlist::factory()
                ->count(rand(3, 5))
                ->create([
                    'user_id' => $user->id,
                    'product_id' => $products->random()->id,
                ]);
        });
    }
}
