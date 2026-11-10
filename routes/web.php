<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route ::resource('products', ProductController::class);

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

// Menampilkan daftar kategori dalam format JSON
Route::get('/categories', function () {
    return response()->json([
        [
            'id' => 1,
            'nama' => 'Minuman',
        ],
        [
            'id' => 2,
            'nama' => 'Makanan',
        ],
        [
            'id' => 3,
            'nama' => 'Peralatan',
        ],
    ]);
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
    return 'Ubah produk #' . $id;
});

// Menghapus produk
Route::delete('/product/{id}', function ($id) {
    return 'Hapus produk #' . $id;
});
