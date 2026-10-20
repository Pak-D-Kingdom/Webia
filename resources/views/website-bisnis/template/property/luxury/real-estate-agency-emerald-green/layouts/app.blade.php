{{--
| Layout utama template GreenHaven (HTML shell).
| Variabel $site, $property, $nav, $paths, $img, $icon, $v disiapkan di index.blade.php.
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0f2f2a">
    <title>@yield('title', $property['title'] . ' · ' . $property['place'] . ' | ' . $site['name'])</title>
    <meta name="description" content="{{ $property['title'] }} di {{ $property['place'] }}. {{ $property['price_cur'] }} {{ $property['price'] }} {{ $property['price_note'] }}. Jadwalkan private viewing bersama {{ $site['name'] }}.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($paths['css']) }}">
    @stack('styles')
</head>
<body class="rea">

@include($v . '.partials.icons')

<a class="rea-skip" href="#main">Skip to main content</a>

@include($v . '.partials.topbar')
@include($v . '.partials.navbar')

<main id="main">
    @yield('content')
</main>

@include($v . '.partials.footer')
@include($v . '.partials.ai-assistant')

<script src="{{ asset($paths['js']) }}" defer></script>
@stack('scripts')
</body>
</html>
