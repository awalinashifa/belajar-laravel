
@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <h1>Tambah Produk</h1>
    <p>Masukkan informasi produk baru.</p>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama produk">

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>SKU</label>
            <input type="text" name="sku" value="{{ old('sku') }}" placeholder="Contoh: FNB001">

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
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
            <input type="number" name="price" value="{{ old('price') }}" placeholder="Masukkan harga">

            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Masukkan jumlah stok">

            @error('stock')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Produk
        </button>

        <a href="{{ route('produk.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </form>

@endsection
