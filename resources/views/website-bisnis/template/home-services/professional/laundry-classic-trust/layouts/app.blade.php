{{--
|--------------------------------------------------------------------------
| Layout utama FreshWash - Laundry Classic Trust
|--------------------------------------------------------------------------
| Dipanggil tiap halaman lewat @include dengan data:
|   page   : key halaman (home, services, prices, options, turnaround, coverage, instructions, hours, contact)
|   title  : judul <title>
|   blocks : daftar view (relatif terhadap folder template) yang dirender di <main>
|   hero   : (opsional) data banner halaman dalam
| Semua helper ($c, $img, $rp, $url, $wa) didefinisikan di sini dan otomatis
| tersedia untuk partial/section/preview yang di-include.
--}}
@php
    $T    = 'website-bisnis.template.home-services.professional.laundry-classic-trust';
    $base = 'website-bisnis/template/home-services/professional/laundry-classic-trust';
    $c    = config('template.home-services.professional.laundry-classic-trust.laundry');
    $img  = fn ($f) => asset("images/{$base}/{$f}");
    $rp   = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $url  = fn ($k) => route("laundry-classic-trust.{$k}");
    $wa   = fn ($t = null) => 'https://wa.me/' . $c['whatsapp']['number'] . '?text=' . rawurlencode($t ?? $c['whatsapp']['default']);
    $page = $page ?? 'home';
    $title = $title ?? $c['brand']['name'];
    $blocks = $blocks ?? [];
    // Data untuk laundry.js, dibuat di PHP lalu di-encode di bawah (tanpa direktif Blade)
    $fw = [
        'wa'     => $c['whatsapp']['number'],
        'brand'  => $c['brand']['name'],
        'bot'    => $c['chatbot'],
        'hours'  => ['open' => $c['hours']['open'], 'close' => $c['hours']['close']],
        'areas'  => array_column($c['areas'], 'name'),
        'prices' => $url('prices'),
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ $c['brand']['name'] }} - {{ $c['brand']['tagline'] }}</title>
    <meta name="description" content="{{ $c['hero']['text'] }}">
    <meta name="theme-color" content="#1f3b5c">
    <link rel="icon" type="image/svg+xml" href="{{ $img('logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/{$base}/laundry.css") }}">
</head>
<body class="lw lw--{{ $page }}">
    <a class="skip" href="#main">Lewati ke konten</a>

    @include("{$T}.partials.icons")
    @include("{$T}.partials.topbar")
    @include("{$T}.partials.navbar")

    <main id="main">
        @foreach ($blocks as $block)
            @include("{$T}.{$block}")
        @endforeach
    </main>

    @include("{$T}.partials.footer")
    @include("{$T}.partials.floating")

    <script>window.FRESHWASH = {!! json_encode($fw, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!};</script>
    <script src="{{ asset("js/{$base}/laundry.js") }}" defer></script>
</body>
</html>
