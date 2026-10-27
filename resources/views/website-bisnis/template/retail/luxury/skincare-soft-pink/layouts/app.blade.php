@php
    $c = $cfg['contact'];
    $jsData = [
        'brand'        => $cfg['brand']['name'],
        'whatsapp'     => $c['whatsapp'],
        'freeShipping' => $cfg['free_shipping_min'],
        'routes'       => [
            'catalog' => route($rp . 'catalog'),
            'price'   => route($rp . 'price'),
            'stock'   => route($rp . 'stock'),
            'shop'    => route($rp . 'shop'),
            'inquiry' => route($rp . 'inquiry'),
        ],
        'topics'   => $cfg['inquiry_topics'],
        'products' => collect($cfg['products'])->map(fn ($p) => [
            'id'          => $p['id'],
            'name'        => $p['name'],
            'price'       => $p['price'],
            'stock'       => $p['stock'],
            'status'      => $p['status'],
            'statusLabel' => $p['status_label'],
            'size'        => $p['size'],
            'category'    => $p['category_name'],
            'desc'        => $p['desc'],
            'image'       => $img . '/' . $p['image'],
        ])->values(),
        'faq' => $cfg['faq'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Belleza - Glow Your Best Self')</title>
    <meta name="description" content="@yield('description', 'Belleza menghadirkan skincare & beauty premium dengan bahan pilihan untuk kulit sehat dan bercahaya.')">
    <meta name="theme-color" content="#a95c6b">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ $css }}">
    @stack('head')
</head>
<body class="bz" data-page="@yield('page', 'home')">
    {{-- Simbol bunga logo Belleza (dipakai ulang di navbar, footer, dan chatbot) --}}
    <svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
        <symbol id="bz-flower" viewBox="0 0 64 64">
            <g fill="currentColor">
                <path d="M32 6c5 7 6 14 0 22-6-8-5-15 0-22z"/>
                <path d="M32 6c5 7 6 14 0 22-6-8-5-15 0-22z" transform="rotate(72 32 32)"/>
                <path d="M32 6c5 7 6 14 0 22-6-8-5-15 0-22z" transform="rotate(144 32 32)"/>
                <path d="M32 6c5 7 6 14 0 22-6-8-5-15 0-22z" transform="rotate(216 32 32)"/>
                <path d="M32 6c5 7 6 14 0 22-6-8-5-15 0-22z" transform="rotate(288 32 32)"/>
                <circle cx="32" cy="32" r="4.5" opacity=".55"/>
            </g>
        </symbol>
    </svg>

    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    @include($ns . '.partials.topbar')
    @include($ns . '.partials.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include($ns . '.partials.footer')
    @include($ns . '.partials.cart-drawer')
    @include($ns . '.partials.floating')

    <div class="toast" role="status" aria-live="polite" data-toast hidden></div>

    <script>window.BELLEZA = @json($jsData);</script>
    <script src="{{ $js }}" defer></script>
    @stack('scripts')
</body>
</html>
