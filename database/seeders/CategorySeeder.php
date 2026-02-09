<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()
            ->count(5)
            ->create()
            ->each(function ($parent) {
                Category::factory()
                    ->count(rand(2, 3))
                    ->create([
                        'parent_id' => $parent->id,
                    ]);
            });
    }
}
