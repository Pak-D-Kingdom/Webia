@php
    $f = $furniture;
    $a = fn ($path) => asset($path);

    // Data untuk furniture.js (dibaca lewat <script type="application/json">).
    $lfConfig = [
        'whatsapp' => $f['contact']['whatsapp'],
        'brand'    => $f['brand']['name'],
        'ai'       => $f['ai'],
        'leadTime' => $f['lead_time']['types'],
        'routes'   => collect($f['routes'])->map(fn ($name) => route($name))->all(),
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#2b1a12">
    <meta name="description" content="@yield('description', $f['hero']['text'])">
    <title>@yield('title', 'Beranda') | {{ $f['brand']['name'] }} - {{ $f['brand']['tagline'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $a($f['paths']['css']) }}">
    @stack('styles')
</head>
<body class="lf" data-page="{{ $activePage }}">
    @include('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.partials.icons')

    <a class="lf-skip" href="#konten">Lewati ke konten</a>

    <header class="lf-header" data-header>
        @include('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.partials.topbar')
        @include('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.partials.navbar')
    </header>

    <main id="konten">
        @yield('content')
    </main>

    @include('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.partials.footer')
    @include('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.partials.whatsapp-button')
    @include('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.partials.ai-chatbot')

    <script type="application/json" id="lf-config">@json($lfConfig)</script>
    <script src="{{ $a($f['paths']['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
