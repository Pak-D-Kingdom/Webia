@php
    // Master layout. Variabel $t/$rp/$v/$img juga diteruskan ke semua partial & section.
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix'];
    $v   = $t['view'];
    $img = asset($t['assets']['images']).'/';
    $ver = fn (string $file) => @filemtime(public_path($file)) ?: 1;

    // Data yang dibaca e-learning.js (chatbot, WhatsApp, newsletter).
    $jsConfig = [
        'whatsapp'   => 'https://wa.me/'.$t['contact']['whatsapp'].'?text='.rawurlencode($t['contact']['whatsapp_text']),
        'ai'         => ['intro' => $t['ai']['intro'], 'fallback' => $t['ai']['fallback'], 'faq' => $t['ai']['faq']],
        'formWhatsapp' => $t['contact']['form_whatsapp'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $t['meta']['description'] }}">
    <meta name="theme-color" content="#bae9fb">
    <title>@hasSection('title')@yield('title') · {{ $t['brand']['name'] }}@else{{ $t['meta']['title'] }}@endif</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ $t['cdn']['fonts'] }}">
    <link rel="stylesheet" href="{{ $t['cdn']['icons'] }}">
    <link rel="stylesheet" href="{{ asset($t['assets']['css']) }}?v={{ $ver($t['assets']['css']) }}">
    <script>document.documentElement.className = 'js';</script>
    @stack('head')
</head>
<body class="el" data-page="@yield('page', 'home')">
    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    @include($v.'.partials.topbar')
    @include($v.'.partials.navbar')

    <main id="main" tabindex="-1">
        @yield('content')
    </main>

    @include($v.'.partials.footer')
    @include($v.'.partials.floating')

    <script type="application/json" id="el-config">@json($jsConfig, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)</script>
    <script src="{{ asset($t['assets']['js']) }}?v={{ $ver($t['assets']['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>