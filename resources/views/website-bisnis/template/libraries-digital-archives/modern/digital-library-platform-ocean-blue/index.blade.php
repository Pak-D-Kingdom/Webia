@php
    $cfg = config('template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.digital-library', []);
    $g = fn ($k, $d = null) => data_get($cfg, $k, $d);
    $base = 'website-bisnis/template/libraries-digital-archives/modern/digital-library-platform-ocean-blue';
    $img = fn ($f) => asset("images/$base/$f");
    $u = fn ($s = '') => url('/webia/template/libraries-digital-archives/modern/digital-library-platform-ocean-blue'.($s ? '/'.$s : ''));
    $hues = [210, 28, 190, 260, 150, 340];
@endphp
@extends('website-bisnis.template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.layouts.app')
@section('content')
<section class="hero"><div class="wrap hero-in">
    <div class="hero-txt">
        <h2>Selamat Datang di</h2>
        <h1>Digital <em>Library</em></h1>
        <p>Akses ribuan buku, jurnal, dan sumber belajar secara digital, kapan saja, di mana saja!</p>
        <form class="search" role="search" data-search><input type="search" placeholder="Cari buku, penulis, topik..." aria-label="Cari buku"><button class="btn">Cari</button></form>
        <ul class="chips">@foreach ($g('features', []) as $f)<li>✔ {{ $f }}</li>@endforeach</ul>
    </div>
    <div class="hero-art"><img src="{{ $img('hero-library.svg') }}" alt="Ilustrasi perpustakaan digital dengan asisten robot"></div>
    <aside class="acard"><div class="ah"><img src="{{ $img('chatbot.svg') }}" alt="" width="44" height="44"><b>Library Assistant ✨</b></div>
        <p>Halo! Ada yang bisa saya bantu tentang pencarian buku, akses perpustakaan, atau layanan lainnya?</p>
        <ul>@foreach (['Cari Buku & E-Book', 'Informasi Keanggotaan', 'Layanan Perpustakaan', 'FAQ Lainnya'] as $qa)<li><button data-ask="{{ $qa }}">{{ $qa }}</button></li>@endforeach</ul>
        <button class="btn" data-chat-open>Chat Sekarang →</button></aside>
</div></section>

<section class="wrap grid4">
    <article class="card" id="kategori"><h3>Browse Categories <a href="{{ $u('kategori') }}">Lihat Semua</a></h3>
        <div class="cats">@foreach ($g('categories', []) as $c)<a href="{{ $u('katalog') }}?cat={{ urlencode($c[0]) }}"><i>{{ $c[1] }}</i>{{ $c[0] }}</a>@endforeach</div></article>

    <article class="card feat" id="koleksi"><h3>Featured Collections <a href="{{ $u('koleksi-pilihan') }}">Lihat Semua</a></h3>
        <div class="slider" data-slider>
            @foreach ($g('featured', []) as $i => $s)
            <div class="slide {{ $i === 0 ? 'on' : '' }}" style="--h:{{ $hues[$i % 6] }}">
                <span class="tag">Koleksi Unggulan</span><h4>{{ $s[0] }}</h4><p>{{ $s[1] }}</p><a class="btn sm gold" href="{{ $u('koleksi-pilihan') }}">Jelajahi Koleksi</a>
            </div>@endforeach
            <div class="dots">@foreach ($g('featured', []) as $i => $s)<button aria-label="Slide {{ $i + 1 }}" class="{{ $i === 0 ? 'on' : '' }}"></button>@endforeach</div>
        </div></article>

    <article class="card" id="buku"><div class="tabs" data-tabs><button class="on" data-t="new">New Arrivals</button><button data-t="pop">Popular & Most Read</button></div>
        @foreach (['new' => array_slice($g('books', []), 0, 3), 'pop' => array_slice($g('books', []), 3, 3)] as $k => $list)
        <ul class="books" data-pane="{{ $k }}" @if ($k === 'pop') hidden @endif>
            @foreach ($list as $i => $b)<li><span class="cover" style="--h:{{ $hues[($i + ($k === 'pop' ? 3 : 0)) % 6] }}"></span>
                <div><b><a href="{{ $u('detail-buku') }}?b={{ $i + ($k === 'pop' ? 3 : 0) }}">{{ $b[0] }}</a></b><small>Penulis: {{ $b[1] }}</small><em>{{ $b[2] }}</em></div><span aria-hidden="true">›</span></li>@endforeach
        </ul>@endforeach</article>

    <article class="card dark" id="akademik"><h3>🎓 Academic Resources</h3><p>Sumber daya lengkap untuk pelajar, mahasiswa, dan peneliti.</p>
        <ul class="ticks">@foreach ($g('academic', []) as $a)<li>{{ $a }}</li>@endforeach</ul><a class="btn sm gold" href="{{ $u('akademik') }}">Akses Sekarang</a></article>
