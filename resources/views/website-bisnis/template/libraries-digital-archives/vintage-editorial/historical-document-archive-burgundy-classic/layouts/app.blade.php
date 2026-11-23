<!DOCTYPE html>
<html lang="en" class="hda-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') — {{ $hda['site']['name'] }}</title>
    <meta name="description" content="{{ $hda['hero']['text'] }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,500&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $hcss }}">
    <style>
        html,body{margin:0;padding:0}
        .hda-app{--tex-parch:url('{{ $ha('ui/parchment-tile.webp') }}');--tex-paper:url('{{ $ha('ui/paper-aged-tile.webp') }}');--tex-leather:url('{{ $ha('ui/leather-tile.webp') }}');--img-divider:url('{{ $ha('ui/divider-dark.svg') }}');--img-corner:url('{{ $ha('ui/corner.svg') }}');--img-torn:url('{{ $ha('ui/torn-edge.svg') }}');--img-torn-dark:url('{{ $ha('ui/torn-edge-dark.svg') }}');--img-compass:url('{{ $ha('ui/compass.svg') }}');--img-compass-light:url('{{ $ha('ui/compass-light.svg') }}')}
        .hda-orn--dark::before,.hda-orn--dark::after{background-image:url('{{ $ha('ui/divider.svg') }}')}
        .hda-hero__orn{background-image:url('{{ $ha('ui/divider.svg') }}')}
    </style>
</head>
<body class="hda-no-js" data-route="{{ $route }}">
<div class="hda-app" id="hda-app">
    <a class="hda-skip" href="#main">Skip to content</a>
    @include($hv.'partials.sprite')
    @include($hv.'partials.topbar')
    @include($hv.'partials.navbar')
    <main id="main" tabindex="-1">
        @yield('content')
    </main>
    @include($hv.'partials.footer')
    @include($hv.'partials.floating')
    <div class="hda-toast" id="hda-toast" role="status" aria-live="polite"></div>
</div>
<script type="application/json" id="hda-index">{!! $hindex !!}</script>
<script type="application/json" id="hda-assistant">{!! $hassistant !!}</script>
<script src="{{ $hjs }}" defer></script>
</body>
</html>
