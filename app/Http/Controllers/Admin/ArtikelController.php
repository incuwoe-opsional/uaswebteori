<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::query()->with(['penulis', 'kategori'])->latest('id')->get();

        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('admin.artikel.form', [
            'artikel' => new Artikel(),
            'penulis' => Penulis::query()->orderBy('nama_depan')->get(),
            'kategori' => KategoriArtikel::query()->orderBy('nama_kategori')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_penulis' => ['required', 'exists:penulis,id'],
            'id_kategori' => ['required', 'exists:kategori_artikel,id'],
            'judul' => ['required', 'max:255'],
            'isi' => ['required'],
            'gambar' => ['required', 'image', 'max:2048'],
        ]);

        $data['gambar'] = $this->simpanGambar($request);
        $data['hari_tanggal'] = now()->locale('id')->translatedFormat('l, d F Y | H:i');
        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.form', [
            'artikel' => $artikel,
            'penulis' => Penulis::query()->orderBy('nama_depan')->get(),
            'kategori' => KategoriArtikel::query()->orderBy('nama_kategori')->get(),
        ]);
    }

    public function update(Request $request, Artikel $artikel)
    {
        $data = $request->validate([
            'id_penulis' => ['required', 'exists:penulis,id'],
            'id_kategori' => ['required', 'exists:kategori_artikel,id'],
            'judul' => ['required', 'max:255'],
            'isi' => ['required'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $this->hapusGambar($artikel->gambar);
            $data['gambar'] = $this->simpanGambar($request);
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $this->hapusGambar($artikel->gambar);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    private function simpanGambar(Request $request): string
    {
        $file = $request->file('gambar');
        $nama = uniqid('artikel_', true) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads_artikel'), $nama);

        return $nama;
    }

    private function hapusGambar(?string $nama): void
    {
        if ($nama) {
            File::delete(public_path('uploads_artikel/' . $nama));
        }
    }
}

