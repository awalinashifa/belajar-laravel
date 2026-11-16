<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Makanan',
            'Minuman',
            'Elektronik',
            'Peralatan',
            'Pakaian',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'nama' => $category,
            ]);
        }
    }
}
