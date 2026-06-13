@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')
  <div class="row g-4">
    <article class="col-lg-8">
      <div class="box overflow-hidden">
        @if ($artikel->gambar)
          <img class="hero-img" src="{{ asset('uploads_artikel/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}">
        @endif
        <div class="p-4 p-md-5">
          <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <span class="badge badge-kategori rounded-pill">{{ $artikel->kategori->nama_kategori }}</span>
            <span class="meta">{{ $artikel->hari_tanggal }} oleh {{ $artikel->penulis->nama_lengkap }}</span>
          </div>
          <h1 class="fw-bold mb-4">{{ $artikel->judul }}</h1>
          <div class="isi-artikel">{{ $artikel->isi }}</div>
          <div class="mt-4 pt-3 border-top">
            <a class="btn btn-primary" href="{{ route('beranda') }}">Kembali ke Beranda</a>
          </div>
        </div>
      </div>
    </article>

    <aside class="col-lg-4">
      <div class="box p-4 sticky-lg-top" style="top:24px;">
        <h2 class="h5 fw-bold mb-3">Artikel Terkait</h2>
        @forelse ($terkait as $item)
          <a class="d-block py-3 border-top text-decoration-none text-dark" href="{{ route('artikel.show', $item) }}">
            <h3 class="h6 fw-bold mb-1">{{ $item->judul }}</h3>
            <div class="meta">{{ $item->hari_tanggal }}</div>
          </a>
        @empty
          <p class="text-secondary mb-0">Belum ada artikel lain pada kategori ini.</p>
        @endforelse
      </div>
    </aside>
  </div>
@endsection

