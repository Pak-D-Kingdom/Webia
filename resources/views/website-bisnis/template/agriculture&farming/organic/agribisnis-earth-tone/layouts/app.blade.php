{{-- Path aset ditulis langsung di layout (tidak bergantung pada variabel dari route), agar agribisnis.css / agribisnis.js selalu terbaca. --}}
@php
    $assetPath = 'website-bisnis/template/agriculture&farming/organic/agribisnis-earth-tone';
    $cssUrl = asset('css/' . $assetPath . '/agribisnis.css');
    $jsUrl  = asset('js/' . $assetPath . '/agribisnis.js');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $data['brand']['title'])</title>
    <meta name="description" content="@yield('description', $data['brand']['summary'])">
    <meta name="theme-color" content="#3f4626">
    <link rel="icon" type="image/png" href="{{ $img }}/logo-leaf.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">
    <script>document.documentElement.className += " js";</script>
    <link rel="stylesheet" href="{{ $cssUrl }}">
    @stack('head')
</head>
<body class="ag-body" data-page="{{ $page }}">

    @include($v . '.partials.sprite')

    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    <header class="site-head" id="siteHead">
        @include($v . '.partials.topbar')
        @include($v . '.partials.navbar')
    </header>

    <main id="main" class="site-main">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.search')
    @include($v . '.partials.whatsapp-button')
    @include($v . '.partials.ai-chatbot')

    <script id="agConfig" type="application/json">{!! json_encode([
        'whatsapp' => $data['contact']['whatsapp'],
        'urls'     => $u,
        'img'      => $img,
        'chatbot'  => $data['chatbot'],
        'pages'    => $data['pages'],
        'commodities' => $data['commodities'],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
    <script src="{{ $jsUrl }}" defer></script>
    @stack('scripts')
</body>
</html>
