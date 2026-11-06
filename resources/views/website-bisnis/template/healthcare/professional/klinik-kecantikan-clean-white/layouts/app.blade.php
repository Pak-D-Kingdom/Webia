@php
    /*
     * Layout utama template Klinik Kecantikan — GlowAesthetics (Professional / Clean White).
     * $v, $clinic, $img biasanya sudah didefinisikan oleh halaman (index, services, dst.).
     * Fallback di bawah menjaga layout tetap aman bila di-extend dari view lain.
     */
    $v      = $v ?? 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = $clinic ?? config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = $img ?? fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);

    $routes = [
        'home'        => route('klinik-kecantikan.home'),
        'services'    => route('klinik-kecantikan.services'),
        'doctors'     => route('klinik-kecantikan.doctors'),
        'schedule'    => route('klinik-kecantikan.schedule'),
        'appointment' => route('klinik-kecantikan.appointment'),
        'faq'         => route('klinik-kecantikan.faq'),
        'policy'      => route('klinik-kecantikan.policy'),
    ];

    // Data ringan untuk JavaScript (jadwal, asisten AI, pencarian)
    $glData = [
        'routes'   => $routes,
        'contact'  => [
            'whatsapp' => $clinic['contact']['whatsapp'],
            'phone'    => $clinic['contact']['phone'],
            'email'    => $clinic['contact']['email'],
            'address'  => $clinic['contact']['address'],
            'hours'    => $clinic['contact']['hours_short'],
            'maps'     => $clinic['contact']['maps_link'],
        ],
        'brand'    => $clinic['brand']['name'],
        'weekdays' => $clinic['weekdays'],
        'months'   => $clinic['months'],
        'services' => collect($clinic['services'])->map(fn ($s) => [
            'slug' => $s['slug'], 'name' => $s['name'], 'short' => $s['short'], 'price' => $s['price'], 'duration' => $s['duration'],
        ])->all(),
        'doctors'  => collect($clinic['doctors'])->map(fn ($d) => [
            'id' => $d['id'], 'name' => $d['name'], 'role' => $d['role'], 'days' => $d['days'],
        ])->all(),
        'schedule' => $clinic['schedule'],
        'policies' => collect($clinic['policies'])->map(fn ($p) => ['slug' => $p['slug'], 'title' => $p['title']])->all(),
        'faqs'     => $clinic['faqs'],
        'tips'     => $clinic['assistant']['tips'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="gl-html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6c7bd4">
    <title>@yield('title', $clinic['brand']['name'] . ' — ' . $clinic['brand']['tagline'])</title>
    <meta name="description" content="@yield('description', $clinic['meta']['description'])">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($clinic['paths']['css']) }}">
    @stack('styles')
</head>
<body class="gl-body @yield('body_class')">
    <a class="gl-skip" href="#gl-main">Lewati ke konten utama</a>

    @include($v . 'partials.icons')
    @include($v . 'partials.topbar')
    @include($v . 'partials.navbar')

    <main id="gl-main" class="gl-main" tabindex="-1">
        @yield('content')
    </main>

    @include($v . 'partials.footer')
    @include($v . 'partials.whatsapp-button')
    @include($v . 'partials.ai-assistant')

    @stack('modals')

    <script type="application/json" id="gl-data">{!! json_encode($glData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
    <script src="{{ asset($clinic['paths']['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
