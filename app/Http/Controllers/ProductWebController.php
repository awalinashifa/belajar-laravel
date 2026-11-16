<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('produk.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama')->get();

        return view('produk.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $validated['sku'] = $request->validate([
            'sku' => 'unique:products,sku'
        ])['sku'];

        Product::create($validated);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('nama')->get();

        return view('produk.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}