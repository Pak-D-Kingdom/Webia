{{--
    Layout utama GreenHope Foundation (Nonprofit & Community · Creative · Nature Green)

    Pola: setiap halaman (index, tentang-kami, program, ...) hanya menetapkan $page lalu
    me-@include layout ini. Layout memuat config, membuat helper ($url, $img, $wa, $icon, $v),
    lalu meng-include partial dan isi halaman dari folder pages/.
--}}
@php
    $cfgKey = 'template.nonprofit&community.creative.foundation-nature-green.foundation';
    $cfg = config($cfgKey);
    if (! is_array($cfg)) {
        $cfg = require config_path('template/nonprofit&community/creative/foundation-nature-green/foundation.php');
    }

    $page = (isset($page) && array_key_exists($page, $cfg['pages'])) ? $page : 'beranda';
    $meta = $cfg['pages'][$page];
    $docTitle = $page === 'beranda' ? $meta['title'] : $meta['title'].' — '.$cfg['brand']['name'].' '.$cfg['brand']['suffix'];

    $base  = rtrim(url($cfg['base_url']), '/');
    $url   = fn (string $slug = '') => $slug === '' ? $base : (str_starts_with($slug, '#') ? $slug : $base.'/'.ltrim($slug, '/'));
    $img   = fn (string $file) => asset($cfg['assets']['img'].$file);
    $wa    = fn (string $text = '') => 'https://wa.me/'.$cfg['contact']['whatsapp'].($text !== '' ? '?text='.rawurlencode($text) : '');
    $v     = fn (string $name) => $cfg['view'].'.'.$name;
    $money = fn ($n) => 'Rp '.number_format((float) $n, 0, ',', '.');
    $icon  = function (string $name, string $class = 'fh-ic') use ($cfg) {
        $filled = in_array($name, $cfg['filled_icons'], true);
        $attrs = $filled
            ? 'fill="currentColor" stroke="none"'
            : 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
        return new \Illuminate\Support\HtmlString(
            '<svg class="'.e($class).'" viewBox="0 0 24 24" '.$attrs.' aria-hidden="true" focusable="false">'.($cfg['icons'][$name] ?? '').'</svg>'
        );
    };
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $docTitle }}</title>
    <meta name="description" content="{{ $cfg['brand']['name'] }} {{ $cfg['brand']['suffix'] }} — {{ $cfg['brand']['tagline'] }}.">
    <meta name="theme-color" content="#1e4a24">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ $img('logo-leaf.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset($cfg['assets']['css']) }}">
    <script>document.documentElement.classList.add('fh-js');</script>
</head>
<body class="fh fh-page-{{ $page }}">
    <a class="fh-skip" href="#fh-main">Lewati ke konten utama</a>

    @include($v('partials.topbar'))
    @include($v('partials.navbar'))

    <main id="fh-main">
        @include($v('pages.'.$page))
    </main>

    @include($v('partials.footer'))
    @include($v('partials.search'))
    @include($v('partials.floating'))

    <script src="{{ asset($cfg['assets']['js']) }}" defer></script>
</body>
</html>
