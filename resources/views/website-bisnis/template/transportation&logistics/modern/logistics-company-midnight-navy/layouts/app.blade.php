<!DOCTYPE html>
<html lang="id" class="lc-nojs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', $site['brand']['name'] . ' — ' . $site['brand']['tagline'])</title>
    <meta name="description" content="@yield('meta_description', $site['meta']['description'])">
    <meta name="theme-color" content="#052543">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>document.documentElement.className = document.documentElement.className.replace("lc-nojs", "lc-js");</script>
    <link rel="stylesheet" href="{{ asset($site['paths']['css']) }}">
</head>
<body class="lc-body lc-page-@yield('page', 'home')">
    @include($site['view'] . '.partials.icons')

    <a class="lc-skip" href="#lc-main">Lewati ke konten utama</a>

    @include($site['view'] . '.partials.topbar')
    @include($site['view'] . '.partials.navbar')

    <main id="lc-main" class="lc-main">
        @yield('content')
    </main>

    @include($site['view'] . '.partials.footer')
    @include($site['view'] . '.partials.floating')

    <script src="{{ asset($site['paths']['js']) }}" defer></script>
</body>
</html>
