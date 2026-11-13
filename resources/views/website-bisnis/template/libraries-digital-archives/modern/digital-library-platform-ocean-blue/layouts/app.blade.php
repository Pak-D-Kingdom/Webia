@php
    $cfg = config('template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.digital-library', []);
    $g = fn ($k, $d = null) => data_get($cfg, $k, $d);
    $base = 'website-bisnis/template/libraries-digital-archives/modern/digital-library-platform-ocean-blue';
    $img = fn ($f) => asset("images/$base/$f");
    $u = fn ($s = '') => url('/webia/template/libraries-digital-archives/modern/digital-library-platform-ocean-blue'.($s ? '/'.$s : ''));
    $hues = [210, 28, 190, 260, 150, 340];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $g('name', 'DigitalLibrary').' — Perpustakaan Digital')</title>
    <meta name="description" content="Akses ribuan buku, jurnal, dan sumber belajar secara digital.">
    <link rel="stylesheet" href="{{ asset("css/$base/digital-library.css") }}">
    <script src="{{ asset("js/$base/digital-library.js") }}" defer></script>
</head>
<body id="top" data-wa="{{ $g('whatsapp') }}" data-base="{{ $u() }}">
<div class="topbar"><div class="wrap">
    <span>📍 {{ $g('address') }}</span>
    <span class="tb-mid">✨ Koleksi Baru Telah Tersedia!</span>
    <span><a href="{{ $u('faq') }}">Help Center</a> | <b>ID</b> / EN | <a href="{{ $u('masuk') }}">Login</a></span>
</div></div>

<header class="nav"><div class="wrap nav-in">
    <a class="brand" href="{{ $u() }}"><img src="{{ $img('logo.svg') }}" alt="Logo" width="44" height="44">
        <span><b>{{ $g('name') }}</b><small>{{ $g('tagline') }}</small></span></a>
    <button class="burger" aria-label="Menu" aria-expanded="false" data-burger>☰</button>
    <nav class="menu" data-menu>
        @foreach ($g('nav', []) as $i => $n)<a href="{{ $u($n[1]) }}" @class(['on' => rtrim(request()->url(), '/') === $u($n[1])])>{{ $n[0] }}</a>@endforeach
        <button class="bell" data-bell aria-label="Notifikasi">🔔<i data-nc></i></button><div class="notif" data-notif hidden></div>
        <a class="btn sm" href="{{ $u('katalog') }}">🔍 Cari Buku</a><a class="btn sm gold" href="{{ $u('daftar') }}">Daftar Anggota</a>
    </nav>
</div></header>

<main id="main">
@yield('content')
</main>

<footer class="foot"><div class="wrap fgrid">
    <div><a class="brand" href="{{ $u() }}"><img src="{{ $img('logo.svg') }}" alt="" width="40" height="40"><span><b>{{ $g('name') }}</b><small>{{ $g('tagline') }}</small></span></a><p>Perpustakaan digital untuk membaca, belajar, dan menjelajah ilmu.</p></div>
    <div><h5>Navigasi</h5>@foreach ($g('nav', []) as $n)<a href="{{ $u($n[1]) }}">{{ $n[0] }}</a>@endforeach</div>
    <div><h5>Informasi</h5><a href="{{ $u('faq') }}">FAQ</a><a href="{{ $u('kontak') }}">Kontak</a><a href="{{ $u('kontak') }}">Kebijakan Privasi</a><a href="{{ $u('kontak') }}">Syarat & Ketentuan</a></div>
    <div><h5>Knowledge Hub</h5><a href="{{ $u('knowledge-hub') }}">Artikel & Tips</a><a href="{{ $u('knowledge-hub') }}">Berita Terbaru</a><a href="{{ $u('faq') }}">Panduan Pengguna</a></div>
    <form class="news" data-news><h5>Newsletter</h5><div><input type="email" placeholder="Email Anda" aria-label="Email" required><button aria-label="Kirim">➤</button></div></form>
</div>
<p class="credit">© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p></footer>

<a class="wa" href="https://wa.me/{{ $g('whatsapp') }}" target="_blank" rel="noopener" aria-label="WhatsApp"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="#fff" d="M12 2a10 10 0 0 0-8.6 15L2 22l5.1-1.3A10 10 0 1 0 12 2z"/><path fill="#1faa59" d="M9 7l1.5 3-1 1c.7 1.3 1.7 2.3 3 3l1-1 3 1.5-.5 1.5C12 17 7 12 7.5 7.5z"/></svg><span>WhatsApp</span></a>

<button class="bot" data-chat-open aria-label="Buka AI Chat"><img src="{{ $img('chatbot.svg') }}" alt="" width="40" height="40"><span>AI Chat</span></button>
<aside class="chat" data-chat hidden role="dialog" aria-label="Library Assistant">
    <header><img src="{{ $img('chatbot.svg') }}" alt="" width="32" height="32"><b>Library Assistant</b><button data-chat-close aria-label="Tutup">✕</button></header>
    <div class="msgs" data-msgs><p class="m bot">Halo! Ada yang bisa saya bantu? Tanya soal buku, keanggotaan, atau layanan.</p></div>
    <form data-chat-form><input placeholder="Tulis pesan..." aria-label="Pesan" required><button>➤</button></form>
    <script type="application/json" id="bot-data">{!! json_encode($g('bot', []), JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}</script>
</aside>
<script type="application/json" id="lib-data">{!! json_encode(['books' => $g('books', []), 'cats' => array_column($g('categories', []), 0), 'icons' => array_column($g('categories', []), 1), 'arts' => $g('articles', []), 'acad' => $g('academic_items', []), 'notifs' => $g('notifs', []), 'base' => $u()], JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}</script>
</body>
</html>
