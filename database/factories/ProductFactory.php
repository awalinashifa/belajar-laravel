<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(5, 200) * 1000,
            'sku' => fake()->unique()->regexify('[A-Z0-9]{10}'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
