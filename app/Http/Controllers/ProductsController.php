<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->integer('per_page', 10), 50);
        $search = $request->query('search');

        $products = Product::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        })
            ->latest()
            ->paginate($perPage);

        return ProductResource::collection($products);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
        ]);
        $product = Product::create($data);
        return (new ProductResource($product))
        ->response()->setStatusCode(201);
    }

    public function restore(string $id)
    {
        $data = Product::withTrashed()->findOrFail($id);
        $data->restore();

        return response()->json([
            'message' => 'Produk berhasil dipulihkan',
            'data' => new ProductResource($data),
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'sku' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return new ProductResource($product);
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

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
