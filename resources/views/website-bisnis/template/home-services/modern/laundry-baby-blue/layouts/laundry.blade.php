@php
    $brand   = $laundry['brand'];
    $contact = $laundry['contact'];
    $current = request()->route()?->getName() ?? '';
    $slug    = \Illuminate\Support\Str::afterLast($current, '.');
    $ver     = @filemtime(public_path($laundry['assets']['css'] . '/laundry.css')) ?: 1;
    $links   = [];
    foreach (['home','layanan','harga','pilihan','estimasi','area','cara-order','jam','order-inquiry','ai-chatbot'] as $r) {
        $links[$r] = $lbRoute($r);
    }
    $faqJs = collect($laundry['faq'])->map(fn ($f) => [
        'id' => $f['id'], 'q' => $f['q'], 'a' => $f['a'], 'keywords' => $f['keywords'],
        'cta' => isset($f['cta']) ? ['label' => $f['cta']['label'], 'url' => $links[$f['cta']['route']] ?? '#'] : null,
    ])->values();
    // CATATAN: jangan taruh array literal di dalam @json([...]) — Blade memecah argumen @json berdasarkan koma.
    $jsConfig = [
        'brand'      => $brand['name'],
        'whatsapp'   => $contact['whatsapp'],
        'robot'      => $lbAsset('img', 'ai-robot-head.png'),
        'chat'       => [
            'greeting' => $laundry['chatbot']['greeting'],
            'fallback' => $laundry['chatbot']['fallback'],
            'quick'    => $laundry['chatbot']['quick'],
        ],
        'faq'        => $faqJs,
        'links'      => $links,
        'hours'      => ['open' => '08:00', 'close' => '20:00'],
        'turnaround' => $laundry['turnaround'],
        'areas'      => $laundry['areas'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="lb-root">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'BlueLaundry — Pakaian Bersih, Wangi, Rapi & Terawat')</title>
    <meta name="description" content="@yield('description', 'BlueLaundry: layanan laundry modern di Surabaya dengan antar-jemput, hasil bersih, wangi tahan lama, dan siap pakai.')">
    <meta name="theme-color" content="#d6eafb">
    <link rel="icon" type="image/png" href="{{ $lbAsset('img', 'logo-cloud.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $lbAsset('css', 'laundry.css') }}?v={{ $ver }}">
    @stack('head')
</head>
<body class="lb-body lb-page-{{ $slug }}" data-lb-page="{{ $slug }}">
    <a class="lb-skip" href="#lb-main">Lewati ke konten utama</a>

    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.icons')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.topbar')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.navbar')

    <main id="lb-main" class="lb-main">
        @yield('content')
    </main>

    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.footer')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.floating')

    @unless ($slug === 'ai-chatbot')
        @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.chat-panel', ['embed' => false])
    @endunless

    <div class="lb-toast" id="lbToast" role="status" aria-live="polite" hidden></div>

    <script>
        window.BLUELAUNDRY = @json($jsConfig);
    </script>
    <script src="{{ $lbAsset('js', 'laundry.js') }}?v={{ $ver }}" defer></script>
    @stack('scripts')
</body>
</html>
