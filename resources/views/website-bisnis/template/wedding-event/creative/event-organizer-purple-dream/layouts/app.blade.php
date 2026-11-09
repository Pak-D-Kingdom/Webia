<!DOCTYPE html>
<html lang="id" class="eo-html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#2a0f58">
    <title>@yield('title') | {{ $eo['brand']['name'] }}</title>
    <meta name="description" content="@yield('description')">
    <link rel="icon" type="image/svg+xml" href="{{ asset($eo['assets']['img']) }}/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600;700&family=Playfair+Display:wght@500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>document.documentElement.classList.add('eo-js');</script>
    <link rel="stylesheet" href="{{ asset($eo['assets']['css']) }}">
</head>
<body class="eo eo-page-{{ $page }}"
      data-eo-page="{{ $page }}"
      data-eo-base="{{ url($eo['base']) }}"
      data-eo-wa="{{ $eo['whatsapp']['number'] }}"
      data-eo-img="{{ asset($eo['assets']['img']) }}">

    @include($eo['view'].'partials.icons')

    <a class="eo-skip" href="#eo-main">Lewati ke konten utama</a>

    @include($eo['view'].'partials.topbar')
    @include($eo['view'].'partials.navbar')

    <main id="eo-main" class="eo-main">
        @yield('content')
    </main>

    @include($eo['view'].'partials.footer')
    @include($eo['view'].'partials.floating')
    @include($eo['view'].'partials.overlays')

    <script type="application/json" id="eo-assistant-data">{!! json_encode($eo['assistant'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
    <script defer src="{{ asset($eo['assets']['js']) }}"></script>
</body>
</html>
