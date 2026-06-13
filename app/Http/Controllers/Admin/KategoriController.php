<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::query()->withCount('artikel')->orderBy('nama_kategori')->get();

        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.form', ['kategori' => new KategoriArtikel()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => ['required', 'max:100', 'unique:kategori_artikel,nama_kategori'],
            'keterangan' => ['nullable'],
        ]);

        KategoriArtikel::create($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(KategoriArtikel $kategori)
    {
        return view('admin.kategori.form', compact('kategori'));
    }

    public function update(Request $request, KategoriArtikel $kategori)
    {
        $data = $request->validate([
            'nama_kategori' => ['required', 'max:100', Rule::unique('kategori_artikel', 'nama_kategori')->ignore($kategori->id)],
            'keterangan' => ['nullable'],
        ]);

        $kategori->update($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriArtikel $kategori)
    {
        if ($kategori->artikel()->exists()) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih memiliki artikel.');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}

