<?php

use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\PublicBlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicBlogController::class, 'index'])->name('beranda');
Route::get('/artikel/{artikel}', [PublicBlogController::class, 'show'])->name('artikel.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.penulis.index'))->name('dashboard');
    Route::resource('penulis', PenulisController::class)->except(['show']);
    Route::resource('kategori', KategoriController::class)->parameters(['kategori' => 'kategori'])->except(['show']);
    Route::resource('artikel', AdminArtikelController::class)->except(['show']);
});

