# Laravel CRUD Manajemen Produk

Project ini merupakan tugas Ujian Tengah Semester (UTS) mata kuliah Pemrograman Berbasis Kerangka Kerja menggunakan framework Laravel.

Project ini dibuat untuk mengimplementasikan sistem manajemen produk dengan fitur CRUD (Create, Read, Update, Delete) serta relasi antara produk dan kategori.

## Fitur

- Menampilkan daftar produk.
- Menambahkan produk baru.
- Mengedit data produk.
- Menghapus produk menggunakan Soft Delete.
- Mengelola kategori produk.
- Relasi Category hasMany Product.
- Relasi Product belongsTo Category.
- Validasi input menggunakan Form Request.
- Validasi SKU agar tidak duplikat.
- Pagination pada daftar produk.
- Notifikasi keberhasilan dan pesan kesalahan validasi.

## Teknologi yang Digunakan

- PHP 8.3
- Laravel 13
- MySQL
- Blade Template
- HTML dan CSS

## Struktur Halaman

- `/produk` — Daftar produk
- `/produk/create` — Form tambah produk
- `/produk/{id}/edit` — Form edit produk

## Cara Menjalankan Project

1. Clone repository ini.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env`.
4. Sesuaikan konfigurasi database pada file `.env`.
5. Jalankan `php artisan key:generate`.
6. Jalankan migrasi database dan seeder sesuai konfigurasi project.
7. Jalankan `php artisan serve`.
8. Buka `http://127.0.0.1:8000/produk`.

## Mata Kuliah

Pemrograman Berbasis Kerangka Kerja
