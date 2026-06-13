<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::query()->latest('id')->get();

        return view('admin.penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('admin.penulis.form', ['penulis' => new Penulis()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_depan' => ['required', 'max:100'],
            'nama_belakang' => ['required', 'max:100'],
            'user_name' => ['required', 'max:50', 'unique:penulis,user_name'],
            'password' => ['required', 'min:4'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['foto'] = $this->simpanFoto($request);
        Penulis::create($data);

        return redirect()->route('admin.penulis.index')->with('success', 'Data penulis berhasil ditambahkan.');
    }

    public function edit(Penulis $penuli)
    {
        return view('admin.penulis.form', ['penulis' => $penuli]);
    }

    public function update(Request $request, Penulis $penuli)
    {
        $data = $request->validate([
            'nama_depan' => ['required', 'max:100'],
            'nama_belakang' => ['required', 'max:100'],
            'user_name' => ['required', 'max:50', Rule::unique('penulis', 'user_name')->ignore($penuli->id)],
            'password' => ['nullable', 'min:4'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if (!$request->filled('password')) {
            unset($data['password']);
        }

        if ($request->hasFile('foto')) {
            $this->hapusFoto($penuli->foto);
            $data['foto'] = $this->simpanFoto($request);
        }

        $penuli->update($data);

        return redirect()->route('admin.penulis.index')->with('success', 'Data penulis berhasil diperbarui.');
    }

    public function destroy(Penulis $penuli)
    {
        if ($penuli->artikel()->exists()) {
            return back()->with('error', 'Penulis tidak dapat dihapus karena masih memiliki artikel.');
        }

        $this->hapusFoto($penuli->foto);
        $penuli->delete();

        return redirect()->route('admin.penulis.index')->with('success', 'Data penulis berhasil dihapus.');
    }

    private function simpanFoto(Request $request): string
    {
        if (!$request->hasFile('foto')) {
            return 'default.png';
        }

        $file = $request->file('foto');
        $nama = uniqid('foto_', true) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads_penulis'), $nama);

        return $nama;
    }

    private function hapusFoto(?string $nama): void
    {
        if ($nama && $nama !== 'default.png') {
            File::delete(public_path('uploads_penulis/' . $nama));
        }
    }
}

