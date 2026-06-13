@extends('layouts.app')

@section('title', $artikel->exists ? 'Edit Artikel' : 'Tambah Artikel')

@section('content')
  <div class="box p-4">
    <h1 class="h3 fw-bold mb-4">{{ $artikel->exists ? 'Edit Artikel' : 'Tambah Artikel' }}</h1>
    <form method="post" enctype="multipart/form-data" action="{{ $artikel->exists ? route('admin.artikel.update', $artikel) : route('admin.artikel.store') }}">
      @csrf
      @if ($artikel->exists) @method('put') @endif
      <div class="row g-3">
        <div class="col-12"><label class="form-label">Judul</label><input class="form-control" name="judul" value="{{ old('judul', $artikel->judul) }}" required></div>
        <div class="col-md-6">
          <label class="form-label">Penulis</label>
          <select class="form-select" name="id_penulis" required>
            @foreach ($penulis as $item)
              <option value="{{ $item->id }}" @selected(old('id_penulis', $artikel->id_penulis) == $item->id)>{{ $item->nama_lengkap }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Kategori</label>
          <select class="form-select" name="id_kategori" required>
            @foreach ($kategori as $item)
              <option value="{{ $item->id }}" @selected(old('id_kategori', $artikel->id_kategori) == $item->id)>{{ $item->nama_kategori }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12"><label class="form-label">Isi Artikel</label><textarea class="form-control" name="isi" rows="8" required>{{ old('isi', $artikel->isi) }}</textarea></div>
        <div class="col-12"><label class="form-label">Gambar</label><input class="form-control" type="file" name="gambar" accept="image/*" {{ $artikel->exists ? '' : 'required' }}></div>
      </div>
      <div class="mt-4">
        <button class="btn btn-primary">Simpan</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.artikel.index') }}">Batal</a>
      </div>
    </form>
  </div>
@endsection

