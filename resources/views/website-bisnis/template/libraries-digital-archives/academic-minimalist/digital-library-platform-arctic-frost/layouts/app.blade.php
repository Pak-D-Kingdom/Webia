@php
    $cfg = config('template.libraries-digital-archives.academic-minimalist.digital-library-platform-arctic-frost.digital-library-platform', []);
    $g = fn ($k, $d = null) => data_get($cfg, $k, $d);
    $base = 'website-bisnis/template/libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost';
    $img = fn ($f) => asset("images/$base/$f");
    $u = fn ($s = '') => url('/webia/template/libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost'.($s ? '/'.$s : ''));
    $hues = [210, 200, 222, 195, 215, 205];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $g('name', 'Digital Library').' — Perpustakaan Digital')</title>
    <meta name="description" content="Temukan ribuan buku, jurnal, dan sumber belajar berkualitas di Digital Library.">
    <script>document.documentElement.className += " js";</script>
    <link rel="stylesheet" href="{{ asset("css/$base/digital-library-platform.css") }}">
    <script src="{{ asset("js/$base/digital-library-platform.js") }}" defer></script>
</head>
<body id="top" class="dlaf" data-wa="{{ $g('whatsapp') }}" data-base="{{ $u() }}">
<div class="topbar tb2"><div class="wrap">
    <span>🎓 Welcome to Digital Library</span>
    <span class="tb-mid">★ New Collections Available!</span>
    <span class="tb-r"><span class="tb-h">🕘 Library Hours: {{ $g('hours') }}</span><i class="tb-h"></i><a href="{{ $u('faq') }}">Help Center</a><i></i><a href="#" data-a11y title="Accessibility">Aa</a><i></i><span><b>ID</b> / EN</span></span>
</div></div>

<header class="nav nv2"><div class="wrap nav-in">
    <a class="brand" href="{{ $u() }}"><img src="{{ $img('logo.png') }}" alt="Logo" width="44" height="38"><span><b>Digital Library</b><small>Read • Learn • Grow</small></span></a>
    <button class="burger" aria-label="Menu" aria-expanded="false" data-burger>☰</button>
    <nav class="menu" data-menu>
        @foreach ($g('nav', []) as $n)<a href="{{ $u($n[1]) }}" @class(['on' => rtrim(request()->url(), '/') === $u($n[1])])>{{ $n[0] }}@if (! in_array($n[1], ['', 'tentang-kami']))<small aria-hidden="true">▾</small>@endif</a>@endforeach
        <button class="bell" data-bell aria-label="Notifikasi">🔔<i data-nc></i></button><div class="notif" data-notif hidden></div>
        <a class="lg" href="{{ $u('masuk') }}">Login / Register</a><a class="btn sm rq" href="{{ $u('keanggotaan') }}">Join Membership</a>
    </nav>
</div></header>

<main id="main">
@yield('content')
</main>

<footer class="foot f2"><div class="wrap fgrid2">
    <div><a class="brand" href="{{ $u() }}"><img src="{{ $img('logo-light.png') }}" alt="" width="44" height="40"><span><b>Digital Library</b><small>Read • Learn • Grow</small></span></a>
        <p>Perpustakaan digital akademis untuk membaca, belajar, dan menjelajah ilmu pengetahuan tanpa batas.</p>
        <div class="soc"><a href="#" aria-label="Facebook">f</a><a href="#" aria-label="YouTube">▶</a><a href="#" aria-label="LinkedIn">in</a><a href="#" aria-label="Instagram">IG</a></div></div>
    <div><h5>Quick Links</h5>@foreach ($g('nav', []) as $n)<a href="{{ $u($n[1]) }}">{{ $n[0] }}</a>@endforeach</div>
    <div><h5>Browse Categories</h5>@foreach (array_slice($g('categories', []), 0, 6) as $c)<a href="{{ $u('katalog') }}?cat={{ urlencode($c[0]) }}">{{ $c[0] }}</a>@endforeach</div>
    <div><h5>Library Resources</h5><a href="{{ $u('akademik') }}">Academic Resources</a><a href="{{ $u('terbaru') }}">New Arrivals</a><a href="{{ $u('terpopuler') }}">Popular & Most Read</a><h5 style="margin-top:14px">Membership Information</h5><a href="{{ $u('keanggotaan') }}">Benefits & Plans</a><a href="{{ $u('daftar') }}">Register</a></div>
    <div><h5>Help Center</h5><a href="{{ $u('faq') }}">FAQ & Guides</a><a href="{{ $u('kontak') }}">Contact Support</a><h5 style="margin-top:14px">Contact Information</h5><span>{{ $g('email') }}</span><span>{{ $g('phone') }}</span><span>{{ $g('address') }}</span></div>
</div>
<div class="wrap legal2"><span>© 2026 Digital Library</span><span><a href="{{ $u('faq') }}">Privacy Policy</a> | <a href="{{ $u('faq') }}">Terms & Conditions</a></span></div>
<p class="credit">© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p></footer>

<a class="wa" href="https://wa.me/{{ $g('whatsapp') }}" target="_blank" rel="noopener" aria-label="WhatsApp" data-tip="Chat WhatsApp"><svg viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path fill="#1faa59" d="M12 2a10 10 0 0 0-8.6 15L2 22l5.1-1.3A10 10 0 1 0 12 2z"/><path fill="#fff" d="M9 7l1.5 3-1 1c.7 1.3 1.7 2.3 3 3l1-1 3 1.5-.5 1.5C12 17 7 12 7.5 7.5z"/></svg><span>WhatsApp</span></a>
<button class="bot" data-chat-open aria-label="Buka Library Assistant" data-tip="Library Assistant"><img src="{{ $img('chatbot.svg') }}" alt="" width="48" height="48"><span>Library Assistant</span></button>
<aside class="chat" data-chat hidden role="dialog" aria-label="Library Assistant">
    <header><img src="{{ $img('chatbot.svg') }}" alt="" width="40" height="40"><div><b>Library Assistant</b><small>Nivo · asisten pustakawan</small></div><button data-chat-close aria-label="Tutup">✕</button></header>
    <div class="qq">@foreach (['Cari buku', 'Cara pinjam', 'Keanggotaan', 'Jurnal akademik'] as $qq)<button data-ask="{{ $qq }}">{{ $qq }}</button>@endforeach</div>
    <div class="msgs" data-msgs><p class="m bot">Halo! Saya Nivo, pustakawan digital Anda. Ada yang bisa saya bantu?</p></div>
    <form data-chat-form><input placeholder="Tulis pertanyaan..." aria-label="Pesan" required><button aria-label="Kirim">➤</button></form>
    <script type="application/json" id="bot-data">{!! json_encode($g('bot', []), JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}</script>
</aside>
<script type="application/json" id="lib-data">{!! json_encode(['books' => $g('books', []), 'cats' => array_column($g('categories', []), 0), 'icons' => array_column($g('categories', []), 1), 'arts' => $g('articles', []), 'acad' => $g('academic_items', []), 'notifs' => $g('notifs', []), 'base' => $u()], JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}</script>
</body>
</html>
