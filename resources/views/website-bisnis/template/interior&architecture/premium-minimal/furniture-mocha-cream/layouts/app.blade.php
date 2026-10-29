{{--
    Layout utama WoodenLane · Furniture · Premium Minimal · Mocha Cream
    Variabel $ns, $cfg, $route, $img dideklarasikan di tiap halaman (lihat index.blade.php).
--}}
@php
    $c = $cfg['contact'];

    // Peta route -> URL untuk JS (chatbot, pencarian, dll)
    $routeKeys = ['home','hero','catalog','custom-design','materials','dimensions','gallery','custom-order','lead-time','quotation','ai-chatbot'];
    $routes = [];
    foreach ($routeKeys as $k) { $routes[$k] = $route($k); }

    // Indeks pencarian (halaman + kategori + material)
    $search = [];
    $pages = [
        ['Beranda', 'home', 'Halaman utama WoodenLane'],
        ['Hero Banner', 'hero', 'Banner utama & keunggulan kami'],
        ['Katalog Furniture', 'catalog', 'Sofa, meja, kursi, lemari, ranjang, rak'],
        ['Custom Design Options', 'custom-design', 'Pilih gaya, ukuran, dan warna'],
        ['Material & Finishing', 'materials', 'Kayu jati, oak, walnut, finishing'],
        ['Product Dimensions', 'dimensions', 'Ukuran standar produk'],
        ['Project Gallery', 'gallery', 'Inspirasi proyek kami'],
        ['Custom Order Form', 'custom-order', 'Mulai pesanan custom'],
        ['Production Lead Time', 'lead-time', 'Estimasi waktu produksi'],
        ['Quotation Request', 'quotation', 'Minta penawaran harga'],
        ['AI Chatbot', 'ai-chatbot', 'FAQ produk & custom furniture'],
    ];
    foreach ($pages as $p)  { $search[] = ['t' => $p[0], 'd' => $p[2], 'u' => $routes[$p[1]], 'k' => 'Halaman']; }
    foreach ($cfg['catalog']['items'] as $it) { $search[] = ['t' => $it['name'], 'd' => implode(', ', $it['types']), 'u' => $routes['catalog'].'?cat='.$it['slug'], 'k' => 'Katalog']; }
    foreach ($cfg['materials']['items'] as $m) { $search[] = ['t' => $m['name'], 'd' => $m['grain'], 'u' => $routes['materials'].'?m='.$m['key'], 'k' => 'Material']; }

    $fmData = [
        'wa'         => $c['whatsapp'],
        'brand'      => $cfg['brand']['name'],
        'routes'     => $routes,
        'search'     => $search,
        'ai'         => $cfg['ai'],
        'catalog'    => $cfg['catalog'],
        'materials'  => $cfg['materials'],
        'dimensions' => $cfg['dimensions']['groups'],
        'leadTime'   => $cfg['lead_time'],
        'custom'     => $cfg['custom_design'],
        'img'        => asset($cfg['assets']['img']),
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Beranda') · {{ $cfg['brand']['name'] }} — {{ $cfg['brand']['tagline'] }}</title>
    <meta name="description" content="@yield('description', 'WoodenLane — furniture custom premium. Desain elegan, material berkualitas, dan bisa disesuaikan dengan ruang dan gaya hidup Anda.')">
    <meta name="theme-color" content="#786657">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600&family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cfg['assets']['css']) }}">
    <script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
</head>
<body class="fm @yield('body-class')">
    <a class="fm-skip" href="#fm-main">Lewati ke konten utama</a>

    @include($ns.'.partials.icons')
    @include($ns.'.partials.topbar')
    @include($ns.'.partials.navbar')
    @include($ns.'.partials.search')

    <main id="fm-main" tabindex="-1">
        @yield('content')
    </main>

    @include($ns.'.partials.footer')
    @include($ns.'.partials.whatsapp-button')
    @include($ns.'.partials.ai-chatbot-button')

    <script type="application/json" id="fm-data">@json($fmData)</script>
    <script src="{{ asset($cfg['assets']['js']) }}" defer></script>
</body>
</html>
