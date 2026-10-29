<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', $ta['brand']['name'] . ' – ' . $ta['brand']['tagline'])</title>
    <meta name="description" content="@yield('description', 'Temukan destinasi terbaik, paket tour menarik, dan pengalaman tak terlupakan bersama ' . $ta['brand']['name'] . '.')">
    <meta name="theme-color" content="#0e8f9b">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $assets['css'] }}">
</head>
<body class="ta-body ta-page-{{ $active }}">
    <a class="ta-skip" href="#ta-main">Lewati ke konten utama</a>

    @include($ns . '.partials.topbar')
    @include($ns . '.partials.navbar')

    <main id="ta-main">
        @yield('content')
    </main>

    @include($ns . '.partials.footer')
    @include($ns . '.partials.floating')
    @include($ns . '.partials.chatbot')

    {{-- Data untuk JS (WhatsApp, FAQ chatbot, URL halaman) --}}
    <script id="ta-data" type="application/json">{!! json_encode([
        'brand'    => $ta['brand']['name'],
        'whatsapp' => $ta['contact']['whatsapp'],
        'routes'   => $routes,
        'mascot'   => $img('mascot-ai.jpg'),
        'chat'     => $ta['chat'],
        'faqs'     => $ta['faqs'],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
    <script src="{{ $assets['js'] }}" defer></script>
</body>
</html>
