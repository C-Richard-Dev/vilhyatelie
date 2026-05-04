<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Necessaire', 'slug' => 'necessaire', 'description' => 'Necessaires de vários tamanhos'],
            ['name' => 'Bolsa', 'slug' => 'bolsa', 'description' => 'Bolsas estilosas'],
            ['name' => 'Estojo', 'slug' => 'estojo', 'description' => 'Estojos para lápis e maquiagem'],
            ['name' => 'Mochila', 'slug' => 'mochila', 'description' => 'Mochilas infantis e adultas'],
            ['name' => 'Carteira', 'slug' => 'carteira', 'description' => 'Carteiras compactas'],
        ];
        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
