<!DOCTYPE html>
<html lang="id" class="ta-html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', $cfg['brand']['name']) — {{ $cfg['brand']['name'] }}</title>
    <meta name="description" content="@yield('description', $cfg['brand']['description'])">
    <meta name="theme-color" content="#2c492c">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $assets['css'] }}">
    @stack('head')
</head>
<body class="ta-body" data-ta-page="@yield('page', 'home')">
    @include($ns . '.partials.icons')

    <a class="ta-skip" href="#konten">Lewati ke konten</a>

    @include($ns . '.partials.topbar')
    @include($ns . '.partials.navbar')

    <main id="konten" class="ta-main">
        @yield('content')
    </main>

    @include($ns . '.partials.footer')
    @include($ns . '.partials.floating')
    @include($ns . '.partials.ai-data')

    <script src="{{ $assets['js'] }}" defer></script>
    @stack('scripts')
</body>
</html>
