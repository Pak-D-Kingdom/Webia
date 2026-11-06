{{--
|--------------------------------------------------------------------------
| Layout utama template GreenHaven (HTML shell + persiapan data & helper)
|--------------------------------------------------------------------------
| Tiap halaman (index, property, property-detail, about, ...) hanya perlu mengisi:
|   $page   = nama halaman (sama dengan nama route, mis. 'property')
|   $blocks = daftar bagian yang ditampilkan: [nama-view, [opsi]]
|   $detail = true (hanya halaman detail properti), $articleView = true (hanya halaman artikel blog)
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
    $cfg        = config('template.property.luxury.real-estate-agency-emerald-green.real-estate-agency');
    $paths      = $cfg['paths'];
    $site       = $cfg['site'];
    $navItems   = $cfg['nav'];
    $footerNav  = $cfg['footer_nav'];
    $searchMap  = $cfg['search'];
    $pages      = $cfg['pages'];
    $properties = $cfg['properties'];
    $features   = $cfg['features'];
    $about      = $cfg['about'];
    $payments   = $cfg['payments'];
    $blogPosts  = $cfg['blog'];
    $inquiry    = $cfg['inquiry'];
    $whatsapp   = $cfg['whatsapp'];
    $timeSlots  = $cfg['time_slots'];
    $assistant  = $cfg['assistant'];
    $headerImages = $cfg['header_images'];
    $detailCfg    = $cfg['detail'];

    // Properti yang sedang ditampilkan:
    // halaman detail (/property/{slug}) memakai $slug dari URL, halaman lain memakai properti utama.
    $slug = $slug ?? array_key_first($properties);
    abort_unless(array_key_exists($slug, $properties), 404);
    $property = $properties[$slug];

    // Helper
    $img   = fn (string $file): string => asset($paths['images'] . '/' . $file);
    $route = fn (string $name = 'index', string $hash = '', array $params = []): string => route($v . '.' . $name, $params) . $hash;
    $icon  = fn (string $name, string $class = ''): \Illuminate\Support\HtmlString => new \Illuminate\Support\HtmlString(
        '<svg class="rea-icon ' . e($class) . '" aria-hidden="true" focusable="false"><use href="#i-' . e($name) . '"></use></svg>'
    );

    // Target pencarian navbar (kata kunci => URL)
    $searchTargets = array_map(
        fn (array $s): array => ['words' => $s['words'], 'url' => $route($s['page'], $s['hash'])],
        $searchMap
    );

    // Lengkapi URL gambar
    $property['slides']  = array_map(fn (array $s): array => $s + ['src' => $img($s['file'])], $property['slides'] ?? []);
    $property['gallery'] = array_map(fn (array $g): array => $g + ['src' => $img($g['file'])], $property['gallery']);
    $listings            = array_map(fn (array $p): array => $p + ['src' => $img($p['card_file'])], array_values($properties));
    $blogPosts           = array_map(fn (array $p): array => $p + ['src' => $img($p['file'])], $blogPosts);
    $about['src']        = $img($about['file']);

    // Artikel blog yang sedang dibuka (halaman /blog/{post}); halaman lain tidak memakainya
    $postSlug = $post ?? array_key_first($blogPosts);
    abort_unless(array_key_exists($postSlug, $blogPosts), 404);
    $currentPost = $blogPosts[$postSlug];

    // Gambar latar header halaman dalam
    $headImage = ($detail ?? false)
        ? $property['gallery'][0]['src']
        : (($articleView ?? false) ? $currentPost['src'] : $img($headerImages[$page] ?? 'header-property.jpg'));

    // Jawaban FAQ AI mengikuti properti yang sedang dilihat
    $faqVars = [
        '{title}'       => $property['title'],
        '{price}'       => $property['price_cur'] . ' ' . $property['price'] . ' ' . $property['price_note'],
        '{address}'     => $property['address'],
        '{land}'        => $property['facts']['land'],
        '{building}'    => $property['facts']['building'],
        '{bedrooms}'    => $property['facts']['bedrooms'],
        '{bathrooms}'   => $property['facts']['bathrooms'],
        '{carport}'     => $property['facts']['carport'],
        '{year}'        => $property['facts']['year'],
        '{certificate}' => $property['facts']['certificate'],
        '{place_name}'  => $property['place_name'],
        '{view}'        => $property['facts']['view'],
    ];
    $property['description']  = array_map(fn (string $t): string => strtr($t, $faqVars), $property['description'] ?? []);
    $property['story_points'] = array_map(fn (string $t): string => strtr($t, $faqVars), $property['story_points'] ?? []);
    $assistant['faq'] = array_map(fn (array $f): array => ['a' => strtr($f['a'], $faqVars)] + $f, $assistant['faq']);

    // Link WhatsApp (pesan otomatis menyebut properti yang sedang dilihat)
    $waUrl = 'https://wa.me/' . $whatsapp['number'] . '?text=' . rawurlencode(sprintf($whatsapp['message'], $property['title'], $property['place']));

    // Judul tab browser
    $pageTitle = ($detail ?? false) ? $property['title'] : (($articleView ?? false) ? $currentPost['title'] : ($page === 'index' ? $property['title'] . ' · ' . $property['place'] : $pages[$page]['title']));
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
