<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0e7a70">
    <title>@yield('title', $z['meta']['title'])</title>
    <meta name="description" content="@yield('description', $z['meta']['description'])">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($z['paths']['css'].'/company-profile.css') }}">
    @stack('styles')
</head>
<body class="ot" data-page="{{ $active ?? 'home' }}">
    @include($ns.'.partials.icons')

    <a class="ot-skip" href="#konten">Lewati ke konten utama</a>

    @include($ns.'.partials.topbar')
    @include($ns.'.partials.navbar')

    <main id="konten">
        @yield('content')
    </main>

    @include($ns.'.partials.footer')
    @include($ns.'.partials.quotation-modal')
    @include($ns.'.partials.video-modal')
    @include($ns.'.partials.floating-actions')
    @include($ns.'.partials.ai-faq-widget')

    <script src="{{ asset($z['paths']['js'].'/company-profile.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
