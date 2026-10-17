<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $c['meta']['title'] }}</title>
    <meta name="description" content="{{ $c['meta']['desc'] }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/template/company/elegan/company-profile-terracotta/company-profile.css') }}">
</head>
<body class="cp">
    @include("$v.partials.icons")
    <a class="cp-skip" href="#main">Lewati ke konten utama</a>

    @include("$v.partials.topbar")
    @include("$v.partials.navbar")

    <main id="main">
        @yield('content')
    </main>

    @include("$v.partials.footer")
    @include("$v.sections.ai-faq")

    <button class="cp-totop" type="button" aria-label="Kembali ke atas">{{ $ic('up') }}</button>

    <script src="{{ asset('js/website-bisnis/template/company/elegan/company-profile-terracotta/company-profile.js') }}" defer></script>
</body>
</html>
