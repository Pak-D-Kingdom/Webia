{{-- Layout utama NovaLearn · E-Learning Futuristic Dark Mode --}}
@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#050a1c">
    <meta name="color-scheme" content="dark">
    <title>@yield('title', 'Home') · {{ $e['brand']['name'] }}</title>
    <meta name="description" content="@yield('description', $e['hero']['text'])">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($e['css'].'/e-learning.css') }}">
    @stack('head')
</head>
<body class="nl" data-page="@yield('page', 'home')">
    <a class="nl-skip" href="#konten">Lewati ke konten</a>

    @include($v.'.partials.icons')
    @include($v.'.partials.topbar')
    @include($v.'.partials.navbar')

    <main id="konten">
        @yield('content')
    </main>

    @include($v.'.partials.footer')
    @include($v.'.partials.search')
    @include($v.'.partials.floating')

    <script src="{{ asset($e['js'].'/e-learning.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
