@extends('layouts.app')

@section('title', 'Beranda Blog')

@section('hero')
  <header style="background:linear-gradient(135deg,#fff 0%,#e9f1ff 100%); border-bottom:1px solid #dce4f0; padding:42px 0;">
    <div class="container">
      <span class="badge badge-kategori rounded-pill mb-3">Halaman Pengunjung</span>
      <h1 class="fw-bold mb-2">Baca artikel terbaru dari penulis kami</h1>
      <p class="mb-0 text-secondary">Temukan tulisan terbaru dan pilih kategori sesuai topik yang ingin dibaca.</p>
    </div>
  </header>
@endsection

@section('content')
  <div class="row g-4">
    <section class="col-lg-8">
      <div class="mb-3">
        <h2 class="h4 fw-bold mb-1">{{ $namaKategoriAktif ? 'Kategori: '.$namaKategoriAktif : 'Artikel Terbaru' }}</h2>
        <p class="text-secondary mb-0">Menampilkan maksimal 5 artikel.</p>
      </div>

      @forelse ($artikel as $item)
        <article class="card-blog overflow-hidden mb-4">
          @if ($item->gambar)
            <img class="thumb" src="{{ asset('uploads_artikel/'.$item->gambar) }}" alt="{{ $item->judul }}">
          @endif
          <div class="p-4">
            <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
              <span class="badge badge-kategori rounded-pill">{{ $item->kategori->nama_kategori }}</span>
              <span class="meta">{{ $item->hari_tanggal }} oleh {{ $item->penulis->nama_lengkap }}</span>
            </div>
            <h3 class="h4 fw-bold">{{ $item->judul }}</h3>
            <p class="text-secondary">{{ $item->ringkasan }}</p>
            <a class="btn btn-primary" href="{{ route('artikel.show', $item) }}">Kelanjutannya</a>
          </div>
        </article>
      @empty
        <div class="box p-4">
          <h3 class="h5 mb-2">Belum ada artikel</h3>
          <p class="text-secondary mb-0">Silakan tambah artikel dari halaman admin terlebih dahulu.</p>
        </div>
      @endforelse
    </section>

    <aside class="col-lg-4">
      <div class="box p-4 sticky-lg-top" style="top:24px;">
        <h2 class="h5 fw-bold mb-3">Kategori Artikel</h2>
        <a class="kategori-link {{ $kategoriAktif === 0 ? 'aktif' : '' }}" href="{{ route('beranda') }}">
          <span>Semua Kategori</span><span class="meta">5 terbaru</span>
        </a>
        @foreach ($kategori as $item)
          <a class="kategori-link {{ $kategoriAktif === $item->id ? 'aktif' : '' }}" href="{{ route('beranda', ['kategori' => $item->id]) }}">
            <span>{{ $item->nama_kategori }}</span><span class="meta">{{ $item->artikel_count }}</span>
          </a>
        @endforeach
      </div>
    </aside>
  </div>
@endsection

