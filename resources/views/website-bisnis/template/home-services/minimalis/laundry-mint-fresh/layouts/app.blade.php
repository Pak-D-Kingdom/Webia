@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', $c['brand']['name'] . ' — ' . $c['brand']['tagline'])</title>
    <meta name="description" content="@yield('description', $c['hero']['text'])">
    <meta name="theme-color" content="#E3F1E9">
    <link rel="icon" type="image/svg+xml" href="{{ $img($c['img']['logo']) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/' . $c['asset_path'] . '/laundry.css') }}">
</head>
<body class="lw @yield('body_class')">
    <a class="lw-skip" href="#lw-main">Lewati ke konten utama</a>

    @include($v . '.partials.icons')
    @include($v . '.partials.topbar')
    @include($v . '.partials.navbar')

    <main id="lw-main">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.floating')

    <script src="{{ asset('js/' . $c['asset_path'] . '/laundry.js') }}" defer></script>
</body>
</html>
