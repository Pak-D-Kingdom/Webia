<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#2c3224">

    <title>@yield('title', $cafe['brand']['name'] . ' — ' . $cafe['brand']['tagline'])</title>
    <meta name="description" content="@yield('description', $cafe['brand']['description'])">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Mrs+Saint+Delafield&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cafe['paths']['css'] . '/cafe.css') }}">
    @stack('styles')
</head>
<body class="kl" data-kl-page="@yield('page', 'home')">
    <a class="kl-skip" href="#konten">Lewati ke konten utama</a>

    @include("$ns.partials.icons")
    @include("$ns.partials.topbar")
    @include("$ns.partials.navbar")

    <main id="konten">
        @yield('content')
    </main>

    @include("$ns.partials.footer")
    @include("$ns.partials.whatsapp-float")

    <script src="{{ asset($cafe['paths']['js'] . '/cafe.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
