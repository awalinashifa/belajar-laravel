
@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

    <h1>Daftar Produk</h1>
    <p>Kelola data produk yang tersedia.</p>

    <a href="{{ route('produk.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->nama ?? '-' }}</td>
                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('produk.destroy', $product->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Belum ada data produk.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>

@endsection
