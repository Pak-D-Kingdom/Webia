@php
    $img = $img ?? fn ($f) => asset($agro['img_path'] . '/' . $f);
    $assetDir = 'website-bisnis/template/agriculture&farming/professional/agribisnis-classic-trust';
    $rn = 'agribisnis-classic-trust.';

    $pageKeys = ['home', 'komoditas', 'panen', 'spesifikasi', 'minimum', 'kapasitas', 'distribusi', 'sertifikasi', 'b2b', 'penawaran', 'ai'];
    $pageUrls = [];
    foreach ($pageKeys as $k) {
        $pageUrls[$k] = route($rn . $k);
    }

    $faqPayload = [];
    foreach ($agro['ai']['faq'] as $f) {
        $faqPayload[] = [
            'q'   => $f['q'],
            'a'   => $f['a'],
            'kw'  => $f['kw'],
            'cta' => $f['cta'],
            'url' => $pageUrls[$f['page']] ?? $pageUrls['home'],
        ];
    }

    $topicPayload = [];
    foreach ($agro['ai']['topics'] as $t) {
        $topicPayload[] = ['label' => $t[0], 'icon' => $t[1], 'q' => $t[2]];
    }

    $searchCommodities = [];
    foreach ($agro['commodities'] as $c) {
        $searchCommodities[] = [
            'name'  => $c['name'],
            'slug'  => $c['slug'],
            'group' => $c['group'],
            'tag'   => $c['tagline'],
            'meta'  => $c['origin'],
            'thumb' => $img($c['img']),
            'url'   => $pageUrls['komoditas'] . '#' . $c['slug'],
        ];
    }

    $searchPages = [];
    foreach ($agro['search_pages'] as $p) {
        $searchPages[] = [
            'title' => $p['title'],
            'desc'  => $p['desc'],
            'icon'  => $p['icon'],
            'kw'    => $p['kw'],
            'url'   => $pageUrls[$p['route']],
        ];
    }

    $payload = [
        'whatsapp' => $agro['whatsapp'],
        'urls'     => $pageUrls,
        'ai'       => [
            'welcome'  => $agro['ai']['welcome'],
            'fallback' => $agro['ai']['fallback'],
            'chips'    => $agro['ai']['chips'],
            'topics'   => $topicPayload,
            'faq'      => $faqPayload,
        ],
        'search'   => [
            'commodities' => $searchCommodities,
            'pages'       => $searchPages,
            'action'      => $pageUrls['komoditas'],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', $agro['meta']['title'])</title>
    <meta name="description" content="@yield('description', 'AgroTrade — agribisnis dan perdagangan komoditas pertanian berkualitas ekspor: padi, jagung, kopi, kakao, kelapa sawit, karet, lada, teh, sayuran, dan buah-buahan.')">
    <meta name="theme-color" content="#0f2622">
    <link rel="icon" type="image/svg+xml" href="{{ $img('favicon.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/' . $assetDir . '/logistics-agribisnis.css') }}">

    <style>
        :root {
            --img-hero: url('{!! $img('hero-bg.jpg') !!}');
            --img-panen: url('{!! $img('panen-bg.jpg') !!}');
            --img-proses: url('{!! $img('proses-daun.jpg') !!}');
            --img-peta: url('{!! $img('peta-indonesia.jpg') !!}');
            --img-footer-kiri: url('{!! $img('footer-daun-kiri.jpg') !!}');
            --img-footer-kanan: url('{!! $img('footer-daun-kanan.jpg') !!}');
        }
    </style>
    <script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
    @stack('head')
</head>
<body class="agro @yield('body_class')">
    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    @include($v . '.partials.icons')
    @include($v . '.partials.header')

    <main id="main" tabindex="-1">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.floating')

    <script type="application/json" id="agro-data">{!! json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
    <script src="{{ asset('js/' . $assetDir . '/agribisnis.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
