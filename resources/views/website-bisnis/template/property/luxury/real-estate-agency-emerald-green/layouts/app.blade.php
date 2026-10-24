{{--
|--------------------------------------------------------------------------
| Layout utama template GreenHaven (HTML shell + persiapan data & helper)
|--------------------------------------------------------------------------
| Tiap halaman (index, property, specification, ...) hanya perlu mengisi:
|   $page   = nama halaman (sama dengan nama route, mis. 'property')
|   $blocks = daftar bagian yang ditampilkan: [nama-view, [opsi]]
| lalu memakai layout ini lewat extends. Semua data (dari config) dan helper
| ($img, $route, $icon) disiapkan SEKALI di blok PHP di bawah, lalu otomatis
| tersedia di partials dan sections.
|
| CATATAN: jangan menulis kata-kata direktif Blade untuk blok PHP di dalam
| komentar Blade, karena Blade memproses blok itu sebelum komentar dibuang.
--}}
@php
    // Nama view dasar (untuk include layouts/partials/sections) dan awalan nama route
    $v = 'website-bisnis.template.property.luxury.real-estate-agency-emerald-green';

    // Data halaman dari config
    $cfg       = config('template.property.luxury.real-estate-agency-emerald-green.real-estate-agency');
    $paths     = $cfg['paths'];
    $site      = $cfg['site'];
    $navItems  = $cfg['nav'];
    $footerNav = $cfg['footer_nav'];
    $searchMap = $cfg['search'];
    $pages     = $cfg['pages'];
    $property  = $cfg['property'];
    $listings  = $cfg['listings'];
    $features  = $cfg['features'];
    $about     = $cfg['about'];
    $priceInfo = $cfg['price_info'];
    $blogPosts = $cfg['blog'];
    $inquiry   = $cfg['inquiry'];
    $whatsapp  = $cfg['whatsapp'];
    $timeSlots = $cfg['time_slots'];
    $assistant = $cfg['assistant'];

    // Helper
    $img   = fn (string $file): string => asset($paths['images'] . '/' . $file);
    $route = fn (string $name = 'index', string $hash = ''): string => route($v . '.' . $name) . $hash;
    $icon  = fn (string $name, string $class = ''): \Illuminate\Support\HtmlString => new \Illuminate\Support\HtmlString(
        '<svg class="rea-icon ' . e($class) . '" aria-hidden="true" focusable="false"><use href="#i-' . e($name) . '"></use></svg>'
    );

    // Tandai item navbar aktif (dropdown aktif jika salah satu anaknya = halaman ini)
    $navItems = array_map(
        fn (array $i): array => $i + ['active' => $i['key'] === $page || in_array($page, array_map(fn (array $c): string => $c['key'], $i['children'] ?? []))],
        $navItems
    );

    // Target pencarian navbar (kata kunci => URL)
    $searchTargets = array_map(
        fn (array $s): array => ['words' => $s['words'], 'url' => $route($s['page'], $s['hash'])],
        $searchMap
    );

    // Lengkapi URL gambar
    $property['slides']  = array_map(fn (array $s): array => $s + ['src' => $img($s['file'])], $property['slides']);
    $property['gallery'] = array_map(fn (array $g): array => $g + ['src' => $img($g['file'])], $property['gallery']);
    $listings            = array_map(fn (array $l): array => $l + ['src' => $img($l['file'])], $listings);
    $blogPosts           = array_map(fn (array $p): array => $p + ['src' => $img($p['file'])], $blogPosts);
    $about['src']        = $img($about['file']);

    // Link WhatsApp
    $waUrl = 'https://wa.me/' . $whatsapp['number'] . '?text=' . rawurlencode($whatsapp['message']);

    // Judul tab browser
    $pageTitle = $page === 'index' ? $property['title'] . ' · ' . $property['place'] : $pages[$page]['title'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0f2f2a">
    <title>{{ $pageTitle }} | {{ $site['name'] }}</title>
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
    @foreach ($blocks as $block)
        @include($v . '.' . $block[0], $block[1] ?? [])
    @endforeach
</main>

@include($v . '.partials.footer')
@include($v . '.partials.ai-assistant')
@include($v . '.partials.whatsapp')

<script src="{{ asset($paths['js']) }}" defer></script>
@stack('scripts')
</body>
</html>