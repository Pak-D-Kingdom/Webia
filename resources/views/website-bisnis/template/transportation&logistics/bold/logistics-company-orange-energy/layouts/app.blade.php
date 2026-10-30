@php
    $faqs = collect($site['ai']['faqs'])->map(fn ($f) => [
        'q'        => $f['q'],
        'keywords' => $f['keywords'],
        'a'        => $f['a'],
        'cta'      => $f['cta'] ?? null,
        'url'      => isset($f['route']) ? $to($f['route']) : null,
    ])->values()->all();

    $jsConfig = [
        'whatsapp' => ['number' => $site['whatsapp']['number'], 'message' => $site['whatsapp']['message']],
        'tracking' => [
            'endpoint' => $site['tracking']['endpoint'],
            'stages'   => $site['tracking']['stages'],
            'demo'     => $site['tracking']['demo'],
        ],
        'ai' => [
            'botName'   => $site['ai']['bot_name'],
            'greeting'  => $site['ai']['greeting'],
            'fallback'  => $site['ai']['fallback'],
            'questions' => $site['ai']['questions'],
            'faqs'      => $faqs,
            'avatar'    => $img('robot-avatar.png'),
        ],
        'quote' => ['label' => $site['brand']['name']],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="lg-html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $site['brand']['name'].' - '.$site['brand']['tagline'])</title>
    <meta name="description" content="@yield('description', $site['brand']['description'])">
    <meta name="theme-color" content="#04172a">
    <link rel="icon" type="image/svg+xml" href="{{ $img('logo-mark.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($site['assets']['css']) }}?v={{ $site['assets']['version'] }}">
    @stack('head')
</head>
<body class="lg @yield('body_class')" id="top">
    <a class="lg-skip" href="#main">Lewati ke konten utama</a>

    @include($v.'partials.icons')
    @include($v.'partials.topbar')
    @include($v.'partials.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include($v.'partials.footer')
    @include($v.'partials.whatsapp-button')
    @include($v.'partials.chatbot')

    <div class="lg-toast" data-toast role="status" aria-live="polite"></div>

    <script type="application/json" id="lg-config">{!! json_encode($jsConfig, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS) !!}</script>
    <script src="{{ asset($site['assets']['js']) }}?v={{ $site['assets']['version'] }}" defer></script>
    @stack('scripts')
</body>
</html>
