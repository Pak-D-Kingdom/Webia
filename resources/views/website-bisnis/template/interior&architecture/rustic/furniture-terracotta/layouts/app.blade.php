@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@php
    $rfData = [
        'whatsapp'   => $f['contact']['whatsapp'],
        'brand'      => $f['meta']['name'],
        'img'        => asset($f['assets']['img']),
        'routes'     => [
            'catalog' => $r('catalog'), 'quotation' => $r('quotation'),
            'order' => $r('order-form'), 'customDesign' => $r('custom-design'),
            'materials' => $r('materials'), 'leadTime' => $r('lead-time'), 'dimensions' => $r('dimensions'),
        ],
        'categories' => $f['categories'],
        'products'   => $f['products'],
        'custom'     => $f['custom'],
        'materials'  => $f['materials'],
        'finishings' => $f['finishings'],
        'projects'   => $f['projects'],
        'leadTimes'  => $f['lead_times'],
        'faq'        => $f['faq'],
        'video'      => $f['hero']['video_url'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Beranda') — {{ $f['meta']['name'] }}</title>
    <meta name="description" content="@yield('description', $f['meta']['description'])">
    <meta name="theme-color" content="#843c21">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($f['assets']['css']) }}">
    @stack('styles')
</head>
<body class="rf-body" data-page="@yield('page', 'home')">
    <a class="rf-skip" href="#rf-main">Lewati ke konten utama</a>

    @include($v . '.partials.topbar')
    @include($v . '.partials.navbar')

    <main id="rf-main">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.floating')

    <script>window.RF = @json($rfData, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG);</script>
    <script src="{{ asset($f['assets']['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
