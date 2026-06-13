<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penulis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan', 100);
            $table->string('nama_belakang', 100);
            $table->string('user_name', 50)->unique();
            $table->string('password');
            $table->string('foto');
        });

        Schema::create('kategori_artikel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100)->unique();
            $table->text('keterangan')->nullable();
        });

        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penulis')->constrained('penulis')->cascadeOnUpdate();
            $table->foreignId('id_kategori')->constrained('kategori_artikel')->cascadeOnUpdate();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar');
            $table->string('hari_tanggal', 50);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
        Schema::dropIfExists('kategori_artikel');
        Schema::dropIfExists('penulis');
    }
};

