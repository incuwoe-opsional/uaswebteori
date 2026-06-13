@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 fw-bold mb-0">Kelola Artikel</h1>
    <a class="btn btn-primary" href="{{ route('admin.artikel.create') }}">Tambah Artikel</a>
  </div>
  <div class="box table-responsive">
    <table class="table align-middle mb-0">
      <thead><tr><th>Gambar</th><th>Judul</th><th>Kategori</th><th>Penulis</th><th>Tanggal</th><th class="text-end">Aksi</th></tr></thead>
      <tbody>
        @foreach ($artikel as $item)
          <tr>
            <td><img src="{{ asset('uploads_artikel/'.$item->gambar) }}" alt="{{ $item->judul }}" width="86" height="56" style="object-fit:cover;border-radius:8px;"></td>
            <td class="fw-semibold">{{ $item->judul }}</td>
            <td>{{ $item->kategori->nama_kategori }}</td>
            <td>{{ $item->penulis->nama_lengkap }}</td>
            <td>{{ $item->hari_tanggal }}</td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.artikel.edit', $item) }}">Edit</a>
              <form class="d-inline" method="post" action="{{ route('admin.artikel.destroy', $item) }}" onsubmit="return confirm('Hapus artikel ini?')">
                @csrf @method('delete')
                <button class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

