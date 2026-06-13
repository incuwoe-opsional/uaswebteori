<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index(Request $request)
    {
        $kategoriAktif = (int) $request->query('kategori', 0);

        $kategori = KategoriArtikel::query()
            ->withCount('artikel')
            ->orderBy('nama_kategori')
            ->get();

        $artikel = Artikel::query()
            ->with(['penulis', 'kategori'])
            ->when($kategoriAktif > 0, fn ($query) => $query->where('id_kategori', $kategoriAktif))
            ->latest('id')
            ->limit(5)
            ->get();

        $namaKategoriAktif = $kategoriAktif
            ? optional($kategori->firstWhere('id', $kategoriAktif))->nama_kategori
            : null;

        return view('public.beranda', compact('artikel', 'kategori', 'kategoriAktif', 'namaKategoriAktif'));
    }

    public function show(Artikel $artikel)
    {
        $artikel->load(['penulis', 'kategori']);

        $terkait = Artikel::query()
            ->where('id_kategori', $artikel->id_kategori)
            ->whereKeyNot($artikel->id)
            ->latest('id')
            ->limit(5)
            ->get();

        return view('public.detail', compact('artikel', 'terkait'));
    }
}

