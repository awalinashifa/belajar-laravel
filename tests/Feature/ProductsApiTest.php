<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns product values from the database', function () {
    Product::factory()->create([
        'sku' => 'TEST-001',
        'name' => 'Produk Percobaan',
        'price' => 10000,
    ]);

    $this->getJson('/api/products')
        ->assertOk()
        ->assertJsonPath('data.0.sku', 'TEST-001')
        ->assertJsonPath('data.0.name', 'Produk Percobaan')
        ->assertJsonPath('data.0.price', 10000)
        ->assertJsonPath('data.0.price_format', 'Rp 10.000')
        ->assertJsonPath('data.0.stock', null);
});

it('returns a product by its id', function () {
    $product = Product::factory()->create([
        'sku' => 'TEST-002',
        'name' => 'Produk Detail',
        'price' => 25000,
    ]);

    $this->getJson("/api/products/{$product->id}")
        ->assertOk()
        ->assertJsonPath('data.sku', 'TEST-002')
        ->assertJsonPath('data.name', 'Produk Detail')
        ->assertJsonPath('data.price', 25000)
        ->assertJsonPath('data.price_format', 'Rp 25.000');
});
