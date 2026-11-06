<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1b392b">
    <title>@yield('title', $t['meta']['title'])</title>
    <meta name="description" content="@yield('description', $t['meta']['description'])">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($t['assets']['css']) }}">
</head>
<body class="ge" data-page="{{ $active }}">
    <a class="skip-link" href="#main">Lewati ke konten</a>

    @include($ns.'partials.icons')
    @include($ns.'partials.topbar')
    @include($ns.'partials.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include($ns.'partials.footer')
    @include($ns.'partials.floating')

    <script src="{{ asset($t['assets']['js']) }}" defer></script>
</body>
</html>
