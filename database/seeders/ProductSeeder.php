<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        if ($categories->count() === 0) {
            $this->command->warn('Nenhuma categoria encontrada. Rode CategorySeeder antes.');
            return;
        }
        for ($i = 1; $i <= 20; $i++) {
            $cat = $categories->random();
            Product::create([
                'name' => "Produto $i",
                'description' => "Descrição do produto $i.",
                'image' => null,
                'price' => rand(1000, 10000) / 100,
                'category_id' => $cat->id,
                'status' => null,
            ]);
        }
    }
}
