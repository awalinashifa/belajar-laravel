
@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    <h1>Edit Produk</h1>
    <p>Perbarui informasi produk.</p>

    <form action="{{ route('produk.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name"
                   value="{{ old('name', $product->name) }}">

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>SKU</label>
            <input type="text" name="sku"
                   value="{{ old('sku', $product->sku) }}">

            @error('sku')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id">
                <option value="">-- Pilih Kategori --</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price"
                   value="{{ old('price', $product->price) }}">

            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock"
                   value="{{ old('stock', $product->stock) }}">

            @error('stock')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('produk.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </form>

@endsection
