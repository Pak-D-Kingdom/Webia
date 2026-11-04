@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
<!DOCTYPE html>
<html lang="id" data-theme="forest-moss">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $cfg['site']['description'] }}">
    <meta name="theme-color" content="#03311f">
    <title>@yield('title')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset($cfg['img']['favicon']) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cfg['assets']['css']) }}">
</head>
<body class="gh">
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.icons')

    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    <header class="site-header" id="siteHeader">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.topbar')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.navbar')
    </header>

    <main id="main">
        @yield('content')
    </main>

    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.footer')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.floating')

    <script src="{{ asset($cfg['assets']['js']) }}" defer></script>
</body>
</html>