</section>

<section class="wrap grid4 g2">
    <article class="card dark read"><h3>📖 Digital Reading Experience</h3><p>Baca lebih nyaman dengan fitur digital terbaik kami!</p>
        <ul class="ticks">@foreach ($g('reading', []) as $a)<li>{{ $a }}</li>@endforeach</ul><a class="btn sm" href="{{ $u('baca') }}">Mulai Membaca</a></article>
    <article class="card"><h3>📊 Library Statistics</h3><div class="stats">@foreach ($g('stats', []) as $s)<div><b data-count="{{ $s[2] }}" data-suffix="{{ preg_replace('/[\d]+/', '', $s[0]) }}">{{ $s[0] }}</b><span>{{ $s[1] }}</span></div>@endforeach</div></article>
    <article class="card" id="membership"><h3>🎁 Membership Benefits</h3><div class="member"><ul class="ticks lt">@foreach ($g('benefits', []) as $a)<li>{{ $a }}</li>@endforeach</ul><div class="mcard">LIBRARY<br>MEMBER</div></div><a class="btn sm gold" href="{{ $u('keanggotaan') }}">Daftar Sekarang</a></article>
    <article class="card"><h3>🤝 Library Partners</h3><div class="partners">@foreach ($g('partners', []) as $p)<span title="{{ $p[0] }}">{{ $p[1] }}</span>@endforeach</div><a class="btn sm ghost" href="{{ $u('tentang-kami') }}">Lihat Mitra</a></article>
</section>

<section class="wrap sec" id="hub"><h3 class="st">Knowledge Hub <a class="more" href="{{ $u('knowledge-hub') }}">Lihat Semua</a></h3>
    <div class="arts">@foreach ($g('articles', []) as $i => $a)<article class="card art"><span class="thumb" style="--h:{{ $hues[$i % 6] }}"></span><em>{{ $a[1] }}</em><h4>{{ $a[0] }}</h4><p>{{ $a[2] }}</p><a href="{{ $u('artikel') }}?a={{ $i }}">Baca Selengkapnya</a></article>@endforeach</div></section>

<section class="wrap sec" id="faq"><h3 class="st">FAQ & Help Center</h3>
    @foreach ($g('faq', []) as $f)<details class="card qa"><summary>{{ $f[0] }}</summary><p>{{ $f[1] }}</p></details>@endforeach</section>

<section class="wrap sec" id="kontak"><h3 class="st">Contact & Support</h3>
    <div class="contact card"><ul><li>📍 {{ $g('address') }}</li><li>📞 {{ $g('phone') }}</li><li>✉️ {{ $g('email') }}</li><li>🕘 {{ $g('hours') }}</li></ul>
        <form data-contact><input name="nama" placeholder="Nama Anda" required><input name="email" type="email" placeholder="Email Anda" required><textarea name="pesan" rows="3" placeholder="Pesan" required></textarea><button class="btn">Kirim via WhatsApp</button></form></div></section>
@endsection
