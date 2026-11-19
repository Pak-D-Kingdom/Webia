{{--
    GlowClinic — Luxury / Champagne Glow
    Layout dasar: <head>, topbar, navbar, <main>, footer, tombol mengambang, AI assistant.
    Data: $c (config), $v (prefix view), $img (URL dasar gambar) dikirim dari routes/web.php.
--}}
@php
    $r = $r ?? fn (string $name, array|string $parameters = []) => route($name, $parameters);
    $cssUrl = asset('css/website-bisnis/template/healthcare/luxury/klinik-kecantikan-champagne-glow/klinik-kecantikan.css');
    $jsUrl  = asset('js/website-bisnis/template/healthcare/luxury/klinik-kecantikan-champagne-glow/klinik-kecantikan.js');
    $active = trim($__env->yieldContent('active', 'home'));

    $waNumber = $c['contact']['whatsapp'];
    $waUrl    = 'https://wa.me/' . $waNumber . '?text=' . rawurlencode($c['contact']['whatsapp_greeting']);

    // Data untuk JS (pencarian cepat, AI assistant, jadwal, WhatsApp). Statis, tanpa backend.
    $searchIndex = [];
    foreach ($c['nav'] as $n) {
        $searchIndex[] = ['t' => $n['label'], 'd' => 'Halaman', 'u' => $r($n['route']) . (isset($n['anchor']) ? '#' . $n['anchor'] : '')];
    }
    foreach ($c['services'] as $s)  { $searchIndex[] = ['t' => $s['title'], 'd' => 'Layanan — ' . $s['short'], 'u' => $r('glow.services') . '#' . $s['slug']]; }
    foreach ($c['doctors'] as $d)   { $searchIndex[] = ['t' => $d['name'], 'd' => $d['role'], 'u' => $r('glow.doctors') . '#' . $d['slug']]; }
    foreach ($c['faq'] as $i => $f)  { $searchIndex[] = ['t' => $f['q'], 'd' => 'FAQ', 'u' => $r('glow.faq') . '#faq-' . ($i + 1)]; }
    foreach ($c['policy'] as $p)    { $searchIndex[] = ['t' => $p['title'], 'd' => 'Kebijakan', 'u' => $r('glow.policy') . '#' . $p['slug']]; }

    $jsData = [
        'wa'          => $waNumber,
        'brand'       => $c['brand']['name'],
        'search'      => $searchIndex,
        'schedule'    => ['tz' => $c['schedule']['timezone'], 'hours' => $c['schedule']['hours']],
        'assistant'   => [
            'greeting' => $c['assistant']['greeting'],
            'answers'  => $c['assistant']['answers'],
            'fallback' => $c['assistant']['fallback'],
            'waLabel'  => 'Tanya dokter via WhatsApp',
        ],
        'slots'       => $c['appointment']['time_slots'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#8d6f4e">
    <meta name="description" content="@yield('description', $c['meta']['description'])">
    <title>@yield('title', $c['meta']['title'])</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ $cssUrl }}">
</head>
<body class="cg-body cg-page--{{ $active }}">

    <a class="cg-skip" href="#cg-main">Lewati ke konten utama</a>

    @include($v . '.partials.icons')
    @include($v . '.partials.topbar')
    @include($v . '.partials.navbar')

    @if ($c['customer_site'] ?? false)
        <p class="cg-container"><strong>{!! 'Contoh layanan & harga:' !!}</strong> layanan dan harga berikut merupakan konten demo.</p>
    @endif
    <main id="cg-main" class="cg-main">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.floating')
    @include($v . '.partials.ai-assistant')

    <script type="application/json" id="cg-data">{!! json_encode($jsData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
    <script src="{{ $jsUrl }}" defer></script>
</body>
</html>
