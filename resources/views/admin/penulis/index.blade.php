@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 fw-bold mb-0">Kelola Penulis</h1>
    <a class="btn btn-primary" href="{{ route('admin.penulis.create') }}">Tambah Penulis</a>
  </div>
  <div class="box table-responsive">
    <table class="table align-middle mb-0">
      <thead><tr><th>Foto</th><th>Nama</th><th>Username</th><th class="text-end">Aksi</th></tr></thead>
      <tbody>
        @foreach ($penulis as $item)
          <tr>
            <td><img src="{{ asset('uploads_penulis/'.$item->foto) }}" alt="{{ $item->nama_lengkap }}" width="56" height="56" style="object-fit:cover;border-radius:8px;"></td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->user_name }}</td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.penulis.edit', $item) }}">Edit</a>
              <form class="d-inline" method="post" action="{{ route('admin.penulis.destroy', $item) }}" onsubmit="return confirm('Hapus penulis ini?')">
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

