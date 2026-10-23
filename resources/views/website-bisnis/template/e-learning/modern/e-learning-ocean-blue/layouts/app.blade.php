{{--
    Layout utama · E-learning · Modern · Ocean Blue
    Variabel $e (config), $ns (namespace view) dan $img (helper gambar) diwariskan dari halaman anak.
--}}
@php
    $ns  = $ns  ?? 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = $e   ?? config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = $img ?? fn ($f) => asset($e['assets']['img'].$f);
@endphp
<!DOCTYPE html>
<html lang="id" class="el-root">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b3a6b">
    <meta name="description" content="@yield('description', 'E-learna — kursus online berkualitas untuk meningkatkan skill dan mewujudkan karier impianmu.')">
    <title>@yield('title', $e['brand']['name'].' — Learn Anytime, Anywhere')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($e['assets']['css']) }}">
    @stack('head')
</head>
<body class="el-body el-page--@yield('page', 'home')">
    <a class="el-skip" href="#main">Lewati ke konten utama</a>

    @include($ns.'.partials.icons')
    @include($ns.'.partials.topbar')
    @include($ns.'.partials.navbar')

    <main id="main" class="el-main">
        @yield('content')
    </main>

    @include($ns.'.partials.footer')
    @include($ns.'.partials.floating-whatsapp')
    @include($ns.'.partials.ai-chatbot')

    <script src="{{ asset($e['assets']['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
