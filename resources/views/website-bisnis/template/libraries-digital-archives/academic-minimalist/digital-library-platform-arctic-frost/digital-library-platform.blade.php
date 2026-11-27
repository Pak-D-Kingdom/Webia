@php
    $cfg = config('template.libraries-digital-archives.academic-minimalist.digital-library-platform-arctic-frost.digital-library-platform', []);
    $g = fn ($k, $d = null) => data_get($cfg, $k, $d);
    $base = 'website-bisnis/template/libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost';
    $img = fn ($f) => asset("images/$base/$f");
    $u = fn ($s = '') => url('/webia/template/libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost'.($s ? '/'.$s : ''));
    $hues = [210, 200, 222, 195, 215, 205];
@endphp
@extends('website-bisnis.template.libraries-digital-archives.academic-minimalist.digital-library-platform-arctic-frost.layouts.app')
@section('content')
@php $bk = $g('books', []); $cv = fn ($i, $b) => '<div class="bk" style="--h:'.$hues[$i % 6].'"><b>'.e($b[0]).'</b><small>'.e($b[1]).'</small></div>'; @endphp
<section class="h3"><img class="h3img" src="{{ $img('hero-scene.jpg') }}" alt="Perpustakaan digital dengan buku terbuka dan globe holografik">
    <div class="wrap h3in"><div class="h3t"><p class="eyebrow">DIGITAL LIBRARY PLATFORM</p>
        <h1><span>Akses Pengetahuan</span><em>Tanpa Batas</em></h1>
        <p class="lead">Temukan ribuan buku, jurnal, dan sumber belajar berkualitas di Digital Library.</p>
        <form class="hsearch" data-search role="search"><span aria-hidden="true">🔍</span><input type="search" placeholder="Cari buku, jurnal, atau topik..." aria-label="Cari"><select aria-label="Kategori"><option value="">Semua Kategori</option>@foreach ($g('categories', []) as $c)<option>{{ $c[0] }}</option>@endforeach</select><button class="btn">Cari</button></form>
        <ul class="hchips">@foreach ($g('chips', []) as $ch)<li><a href="{{ $u('katalog') }}?q={{ urlencode($ch) }}">{{ $ch }}</a></li>@endforeach</ul>
        <a class="btn ghost" href="{{ $u('katalog') }}">Explore Library →</a></div></div></section>

<section class="cat3 rv" id="kategori"><div class="wrap"><div class="cat3h"><div><p class="eyebrow">EXPLORE OUR COLLECTIONS</p><h2>Browse Categories <span class="ln"></span></h2></div><a class="btn ghost sm" href="{{ $u('kategori') }}">Lihat Semua →</a></div>
    <div class="c9">@foreach ($g('categories', []) as $c)<a class="c8i" href="{{ $u('katalog') }}?cat={{ urlencode($c[0]) }}"><i>{{ $c[1] }}</i><span>{{ $c[0] }}</span></a>@endforeach</div></div></section>

<div class="bandx">
<section class="wrap fcrow rv">
    <article class="card dark fcard" id="koleksi">
        <div class="fct"><h3>Featured Collections</h3><p>Koleksi pilihan terbaik untuk Anda</p>
            <ul class="fchips">@foreach ($g('collections', []) as $c)<li>{{ $c[0] }} · {{ $c[2] }} · {{ $c[3] }}</li>@endforeach</ul>
            <a class="btn light" href="{{ $u('koleksi-pilihan') }}">Jelajahi Koleksi →</a></div>
        <div class="car"><button class="arw" data-scroll="-1" aria-label="Sebelumnya">‹</button><div class="fcovers" data-track>@foreach ([3, 4, 5, 6, 8] as $k => $i)<a href="{{ $u('detail-buku') }}?b={{ $i }}" aria-label="{{ $bk[$i][0] }}">{!! $cv($k, $bk[$i]) !!}</a>@endforeach</div><button class="arw" data-scroll="1" aria-label="Berikutnya">›</button></div></article>
    <article class="card gl nacard" id="terbaru"><h3>🆕 New Arrivals <a href="{{ $u('terbaru') }}">Lihat Semua →</a></h3>
        <div class="car"><button class="arw" data-scroll="-1" aria-label="Sebelumnya">‹</button><div class="narow" data-track>@foreach ([0, 1, 2, 9, 11] as $k => $i)<a class="na" href="{{ $u('detail-buku') }}?b={{ $i }}">{!! $cv($k, $bk[$i]) !!}<b>{{ $bk[$i][0] }}</b><small>{{ $bk[$i][1] }} · {{ $bk[$i][3] }}</small><small>{{ $bk[$i][5] }} · ★ {{ $bk[$i][4] }}</small></a>@endforeach</div><button class="arw" data-scroll="1" aria-label="Berikutnya">›</button></div></article>
</section>

