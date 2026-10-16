<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $cafe['brand']['title'])</title>
    <meta name="description" content="@yield('description', $cafe['brand']['description'])">
    <meta name="theme-color" content="#10201b">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cafe['assets']['css']) }}">
    @stack('head')
</head>
<body class="lm">
    @include("$v.partials.icons")

    <a class="lm-skip" href="#konten">Lewati ke konten</a>

    @include("$v.partials.topbar")
    @include("$v.partials.navbar")

    <main id="konten">
        @yield('content')
    </main>

    @include("$v.partials.footer")

    <script src="{{ asset($cafe['assets']['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
