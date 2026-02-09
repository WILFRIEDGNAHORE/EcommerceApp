<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::whereNotNull('parent_id')->get();

        Vendor::all()->each(function ($vendor) use ($categories) {
            Product::factory()
                ->count(rand(5, 10))
                ->create([
                    'vendor_id' => $vendor->id,
                    'category_id' => $categories->random()->id,
                ])
                ->each(function ($product) {
                    ProductVariant::factory()
                        ->count(rand(0, 3))
                        ->create([
                            'product_id' => $product->id,
                        ]);
                });
        });
    }
}
