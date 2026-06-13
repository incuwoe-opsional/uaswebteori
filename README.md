# Aplikasi Blog Laravel

Nama: Muhammad Irzya Tirtana
NIM: 240605110056

## Deskripsi

Aplikasi Blog Laravel adalah sistem manajemen konten untuk mengelola penulis, kategori artikel, dan artikel. Aplikasi ini juga menyediakan halaman pengunjung yang dapat diakses tanpa login untuk melihat lima artikel terbaru, memfilter artikel berdasarkan kategori, membuka detail artikel, dan membaca artikel terkait dari kategori yang sama.

## Fitur

- CRUD penulis di `/admin/penulis`.
- CRUD kategori artikel di `/admin/kategori`.
- CRUD artikel di `/admin/artikel`.
- Halaman utama pengunjung di `/`.
- Filter artikel berdasarkan kategori.
- Halaman detail artikel di `/artikel/{id}`.
- Widget artikel terkait dari kategori yang sama.

## Cara Menjalankan Lokal

1. Ekstrak proyek ke folder kerja, misalnya `C:/xampp/htdocs/aplikasi-blog-laravel`.
2. Buka terminal di folder proyek.
3. Jalankan `composer install`.
4. Salin `.env.example` menjadi `.env`.
5. Jalankan `php artisan key:generate`.
6. Buat database `db_blog` di phpMyAdmin.
7. Import file `db_blog.sql`.
8. Pastikan konfigurasi database di `.env` sesuai:
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=3307`
   - `DB_DATABASE=db_blog`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=`
9. Jalankan `php artisan serve`.
10. Buka `http://127.0.0.1:8000`.

## Video Demonstrasi

Tautan YouTube: isi tautan video demonstrasi di sini
https://youtu.be/bkgTBGmF43c?si=EcIq_CGEfL3X9n50
"# uaswebteori" 
