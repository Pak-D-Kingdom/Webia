@php
    $routes = [
        'home'    => route('skincare-warm-neutral.home'),
        'catalog' => route('skincare-warm-neutral.catalog'),
        'price'   => route('skincare-warm-neutral.price'),
        'stock'   => route('skincare-warm-neutral.stock'),
        'inquiry' => route('skincare-warm-neutral.inquiry'),
        'cart'    => route('skincare-warm-neutral.cart'),
    ];
    $jsCfg = [
        'brand'        => $skin['name'],
        'whatsapp'     => $skin['whatsapp'],
        'freeShipping' => $skin['free_shipping_min'],
        'urls'         => $routes,
        'products'     => collect($skin['products'])->map(fn ($p) => [
            'id' => $p['id'], 'name' => $p['name'], 'price' => $p['price'], 'stock' => $p['stock'],
            'category' => $p['category'], 'image' => asset($skin['img'] . '/' . $p['image']),
        ])->values(),
        'ai' => [
            'fallback' => $skin['ai']['fallback'],
            'faq'      => $skin['ai']['faq'],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $skin['name'] . ' — ' . $skin['tagline'])</title>
    <meta name="description" content="@yield('description', $skin['hero']['text'])">
    <meta name="theme-color" content="#8a5a47">
    <link rel="icon" href="{{ asset($skin['img'] . '/logo-leaf.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset($skin['assets']['css']) }}">
    <script>document.documentElement.classList.replace('no-js', 'js');</script>
</head>
<body class="sk @yield('body_class')">
    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    @include($ns . '.partials.topbar')
    @include($ns . '.partials.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include($ns . '.partials.footer')
    @include($ns . '.partials.floating')

    <div class="toast" data-toast role="status" aria-live="polite" hidden></div>

    <script>window.SKIN = @json($jsCfg);</script>
    <script src="{{ asset($skin['assets']['js']) }}" defer></script>
</body>
</html>
