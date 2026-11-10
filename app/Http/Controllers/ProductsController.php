<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $perPage = min($request->integer('per_page', 10), 50);
        $search = $request->query('search');

        $products = Product::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate($perPage);

        return ProductResource::collection($products);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = Product::create($request->all());

        return new ProductResource($data);
    }

    public function restore(string $id)
    {
        $data = Product::withTrashed()->findOrFail($id);
        $data->restore();

        return response()->json([
            'message' => 'Produk berhasil dipulihkan',
            'data' => new ProductResource($data)
        ]);
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

        return ProductResource::collection($data);
    }

}
