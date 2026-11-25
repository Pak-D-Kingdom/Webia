<!DOCTYPE html>
<html lang="id" class="bca-html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ $site['name'] }}</title>
    <meta name="description" content="{{ $site['description'] }}">
    <meta name="theme-color" content="#2340F0">
    <link rel="stylesheet" href="{{ asset($site['css']) }}">
    <script>document.documentElement.className += ' bca-js';</script>
</head>
<body class="bca-body">
<div class="bca-scrollbar" aria-hidden="true"><i data-bca-progress></i></div>
<div class="bca-root">
    <a class="bca-skip" href="#bca-main">Lewati ke konten utama</a>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.topbar')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.navbar')

    <main id="bca-main" tabindex="-1">
        @yield('content')
    </main>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.footer')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.search')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.floating')
</div>
<script src="{{ asset($site['js']) }}" defer></script>
</body>
</html>
