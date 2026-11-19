<!DOCTYPE html>
<html lang="id" class="uh-root">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0a2c28">
    <title>@yield('title', 'Nur Rahmat Travel — Umrah &amp; Haji')</title>
    <meta name="description" content="@yield('description', 'Paket umrah dan haji bersama Nur Rahmat Travel: pembimbing berpengalaman, fasilitas premium, harga terbaik, dan pelayanan 24 jam.')">
    <link rel="icon" type="image/jpeg" href="{{ $img('logo-emblem-terang.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ $css }}">
    @stack('styles')
</head>
<body class="uh-body uh-page-{{ $active }}" data-uh-page="{{ $active }}">
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.icons')

    <a class="uh-skip" href="#uh-main">Lewati ke konten utama</a>

    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.topbar')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.navbar')

    <main id="uh-main" class="uh-main">
        @yield('content')
    </main>

    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.footer')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.search')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.chatbot-panel')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.chatbot-button')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.whatsapp-button')

    <script type="application/json" id="uh-data">@json($jsData)</script>
    <script src="{{ $js }}" defer></script>
    @stack('scripts')
</body>
</html>
