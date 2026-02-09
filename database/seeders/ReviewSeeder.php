<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        OrderItem::all()->random(10)->each(function ($item) {
            Review::factory()->create([
                'product_id' => $item->product_id,
                'user_id' => $item->order->user_id,
            ]);
        });
    }
}
