<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Aplikasi Blog')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root { --utama:#2563eb; --gelap:#172033; --lembut:#f4f7fb; --garis:#dce4f0; }
    body { background:var(--lembut); color:var(--gelap); font-family:Arial, Helvetica, sans-serif; }
    .topbar { background:#fff; border-bottom:1px solid var(--garis); }
    .brand { color:var(--utama); font-weight:800; text-decoration:none; }
    .box, .card-blog { background:#fff; border:1px solid var(--garis); border-radius:8px; box-shadow:0 10px 30px rgba(23,32,51,.06); }
    .thumb { aspect-ratio:16/9; background:#dce8f8; object-fit:cover; width:100%; }
    .hero-img { aspect-ratio:16/8; background:#dce8f8; object-fit:cover; width:100%; }
    .meta { color:#667085; font-size:.9rem; }
    .badge-kategori { background:#e8f0ff; color:#1d4ed8; border:1px solid #c7dbff; }
    .kategori-link { align-items:center; border-radius:8px; color:var(--gelap); display:flex; justify-content:space-between; padding:10px 12px; text-decoration:none; }
    .kategori-link:hover, .kategori-link.aktif { background:#e8f0ff; color:#1d4ed8; }
    .isi-artikel { color:#344054; font-size:1.05rem; line-height:1.8; white-space:pre-line; }
    .nav-admin a { color:#344054; font-weight:600; text-decoration:none; }
    .nav-admin a:hover { color:var(--utama); }
  </style>
</head>
<body>
  <nav class="topbar py-3">
    <div class="container d-flex flex-wrap gap-3 justify-content-between align-items-center">
      <a class="brand fs-4" href="{{ route('beranda') }}">Aplikasi Blog</a>
      <div class="nav-admin d-flex gap-3">
        <a href="{{ route('beranda') }}">Beranda</a>
        <a href="{{ route('admin.penulis.index') }}">Penulis</a>
        <a href="{{ route('admin.artikel.index') }}">Artikel</a>
        <a href="{{ route('admin.kategori.index') }}">Kategori</a>
      </div>
    </div>
  </nav>

  @yield('hero')

  <main class="container py-5">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">Periksa kembali data yang diisi.</div>
    @endif
    @yield('content')
  </main>
</body>
</html>

