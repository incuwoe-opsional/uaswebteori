@extends('layouts.app')

@section('title', $kategori->exists ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
  <div class="box p-4">
    <h1 class="h3 fw-bold mb-4">{{ $kategori->exists ? 'Edit Kategori' : 'Tambah Kategori' }}</h1>
    <form method="post" action="{{ $kategori->exists ? route('admin.kategori.update', $kategori) : route('admin.kategori.store') }}">
      @csrf
      @if ($kategori->exists) @method('put') @endif
      <div class="mb-3"><label class="form-label">Nama Kategori</label><input class="form-control" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required></div>
      <div class="mb-3"><label class="form-label">Keterangan</label><textarea class="form-control" name="keterangan" rows="4">{{ old('keterangan', $kategori->keterangan) }}</textarea></div>
      <button class="btn btn-primary">Simpan</button>
      <a class="btn btn-outline-secondary" href="{{ route('admin.kategori.index') }}">Batal</a>
    </form>
  </div>
@endsection

