<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products/trashed', [ProductsController::class, 'trashed']);
Route::patch('/products/{id}/restore', [ProductsController::class, 'restore']);
Route::resource('products', ProductsController::class);
Route::apiResource('categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Halo, Laravel!';
});

// Menampilkan nama dan NIM
Route::get('/about', function () {
    return 'Nama: Awalina Shifa Fi Yahya | NIM: 2455201008';
});

// Menampilkan daftar produk
Route::get('/product', [ProductController::class, 'index']);

// Menampilkan detail produk berdasarkan ID
Route::get('/product/{id}', [ProductController::class, 'show']);

// Menambahkan produk
Route::post('/product', function () {
    return 'Tambah produk';
});

// Mengubah produk
Route::put('/product/{id}', function ($id) {
    return 'Ubah produk #'.$id;
});

// Menghapus produk
Route::delete('/product/{id}', function ($id) {
    return 'Hapus produk #'.$id;
});