<section class="wrap grid4 rv" id="buku">
    <article class="card gl"><h3>🔥 Popular & Most Read <a href="{{ $u('terpopuler') }}">Lihat Semua →</a></h3>
        <ul class="books">@foreach ([3, 9, 2, 0] as $r => $i)<li><span class="rank">{{ $r + 1 }}</span><span class="cover" style="--h:{{ $hues[$r % 6] }}"></span><div><b><a href="{{ $u('detail-buku') }}?b={{ $i }}">{{ $bk[$i][0] }}</a></b><small>{{ $bk[$i][1] }} · ★ {{ $bk[$i][4] }}</small><em>{{ $bk[$i][6] }} pembaca · {{ $r < 2 ? 'Trending' : 'Populer' }}</em></div></li>@endforeach</ul></article>
    <article class="card dark" id="akademik"><h3>🎓 Academic Resources</h3><p>Sumber daya akademik terverifikasi untuk pelajar, mahasiswa, dan peneliti.</p>
        <ul class="acl">@foreach ($g('academic', []) as $a)<li><i>{{ $a[2] }}</i><b>{{ $a[0] }}</b><small>{{ $a[1] }}</small></li>@endforeach</ul><a class="btn sm light" href="{{ $u('akademik') }}">Akses Sekarang</a></article>
    <article class="card gl read"><h3>📖 Digital Reading Experience</h3>
        <div class="er"><div class="erb"><i>‹</i><span>Hal 12 / 240</span><i>›</i><i>−</i><i>+</i><i>🔖</i></div><div class="erp"><b>Digital Literature</b><p></p><p></p><p class="s"></p><p></p></div><div class="prog"><i style="width:42%"></i></div></div>
        <a class="btn sm" href="{{ $u('baca') }}">Mulai Membaca</a></article>
    <article class="card gl apv"><div class="ah"><img src="{{ $img('chatbot.svg') }}" alt="" width="64" height="64"><div><b>Library Assistant</b><small>Nivo, si burung hantu pustakawan</small></div></div>
        <p class="m bot">Halo! Mau cari buku, pinjam, atau tanya keanggotaan?</p><ul>@foreach (['Cari buku', 'Cara pinjam', 'Keanggotaan'] as $qa)<li><button data-ask="{{ $qa }}">{{ $qa }}</button></li>@endforeach</ul><button class="btn sm" data-chat-open>Chat Sekarang →</button></article>
</section>

<section class="wrap grid3 rv">
    <article class="card gl"><h3>📊 Library Statistics</h3><div class="stats s4">@foreach ($g('stats', []) as $s)<div><b data-count="{{ $s[2] }}" data-suffix="{{ preg_replace('/\d+/', '', $s[0]) }}">{{ $s[0] }}</b><span>{{ $s[1] }}</span></div>@endforeach</div><img class="gb" src="{{ $img('globe-book.jpg') }}" alt="Buku terbuka dan globe digital"></article>
    <article class="card gl" id="membership"><h3>🎁 Membership Benefits</h3><ul class="mb">@foreach ($g('benefits', []) as $b)<li><i>{{ $b[1] }}</i>{{ $b[0] }}</li>@endforeach</ul><a class="btn sm" href="{{ $u('keanggotaan') }}">Join Membership</a></article>
    <article class="card gl"><h3>🤝 Library Partners</h3><div class="partners p6">@foreach ($g('partners', []) as $p)<span title="{{ $p }}"><i>{{ mb_substr($p, 0, 1) }}</i>{{ $p }}</span>@endforeach</div></article>
</section>

<section class="wrap sec rv" id="hub"><h3 class="st">Knowledge Hub <a class="more" href="{{ $u('knowledge-hub') }}">Lihat Semua →</a></h3>
    <div class="arts">@foreach (array_slice($g('articles', []), 0, 3) as $i => $a)<article class="card art"><span class="thumb ph" style="background-image:url('{{ $img(['feat-manuscripts.jpg', 'building.jpg', 'books-left.jpg'][$i]) }}')"></span><em>{{ $a[1] }}</em><h4>{{ $a[0] }}</h4><p>{{ $a[2] }}</p><a href="{{ $u('artikel') }}?a={{ $i }}">Baca Selengkapnya</a></article>@endforeach</div></section>

<section class="wrap sec rv" id="faq"><h3 class="st">FAQ <a class="more" href="{{ $u('faq') }}">Help Center →</a></h3>
    @foreach (array_slice($g('faq', []), 0, 5) as $f)<details class="card qa"><summary>{{ $f[0] }}</summary><p>{{ $f[1] }}</p></details>@endforeach</section>

<section class="wrap sec rv" id="kontak"><h3 class="st">Contact & Support</h3>
    <div class="contact card"><ul><li>📍 {{ $g('address') }}</li><li>📞 {{ $g('phone') }}</li><li>✉️ {{ $g('email') }}</li><li>🕘 {{ $g('hours') }}</li><li>🛟 <a href="{{ $u('faq') }}">Help Center</a></li></ul>
        <form data-contact><input name="nama" placeholder="Nama Anda" required><input name="email" type="email" placeholder="Email Anda" required><textarea name="pesan" rows="3" placeholder="Pesan" required></textarea><button class="btn">Kirim via WhatsApp</button></form></div></section>
</div>
@endsection
