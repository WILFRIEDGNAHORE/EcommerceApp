<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        User::where('role', 'customer')->each(function ($user) use ($products) {
            $cart = Cart::factory()->create([
                'user_id' => $user->id,
            ]);

            CartItem::factory()
                ->count(rand(2, 5))
                ->create([
                    'cart_id' => $cart->id,
                    'product_id' => $products->random()->id,
                ]);
        });
    }
}
