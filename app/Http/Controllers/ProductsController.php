<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $data = Product::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = Product::create($request->all());
        return response()->json($data, 201);
    }

    public function show(string $id)
    {
        $data = Product::find($id);
        return response()->json($data);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ]);
    }

    public function trashed()
    {
        $data = Product::onlyTrashed()->get();

        return response()->json($data);
    }
    
    public function restore(string $id)
    {
        $data = Product::withTrashed()->findOrFail($id);
        $data->restore();

        return response()->json([
            'message' => 'Produk berhasil dipulihkan',
            'data' => $data
        ]);
    }

}
