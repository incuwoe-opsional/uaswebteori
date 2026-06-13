@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 fw-bold mb-0">Kelola Kategori</h1>
    <a class="btn btn-primary" href="{{ route('admin.kategori.create') }}">Tambah Kategori</a>
  </div>
  <div class="box table-responsive">
    <table class="table align-middle mb-0">
      <thead><tr><th>Nama</th><th>Keterangan</th><th>Artikel</th><th class="text-end">Aksi</th></tr></thead>
      <tbody>
        @foreach ($kategori as $item)
          <tr>
            <td class="fw-semibold">{{ $item->nama_kategori }}</td>
            <td>{{ $item->keterangan ?: '-' }}</td>
            <td>{{ $item->artikel_count }}</td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.kategori.edit', $item) }}">Edit</a>
              <form class="d-inline" method="post" action="{{ route('admin.kategori.destroy', $item) }}" onsubmit="return confirm('Hapus kategori ini?')">
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

