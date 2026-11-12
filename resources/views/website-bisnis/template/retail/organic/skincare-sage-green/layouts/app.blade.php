@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
    $active ??= 'home';

    // Data untuk skincare.js (dirakit di sini, lalu di-encode lewat json di bawah)
    $sgData = [
        'brand'    => $cfg['brand']['name'],
        'whatsapp' => $cfg['whatsapp'],
        'imgBase'  => $img,
        'freeFrom' => $cfg['shipping']['free_from'],
        'lowStock' => $cfg['stock']['low_threshold'],
        'products' => $cfg['products'],
        'categories' => $cfg['categories'],
        'ai'       => $cfg['ai'],
        'routes'   => [
            'catalog' => $r('catalog'),
            'price'   => $r('price'),
            'stock'   => $r('stock'),
            'shop'    => $r('shop'),
            'inquiry' => $r('inquiry'),
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#768260">
    <title>@yield('title', $cfg['brand']['title'])</title>
    <meta name="description" content="@yield('description', $cfg['brand']['description'])">
    <meta property="og:title" content="@yield('title', $cfg['brand']['title'])">
    <meta property="og:description" content="@yield('description', $cfg['brand']['description'])">
    <meta property="og:image" content="{{ $img }}/hero-products.jpg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cfg['assets']['css']) }}">
    <script>document.documentElement.classList.remove('no-js');</script>
</head>
<body class="sg" data-page="{{ $active }}">
    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    @include($cfg['view'] . 'partials.icons')
    @include($cfg['view'] . 'partials.topbar')
    @include($cfg['view'] . 'partials.navbar')

    <main id="main">
        @if ($cfg['customer_site'] ?? false)
            <p class="container"><strong>Contoh katalog:</strong> produk, harga, dan stok berikut merupakan konten demo.</p>
        @endif
        @yield('content')
    </main>

    @include($cfg['view'] . 'partials.footer')
    @include($cfg['view'] . 'partials.floating')

    <script>
        window.SKINCARE = @json($sgData);
    </script>
    <script src="{{ asset($cfg['assets']['js']) }}" defer></script>
</body>
</html>
