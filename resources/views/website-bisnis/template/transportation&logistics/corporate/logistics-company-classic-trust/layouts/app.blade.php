@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
    $urls = [];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $c['meta']['title'])</title>
    <meta name="description" content="{{ $c['meta']['description'] }}">
    <meta name="theme-color" content="{{ $c['meta']['theme_color'] }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($c['assets']['css']) }}">
    @stack('head')
</head>
<body class="lc @yield('body_class')">
    <a class="skip-link" href="#konten">Lewati ke konten utama</a>

    @include($vb . 'partials.sprite')
    @include($vb . 'partials.topbar')
    @include($vb . 'partials.navbar')

    <main id="konten">
        @yield('content')
    </main>

    @include($vb . 'partials.footer')
    @include($vb . 'partials.floating')

    {{-- Data untuk JavaScript (tanpa inline script, aman dari CSP ketat) --}}
    @foreach ($c['routes'] as $k)
        @php $urls[$k] = $route($k); @endphp
    @endforeach
    <script type="application/json" id="lc-urls">@json($urls, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)</script>
    <script type="application/json" id="lc-contact">@json($c['contact'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)</script>
    <script type="application/json" id="lc-chatbot">@json($c['chatbot'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)</script>
    <script type="application/json" id="lc-tracking">@json($c['tracking'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)</script>
    <script type="application/json" id="lc-search">@json($c['search_index'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)</script>
    <script src="{{ asset($c['assets']['js']) }}" defer></script>
</body>
</html>
