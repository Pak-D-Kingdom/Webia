{{--
    Layout utama GrandJourney (Luxury · Navy Champagne Gold).
    Variabel dari route: $ns, $page, $t, $css, $js, $url(), $img(), $idr(), $icon()
--}}
@php
    $brand = $t['brand'];
    $bot   = $t['chatbot'];

    // Data ringan untuk AI chatbot statis (dibaca oleh travel-agent.js)
    $gj = [
        'whatsapp'  => $brand['whatsapp'],
        'mascot'    => $img('mascot-head.jpg'),
        'greeting'  => $bot['greeting'],
        'fallback'  => $bot['fallback'],
        'chips'     => $bot['chips'],
        'faq'       => $bot['faq'],
        'urls'      => [
            'destinasi' => $url('destinasi'), 'paket' => $url('paket'), 'itinerary' => $url('itinerary'),
            'harga' => $url('harga'), 'jadwal' => $url('jadwal'), 'inquiry' => $url('inquiry'), 'faq' => $url('faq'),
        ],
        'destinations' => array_map(fn ($d) => [
            'name' => $d['name'], 'country' => $d['country'], 'desc' => $d['desc'],
            'best_time' => $d['best_time'], 'from' => $idr($d['from']),
        ], $t['destinations']),
        'packages' => array_map(fn ($p) => [
            'name' => $p['name'], 'duration' => $p['duration'], 'price' => $idr($p['price']),
            'highlights' => $p['highlights'],
        ], $t['packages']),
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'GrandJourney — Luxury Travel & Tour')</title>
    <meta name="description" content="@yield('description', 'GrandJourney: perjalanan mewah dengan destinasi eksklusif, paket tour premium, dan layanan personal.')">
    <meta name="theme-color" content="#16233f">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $css }}">
</head>
<body class="ga ga-page-{{ $page }}" data-page="{{ $page }}">
    <a class="ga-skip" href="#konten">Lewati ke konten utama</a>

    @include($ns . '.partials.topbar')
    @include($ns . '.partials.navbar')

    <main id="konten">
        @yield('content')
    </main>

    @include($ns . '.partials.footer')
    @include($ns . '.partials.whatsapp-button')
    @include($ns . '.partials.ai-chatbot')

    <script>window.GJ = @json($gj);</script>
    <script src="{{ $js }}" defer></script>
</body>
</html>
