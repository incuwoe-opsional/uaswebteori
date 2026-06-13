@extends('layouts.app')

@section('title', $penulis->exists ? 'Edit Penulis' : 'Tambah Penulis')

@section('content')
  <div class="box p-4">
    <h1 class="h3 fw-bold mb-4">{{ $penulis->exists ? 'Edit Penulis' : 'Tambah Penulis' }}</h1>
    <form method="post" enctype="multipart/form-data" action="{{ $penulis->exists ? route('admin.penulis.update', $penulis) : route('admin.penulis.store') }}">
      @csrf
      @if ($penulis->exists) @method('put') @endif
      <div class="row g-3">
        <div class="col-md-6"><label class="form-label">Nama Depan</label><input class="form-control" name="nama_depan" value="{{ old('nama_depan', $penulis->nama_depan) }}" required></div>
        <div class="col-md-6"><label class="form-label">Nama Belakang</label><input class="form-control" name="nama_belakang" value="{{ old('nama_belakang', $penulis->nama_belakang) }}" required></div>
        <div class="col-md-6"><label class="form-label">Username</label><input class="form-control" name="user_name" value="{{ old('user_name', $penulis->user_name) }}" required></div>
        <div class="col-md-6"><label class="form-label">Password</label><input class="form-control" type="password" name="password" {{ $penulis->exists ? '' : 'required' }}></div>
        <div class="col-12"><label class="form-label">Foto</label><input class="form-control" type="file" name="foto" accept="image/*"></div>
      </div>
      <div class="mt-4">
        <button class="btn btn-primary">Simpan</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.penulis.index') }}">Batal</a>
      </div>
    </form>
  </div>
@endsection

