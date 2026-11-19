@extends('website-bisnis.template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.layouts.app')
@section('title', data_get(config('template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.digital-library', []), 'pages.'.$page.'.0', 'Halaman').' — DigitalLibrary')
@section('content')
@php
    $cfg = config('template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.digital-library', []);
    $g = fn ($k, $d = null) => data_get($cfg, $k, $d);
    $u = fn ($s = '') => url('/webia/template/libraries-digital-archives/modern/digital-library-platform-ocean-blue'.($s ? '/'.$s : ''));
    $meta = $g('pages.'.$page, ['Halaman', '', '']);
@endphp
<section class="phead"><div class="wrap"><nav class="crumb" aria-label="Breadcrumb"><a href="{{ $u() }}">Beranda</a> › {{ $meta[0] }}</nav><h1>{{ $meta[0] }}</h1><p>{{ $meta[1] }}</p></div></section>
<div class="wrap pbody" data-view="{{ $meta[2] }}" data-preset="{{ $meta[3] ?? '' }}">
@switch($meta[2])
@case('catalog')
    <form class="filters card" data-filters role="search">
        <input name="q" type="search" placeholder="Cari judul, penulis, atau ISBN..." aria-label="Cari">
        <select name="cat" aria-label="Kategori"><option value="">Semua Kategori</option>@foreach ($g('categories', []) as $c)<option>{{ $c[0] }}</option>@endforeach</select>
        <select name="fmt" aria-label="Format"><option value="">Semua Format</option><option>E-Book</option><option>E-Buku Digital</option></select>
        <select name="sort" aria-label="Urutkan"><option value="title">Judul A–Z</option><option value="rate">Rating tertinggi</option><option value="year">Terbaru</option></select>
        <details class="adv"><summary>Pencarian Lanjutan</summary><div>
            <input name="author" placeholder="Nama penulis" aria-label="Penulis">
            <select name="rate" aria-label="Rating"><option value="0">Semua rating</option><option value="4">4.0+</option><option value="4.5">4.5+</option></select>
            <select name="year" aria-label="Tahun"><option value="">Semua tahun</option><option>2025</option><option>2024</option><option>2023</option></select></div></details>
    </form>
    <p class="cnt" data-count></p><div class="shelf" data-grid></div>
@break
@case('blog')
    <div class="arts">@foreach ($g('articles', []) as $i => $a)<article class="card art"><span class="thumb" style="--h:{{ [210, 28, 190, 260, 150, 340][$i % 6] }}"></span><em>{{ $a[1] }}</em><h4>{{ $a[0] }}</h4><p>{{ $a[2] }}</p><a href="{{ $u('artikel') }}?a={{ $i }}">Baca Selengkapnya</a></article>@endforeach</div>
@break
@case('member')
    <div class="plans">@foreach ($g('plans', []) as $i => $p)<article class="card plan {{ $i === 1 ? 'hot' : '' }}"><h3>{{ $p[0] }}</h3><b class="price">{{ $p[1] }}</b><ul class="ticks lt">@foreach ($p[2] as $f)<li>{{ $f }}</li>@endforeach</ul><a class="btn" href="{{ $u('daftar') }}">Pilih Paket</a></article>@endforeach</div>
    <div class="card" style="margin-top:18px"><h3>Manfaat Anggota</h3><ul class="ticks lt cols">@foreach ($g('benefits', []) as $b)<li>{{ $b }}</li>@endforeach</ul></div>
@break
@case('about')
    <div class="two"><section class="card"><h3>Visi</h3><p>Menjadi perpustakaan digital terdepan yang membuka akses ilmu bagi semua orang.</p></section>
        <section class="card"><h3>Misi</h3><ul class="ticks lt"><li>Menyediakan koleksi digital yang luas dan terkurasi</li><li>Mendorong budaya membaca dan literasi digital</li><li>Bermitra dengan penerbit dan institusi pendidikan</li></ul></section></div>
    <section class="card" style="margin-top:18px"><h3>Sejarah</h3><ul class="timeline"><li><b>2015</b> Perpustakaan berdiri dengan 1.000 judul.</li><li><b>2019</b> Layanan peminjaman digital diluncurkan.</li><li><b>2024</b> Asisten AI dan pembaca online hadir.</li></ul></section>
    <h3 class="st" style="margin-top:24px">Tim Kami</h3><div class="arts">@foreach (['Dr. Ratna Wulandari|Kepala Perpustakaan', 'Bima Saputra|Kurator Koleksi', 'Citra Ayu|Layanan Anggota', 'Dani Pratama|Pengembangan Digital'] as $i => $t)@php [$n, $r] = explode('|', $t); @endphp<article class="card team"><span class="av" style="--h:{{ [210, 28, 190, 260][$i] }}">{{ mb_substr($n, 0, 1) }}</span><b>{{ $n }}</b><small>{{ $r }}</small></article>@endforeach</div>
@break
@case('faq')
    <input class="card faqs" type="search" data-faq-search placeholder="Cari pertanyaan..." aria-label="Cari pertanyaan">
    <div data-faq>@foreach (array_merge($g('faq', []), [['Bagaimana cara membaca buku secara online?', 'Buka detail buku lalu klik Baca Online. Progres tersimpan otomatis.'], ['Bagaimana cara mengunduh buku?', 'Anggota dapat menekan tombol Unduh pada halaman detail atau pembaca online.'], ['Bagaimana menyimpan buku favorit?', 'Tekan ikon hati untuk menyimpan buku ke wishlist.']]) as $f)<details class="card qa"><summary>{{ $f[0] }}</summary><p>{{ $f[1] }}</p></details>@endforeach</div>
@break
@case('contact')
    <div class="contact card"><ul><li>📍 {{ $g('address') }}</li><li>📞 {{ $g('phone') }}</li><li>✉️ {{ $g('email') }}</li><li>🕘 {{ $g('hours') }}</li></ul>
        <form data-contact><input name="nama" placeholder="Nama Anda" required><input name="email" type="email" placeholder="Email Anda" required><textarea name="pesan" rows="4" placeholder="Pesan" required></textarea><button class="btn">Kirim via WhatsApp</button></form></div>
@break
@case('auth')
    @php $reg = $page === 'daftar'; @endphp
    <form class="card auth" data-auth="{{ $page }}"><h3>{{ $reg ? 'Buat Akun' : 'Masuk' }}</h3>
        @if ($reg)<input name="nama" placeholder="Nama lengkap" required>@endif
        <input name="email" type="email" placeholder="Email" required><input name="pw" type="password" placeholder="Kata sandi (min. 6)" minlength="6" required>
        @if ($reg)<input name="pw2" type="password" placeholder="Ulangi kata sandi" minlength="6" required>@endif
        <button class="btn">{{ $reg ? 'Daftar' : 'Masuk' }}</button>
        <p>{{ $reg ? 'Sudah punya akun?' : 'Belum punya akun?' }} <a href="{{ $u($reg ? 'masuk' : 'daftar') }}">{{ $reg ? 'Masuk' : 'Daftar' }}</a></p></form>
@break
@case('profile')
    <form class="card auth wide" data-profile><h3>Data Diri</h3><input name="nama" placeholder="Nama lengkap"><input name="email" type="email" placeholder="Email"><input name="hp" placeholder="No. telepon"><textarea name="bio" rows="3" placeholder="Tentang Anda"></textarea>
        <label class="sw"><input type="checkbox" name="notif" checked> Terima notifikasi koleksi baru</label><label class="sw"><input type="checkbox" name="dark"> Tampilan baca nyaman</label><button class="btn">Simpan Perubahan</button></form>
@break
@endswitch
</div>
@endsection
