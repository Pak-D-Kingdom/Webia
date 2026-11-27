@php
    $dam = config('template.digital-products.creative-tech.digital-asset-marketplace-galaksi.digital-asset-marketplace');
    $v = 'website-bisnis.template.digital-products.creative-tech.digital-asset-marketplace-galaksi';
    $u = fn ($p = '') => url(trim($dam['base_path'] . '/' . $p, '/'));
    $img = fn ($f) => asset($dam['assets_path']['images'] . '/' . $f);
    $rp = fn ($n) => $n ? 'Rp ' . number_format($n, 0, ',', '.') : 'Gratis';
    $ic = fn ($n, $c = '') => new \Illuminate\Support\HtmlString('<svg class="ico ' . $c . '" viewBox="0 0 24 24" aria-hidden="true">' . ($dam['icons'][$n] ?? '') . '</svg>');
    $stars = fn ($r) => new \Illuminate\Support\HtmlString('<span class="stars" aria-label="Rating ' . $r . '">' . collect(range(1, 5))->map(fn ($i) => '<svg viewBox="0 0 24 24"' . ($i <= round($r) ? '' : ' class="off"') . '><path d="M12 2l3 6.6 7.2.8-5.4 4.9 1.5 7.1L12 17.8 5.7 21.4l1.5-7.1L1.8 9.4 9 8.6z"/></svg>')->implode('') . '</span>');
    $aurl = fn ($a) => $u('product-details') . '?asset=' . $a['slug'];
    $cat = fn ($a) => $dam['categories'][$a['cat']];
    $cr = fn ($a) => $dam['creators'][$a['creator']];
    $all = collect($dam['assets']);
@endphp
@php
    $current = trim($__env->yieldContent('page')) ?: 'home';
    $jsData = [
        'base' => url($dam['base_path']),
        'img' => asset($dam['assets_path']['images']),
        'wa' => $dam['whatsapp'],
        'pages' => collect(['explore-assets', 'product-details', 'creator-profile', 'cart', 'checkout', 'order-confirmation', 'my-downloads', 'wishlist', 'help-center', 'contact-us', 'subscription-plans'])->mapWithKeys(fn ($p) => [$p => $u($p)]),
        'assets' => $all->map(fn ($a) => [
            'id' => $a['id'], 'slug' => $a['slug'], 'title' => $a['title'], 'cat' => $a['cat'], 'catName' => $cat($a)['name'],
            'creator' => $cr($a)['name'], 'creatorAvatar' => $img($cr($a)['avatar']), 'price' => $a['price'], 'old' => $a['old'], 'rating' => $a['rating'],
            'reviews' => $a['reviews'], 'sales' => $a['sales'], 'format' => $a['format'], 'tags' => $a['tags'], 'flags' => $a['flags'],
            'days' => $a['days'], 'size' => $a['size'], 'img' => $img($a['img']), 'url' => $aurl($a),
        ])->values(),
        'categories' => collect($dam['categories'])->map(fn ($c, $k) => ['slug' => $k, 'name' => $c['name']])->values(),
        'creators' => collect($dam['creators'])->map(fn ($c, $k) => ['id' => $k, 'name' => $c['name'], 'role' => $c['role'], 'handle' => $c['handle'], 'avatar' => $img($c['avatar']), 'url' => $u('creator-profile') . '?creator=' . $k])->values(),
        'help' => collect($dam['help'])->map(fn ($h) => ['g' => $h[0], 'items' => $h[2]])->values(),
        'licenses' => $dam['licenses'],
        'ai' => $dam['ai'],
        'coupons' => collect($dam['promos']['coupons'])->map(fn ($c) => $c[0])->values(),
        'promoHours' => $dam['promos']['ends_in_hours'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Astraly — Digital Asset Marketplace')</title>
    <meta name="description" content="@yield('description', 'Astraly adalah marketplace aset digital bertema galaksi: model 3D, UI kit, template web, ilustrasi, ikon, audio, motion, dan e-book dari kreator terbaik.')">
    <meta name="theme-color" content="#05030f">
    <script>document.documentElement.classList.add('js')</script>
    <link rel="icon" type="image/svg+xml" href="{{ $img('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link rel="stylesheet" href="{{ asset($dam['assets_path']['css'] . '/digital-asset-marketplace.css') }}">
    <noscript><style>.reveal{opacity:1!important;transform:none!important}.fab.hide{opacity:1;visibility:visible;transform:none;pointer-events:auto}.loader{display:none}</style></noscript>
    @stack('head')
</head>
<body data-page="{{ $current }}" class="@yield('body_class')">
    <div class="progress-bar" id="progress"></div>
    <div class="loader" id="loader"><div><div class="loader-orb"></div><p>Memuat galaksi</p></div></div>
    <canvas id="starfield" aria-hidden="true"></canvas>
    <div class="aurora" aria-hidden="true"><i></i><i></i><i></i></div>
    <div class="cursor-glow" id="cursorGlow" aria-hidden="true"></div>

    <div id="app">
        @include($v . '.partials.topbar')
        @include($v . '.partials.navbar')
        <main id="main">@yield('content')</main>
        @include($v . '.partials.footer')
    </div>

    @include($v . '.partials.mobile-menu')
    @include($v . '.partials.search-overlay')
    @include($v . '.partials.cart-drawer')
    @include($v . '.partials.modals')
    @include($v . '.partials.floating')
    <div class="toasts" id="toasts" aria-live="polite"></div>

    <script>window.DAM = {!! json_encode($jsData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!};</script>
    <script src="{{ asset($dam['assets_path']['js'] . '/digital-asset-marketplace.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
