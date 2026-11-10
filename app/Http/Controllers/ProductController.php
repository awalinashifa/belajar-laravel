<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $data = Product::get();

        return response() ->json($data);
    }

    // Menampilkan detail produk berdasarkan ID
    public function show($id)
    {
        $produk = [
            1 => [
                'id' => 1,
                'nama' => 'Kopi Arabika',
                'harga' => 45000
            ],
            2 => [
                'id' => 2,
                'nama' => 'Teh Hijau',
                'harga' => 25000
            ],
            3 => [
                'id' => 3,
                'nama' => 'Cokelat',
                'harga' => 30000
            ],
        ];

        if (!isset($produk[$id])) {
            return response()->json([
                'pesan' => 'Produk tidak ditemukan'
            ], 404);
        }

        return response()->json($produk[$id]);
    }
}
