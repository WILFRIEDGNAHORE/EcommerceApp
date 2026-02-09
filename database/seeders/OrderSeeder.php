<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        User::where('role', 'customer')->each(function ($user) use ($products) {
            $addresses = Address::factory()->count(2)->create([
                'user_id' => $user->id,
            ]);

            Order::factory()
                ->count(rand(1, 3))
                ->create([
                    'user_id' => $user->id,
                    'shipping_address_id' => $addresses->first()->id,
                    'billing_address_id' => $addresses->last()->id,
                ])
                ->each(function ($order) use ($products) {
                    $total = 0;

                    OrderItem::factory()
                        ->count(rand(1, 4))
                        ->make()
                        ->each(function ($item) use ($order, $products, &$total) {
                            $product = $products->random();
                            $item->order_id = $order->id;
                            $item->product_id = $product->id;
                            $item->total = $item->quantity * $item->price;
                            $total += $item->total;
                            $item->save();
                        });

                    $order->update(['total_amount' => $total]);

                    if ($order->status === 'paid') {
                        Payment::factory()->create([
                            'order_id' => $order->id,
                            'amount' => $total,
                        ]);
                    }
                });
        });
    }
}
