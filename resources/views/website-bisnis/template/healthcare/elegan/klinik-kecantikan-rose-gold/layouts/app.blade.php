{{--
    Layout utama — RoseGlow Clinic (Elegan / Rose Gold)
    Variabel dari route: $cfg, $tpl, $rp, $page
--}}
@php $c = config($cfg); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#b86d5d">
    <title>@yield('title', $c['meta']['title'])</title>
    <meta name="description" content="@yield('description', $c['meta']['description'])">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset($c['css']) }}">
    @stack('head')
</head>
<body class="rg-site" data-page="{{ $page }}">
    <a class="rg-skip" href="#rgMain">Lewati ke konten</a>

    @include($tpl . '.partials.topbar')
    @include($tpl . '.partials.navbar')

    <main id="rgMain">
        @yield('content')
    </main>

    @include($tpl . '.partials.footer')
    @include($tpl . '.partials.floating')

    <script src="{{ asset($c['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
