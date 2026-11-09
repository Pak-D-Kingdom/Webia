<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Al Hijrah Travel — Umrah & Haji Bersama Pembimbing Berpengalaman')</title>
    <meta name="description" content="@yield('description', 'Umrah dan Haji bersama Al Hijrah Travel: pelayanan profesional, pembimbing berpengalaman, dan fasilitas terbaik menuju Tanah Suci.')">
    <meta name="theme-color" content="#0a1628">
    <link rel="icon" type="image/svg+xml" href="{{ $img('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="{{ $css }}">
</head>
<body class="uh uh-page-{{ $page }}" data-page="{{ $page }}">
    <a class="uh-skip" href="#uh-main">Lewati ke konten utama</a>

    @include($v . '.partials.icons')
    @include($v . '.partials.topbar')
    @include($v . '.partials.navbar')
    @include($v . '.partials.search')

    <main id="uh-main">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.floating')

    @php
        $uhData = [
            'wa'     => $wa($d['contact']['wa_text']),
            'search' => collect($d['menu'])
                ->map(fn ($m) => ['label' => $m[1], 'url' => $r($m[0]), 'k' => $d['search_keywords'][$m[0]] ?? ''])
                ->push(['label' => 'AI Chat — FAQ Paket & Pendaftaran', 'url' => $r('chat'), 'k' => $d['search_keywords']['chat']])
                ->values()->all(),
            'faq'    => collect($d['faq'])
                ->map(fn ($f) => ['k' => $f['k'], 'a' => $f['a'], 'l' => $f['l'] ? ['u' => $r($f['l'][0]), 't' => $f['l'][1]] : null])
                ->values()->all(),
            'chat'   => $d['chat'],
        ];
    @endphp
    <script>window.UH = @json($uhData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP);</script>
    <script src="{{ $js }}" defer></script>
</body>
</html>
