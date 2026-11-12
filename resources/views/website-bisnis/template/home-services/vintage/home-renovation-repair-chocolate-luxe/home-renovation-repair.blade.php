@php
    /*
    |----------------------------------------------------------------------
    | RenovatePro — Home Services · Vintage · Chocolate Luxe
    |----------------------------------------------------------------------
    | Satu view untuk semua halaman. Variabel $page dikirim oleh route:
    | home | layanan | paket | galeri | proyek | area | proses | penawaran | survei
    | Seluruh konten dibaca dari config (lihat file config terkait).
    */
    $cfg = config('template.home-services.vintage.home-renovation-repair-chocolate-luxe.home-renovation-repair');
    if (! is_array($cfg) || $cfg === []) {
        $cfg = require config_path('template/home-services/vintage/home-renovation-repair-chocolate-luxe/home-renovation-repair.php');
    }

    $page = $page ?? 'home';
    $base = rtrim(url($cfg['base_path']), '/');
    $imgBase = 'images/website-bisnis/template/home-services/vintage/home-renovation-repair-chocolate-luxe/';
    $cssFile = 'css/website-bisnis/template/home-services/vintage/home-renovation-repair-chocolate-luxe/home-renovation-repair.css';
    $jsFile = 'js/website-bisnis/template/home-services/vintage/home-renovation-repair-chocolate-luxe/home-renovation-repair.js';
    $assetVer = '1.0.0';

    $img = fn (string $file): string => asset($imgBase . $file);
    $u = fn (string $slug = ''): string => $slug === '' ? $base : $base . '/' . $slug;
    $waLink = 'https://wa.me/' . $cfg['whatsapp']['number'] . '?text=' . rawurlencode($cfg['whatsapp']['greeting']);

    $pageInfo = $cfg['pages'][$page] ?? null;
    $brandName = $cfg['brand']['name'] . $cfg['brand']['accent'];
    $docTitle = $pageInfo ? $pageInfo['title'] . ' — ' . $brandName : $cfg['title'];

    // Data pencarian navbar
    $search = [['t' => 'Beranda', 'd' => $cfg['hero']['script'], 'u' => $u()]];
    foreach ($cfg['pages'] as $p) {
        $search[] = ['t' => $p['title'], 'd' => $p['script'], 'u' => $u($p['slug'])];
    }
    foreach ($cfg['services'] as $s) {
        $search[] = ['t' => $s['title'], 'd' => $s['short'], 'u' => $u('layanan#' . $s['id'])];
    }
    foreach ($cfg['packages'] as $p) {
        $search[] = ['t' => $p['name'], 'd' => $p['tagline'], 'u' => $u('paket-layanan#' . $p['id'])];
    }
    foreach ($cfg['projects'] as $p) {
        $search[] = ['t' => $p['title'], 'd' => $p['place'], 'u' => $u('proyek-kami#' . $p['id'])];
    }

    $rrData = [
        'wa'       => $cfg['whatsapp']['number'],
        'greeting' => $cfg['whatsapp']['greeting'],
        'base'     => $base,
        'unit'     => $cfg['price_unit'],
        'packages' => array_map(fn ($p) => ['id' => $p['id'], 'name' => $p['name'], 'price' => $p['price'], 'label' => $p['price_label']], $cfg['packages']),
        'areas'    => array_map(fn ($a) => ['name' => $a['name'], 'cities' => $a['cities']], $cfg['areas']),
        'chat'     => $cfg['chat'],
        'faq'      => $cfg['faq'],
        'legal'    => $cfg['legal'],
        'search'   => $search,
    ];
    $rrJson = json_encode($rrData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
@endphp
<!DOCTYPE html>
<html lang="id" class="rr-nojs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>{{ $docTitle }}</title>
    <meta name="description" content="{{ $cfg['meta'] }}">
    <meta name="theme-color" content="#2a170d">
    <link rel="icon" type="image/svg+xml" href="{{ $img('logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,500&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ $assetVer }}">
    <script>document.documentElement.className = 'rr-js';</script>
</head>
<body class="rr rr-page-{{ $page }}" data-rr-page="{{ $page }}">
<a class="rr-skip" href="#rr-main">Lewati ke konten utama</a>

{{-- ============ SVG SPRITE ============ --}}
<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
    <defs>
        <symbol id="i-home" viewBox="0 0 24 24"><path d="M3 11.5 12 4l9 7.5"/><path d="M5.5 10v9.5h13V10"/><path d="M10 19.5v-5h4v5"/></symbol>
        <symbol id="i-tools" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></symbol>
        <symbol id="i-sofa" viewBox="0 0 24 24"><path d="M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3"/><path d="M2 11v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H6v-2a2 2 0 0 0-4 0Z"/><path d="M4 18v2M20 18v2"/></symbol>
        <symbol id="i-tree" viewBox="0 0 24 24"><path d="M12 21v-5.5"/><path d="M12 15.5c-4 0-6.5-2.4-6.5-5.4 0-1.5.7-2.8 1.9-3.6C7.6 4.4 9.5 3 12 3s4.4 1.4 4.6 3.5c1.2.8 1.9 2.1 1.9 3.6 0 3-2.5 5.4-6.5 5.4Z"/><path d="M12 12l-2-2M12 14l3-3"/></symbol>
        <symbol id="i-roller" viewBox="0 0 24 24"><rect x="3" y="3" width="14" height="5.2" rx="1.6"/><path d="M17 5.6h2.5A1.5 1.5 0 0 1 21 7.1v3a1.5 1.5 0 0 1-1.5 1.5H12v3"/><rect x="10" y="14.6" width="4" height="6.4" rx="1.1"/></symbol>
        <symbol id="i-camera" viewBox="0 0 24 24"><path d="M4 8h3l1.5-2.5h7L17 8h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z"/><circle cx="12" cy="13.5" r="3.6"/></symbol>
        <symbol id="i-briefcase" viewBox="0 0 24 24"><rect x="3" y="7.5" width="18" height="12.5" rx="2"/><path d="M9 7.5V6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1.5M3 13h18"/><path d="M11 13h2v2h-2z"/></symbol>
        <symbol id="i-pin" viewBox="0 0 24 24"><path d="M12 21s-6.5-5.6-6.5-11a6.5 6.5 0 0 1 13 0C18.5 15.4 12 21 12 21Z"/><circle cx="12" cy="10" r="2.4"/></symbol>
        <symbol id="i-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1.1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1.1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z"/></symbol>
        <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3.5" y="5" width="17" height="15.5" rx="2.2"/><path d="M3.5 10h17M8 3v4M16 3v4M8 14h.01M12 14h.01M16 14h.01M8 17.4h.01M12 17.4h.01"/></symbol>
        <symbol id="i-doc" viewBox="0 0 24 24"><path d="M6.5 3h7.5l4.5 4.5V21h-12z"/><path d="M14 3v4.5h4.5M9 12h6M9 15.5h6M9 8.5h2.5"/></symbol>
        <symbol id="i-phone" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></symbol>
        <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3.5 7 8.5 6.5L20.5 7"/></symbol>
        <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
        <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
        <symbol id="i-chev" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></symbol>
        <symbol id="i-chevr" viewBox="0 0 24 24"><path d="m9 5 7 7-7 7"/></symbol>
        <symbol id="i-menu" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></symbol>
        <symbol id="i-close" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></symbol>
        <symbol id="i-send" viewBox="0 0 24 24"><path d="M21 3 10 14M21 3l-7 18-4-7-7-4z"/></symbol>
        <symbol id="i-check" viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7.5"/></symbol>
        <symbol id="i-chat" viewBox="0 0 24 24"><path d="M4 5h16v11H9.5L5 20v-4H4z"/><path d="M8.5 10.5h.01M12 10.5h.01M15.5 10.5h.01"/></symbol>
        <symbol id="i-helmet" viewBox="0 0 24 24"><path d="M4.5 16a7.5 7.5 0 0 1 15 0"/><path d="M2.5 16h19v3h-19z"/><path d="M12 8.5V16M9 9.6 10 16M15 9.6 14 16"/></symbol>
        <symbol id="i-pen" viewBox="0 0 24 24"><path d="M4 20l1-4L16.5 4.5a2.1 2.1 0 0 1 3 3L8 19z"/><path d="m14.5 6.5 3 3"/></symbol>
        <symbol id="i-ruler" viewBox="0 0 24 24"><path d="m4 16 12-12 4 4L8 20z"/><path d="m7 13 2 2M10 10l2 2M13 7l2 2"/></symbol>
        <symbol id="i-star" viewBox="0 0 24 24"><path d="m12 3.2 2.7 5.6 6.1.8-4.5 4.2 1.1 6.1L12 17l-5.4 2.9 1.1-6.1L3.2 9.6l6.1-.8z"/></symbol>
        <symbol id="i-whatsapp" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></symbol>
        <symbol id="i-facebook" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></symbol>
        <symbol id="i-instagram" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.4 6.7h.01"/></symbol>
        <symbol id="i-youtube" viewBox="0 0 24 24"><rect x="2.5" y="5.5" width="19" height="13" rx="4"/><path d="m10 9.5 5 2.5-5 2.5z"/></symbol>
        <symbol id="i-tiktok" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></symbol>
        <symbol id="i-linkedin" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></symbol>
        <symbol id="i-leaf" viewBox="0 0 120 220">
            <path d="M60 218C58 160 62 100 78 6" fill="none" stroke="#4d5a26" stroke-width="3" stroke-linecap="round"/>
            <path d="M62 190C30 188 8 168 4 140c28 0 52 16 58 50Z" fill="#6f7f38"/>
            <path d="M64 160c34-4 52-26 54-52-30 2-52 20-54 52Z" fill="#8a9a45"/>
            <path d="M66 128C36 122 18 100 18 72c28 6 48 24 48 56Z" fill="#5f6f2e"/>
            <path d="M70 96c30-8 42-30 40-54-26 8-40 26-40 54Z" fill="#7d8d3c"/>
            <path d="M72 62C48 54 38 34 42 12c22 8 32 24 30 50Z" fill="#6f7f38"/>
            <path d="M62 190C40 176 22 160 6 142M64 160c20-14 36-30 52-52M66 128C48 112 34 94 20 74M70 96c14-16 26-34 38-52" fill="none" stroke="#e5a83a" stroke-width="1.4" stroke-linecap="round" opacity=".85"/>
        </symbol>
    </defs>
</svg>

{{-- ============ TOPBAR ============ --}}
<div class="rr-topbar">
    <div class="rr-container rr-topbar__in">
        <ul class="rr-topbar__info">
            <li class="rr-topbar__addr"><svg class="rr-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cfg['contact']['address'] }}</span></li>
            <li><a href="{{ $cfg['contact']['phone_href'] }}"><svg class="rr-i" aria-hidden="true"><use href="#i-phone"/></svg><span>{{ $cfg['contact']['phone'] }}</span></a></li>
            <li class="rr-topbar__mail"><a href="mailto:{{ $cfg['contact']['email'] }}"><svg class="rr-i" aria-hidden="true"><use href="#i-mail"/></svg><span>{{ $cfg['contact']['email'] }}</span></a></li>
        </ul>
        <ul class="rr-topbar__soc">
            @foreach ($cfg['socials'] as $soc)
                <li><a href="{{ $soc['url'] }}" aria-label="{{ $soc['label'] }}" target="_blank" rel="noopener"><svg class="rr-i rr-i--{{ $soc['icon'] }}" aria-hidden="true"><use href="#i-{{ $soc['icon'] }}"/></svg></a></li>
            @endforeach
        </ul>
    </div>
</div>

{{-- ============ NAVBAR ============ --}}
<header class="rr-header" id="rr-header">
    <div class="rr-container rr-nav">
        <a class="rr-brand" href="{{ $u() }}" aria-label="{{ $brandName }} — Beranda">
            <img class="rr-brand__logo" src="{{ $img('logo.svg') }}" alt="" width="52" height="46">
            <span class="rr-brand__txt"><strong>{{ $cfg['brand']['name'] }}<em>{{ $cfg['brand']['accent'] }}</em></strong><small>{{ $cfg['brand']['tagline'] }}</small></span>
        </a>

        <nav class="rr-menu-wrap" id="rr-menu" aria-label="Navigasi utama">
            <ul class="rr-menu">
                @foreach ($cfg['nav'] as $item)
                    <li class="rr-menu__li @if (in_array($page, $item['pages'])) is-active @endif @if (! empty($item['children'])) has-sub @endif">
                        <a class="rr-menu__a" href="{{ $u($item['slug']) }}" @if (in_array($page, $item['pages'])) aria-current="page" @endif>
                            @if (! empty($item['icon']))<svg class="rr-i" aria-hidden="true"><use href="#i-{{ $item['icon'] }}"/></svg>@endif
                            <span>{{ $item['label'] }}</span>
                        </a>
                        @if (! empty($item['children']))
                            <button type="button" class="rr-menu__tg" aria-expanded="false" aria-label="Submenu {{ $item['label'] }}"><svg class="rr-i" aria-hidden="true"><use href="#i-chev"/></svg></button>
                            <ul class="rr-sub">
                                @foreach ($item['children'] as $child)
                                    <li><a href="{{ $u($child['slug']) }}">{{ $child['label'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a class="rr-btn rr-btn--dark rr-menu__cta" href="{{ $u($cfg['cta']['slug']) }}"><span>{{ $cfg['cta']['label'] }}</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="rr-nav__tools">
            <button class="rr-iconbtn rr-searchbtn" type="button" aria-label="Cari di situs" aria-expanded="false" aria-controls="rr-search"><svg class="rr-i" aria-hidden="true"><use href="#i-search"/></svg></button>
            <a class="rr-btn rr-btn--dark rr-nav__cta" href="{{ $u($cfg['cta']['slug']) }}"><span>{{ $cfg['cta']['label'] }}</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button class="rr-iconbtn rr-burger" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="rr-menu"><svg class="rr-i" aria-hidden="true"><use href="#i-menu"/></svg></button>
        </div>
    </div>

    <div class="rr-search" id="rr-search" hidden>
        <div class="rr-container">
            <form class="rr-search__form" role="search" data-rr-searchform>
                <svg class="rr-i" aria-hidden="true"><use href="#i-search"/></svg>
                <input type="search" id="rr-search-input" placeholder="Cari layanan, paket, atau proyek…" autocomplete="off" aria-label="Cari di situs">
                <button type="button" class="rr-iconbtn rr-search__close" aria-label="Tutup pencarian"><svg class="rr-i" aria-hidden="true"><use href="#i-close"/></svg></button>
            </form>
            <ul class="rr-search__list" id="rr-search-list"></ul>
        </div>
    </div>
</header>
<div class="rr-scrim" hidden></div>

<main id="rr-main">

@if ($page === 'home')
{{-- ============ HERO BANNER ============ --}}
<section class="rr-hero" aria-labelledby="rr-hero-title">
    <div class="rr-hero__bg" style="background-image:url('{{ $img('hero-bg.jpg') }}')"></div>
    <div class="rr-hero__shade"></div>
    <div class="rr-dust" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <div class="rr-container rr-hero__in">
        <div class="rr-hero__copy">
            <p class="rr-script">{{ $cfg['hero']['script'] }}</p>
            <h1 id="rr-hero-title"><span class="rr-hero__t1">{{ $cfg['hero']['title_1'] }}</span> <span class="rr-hero__t2">{{ $cfg['hero']['title_2'] }}</span></h1>
            <p class="rr-hero__text">@foreach ($cfg['hero']['text'] as $line){{ $line }}@if (! $loop->last)<br>@endif @endforeach</p>
            <div class="rr-hero__cta">
                <a class="rr-btn rr-btn--gold rr-btn--lg" href="{{ $u($cfg['hero']['primary']['slug']) }}"><svg class="rr-i" aria-hidden="true"><use href="#i-home"/></svg><span>{{ $cfg['hero']['primary']['label'] }}</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="rr-btn rr-btn--ghost rr-btn--lg" href="{{ $u($cfg['hero']['secondary']['slug']) }}"><span class="rr-play" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M9 7l8 5-8 5z"/></svg></span><span>{{ $cfg['hero']['secondary']['label'] }}</span></a>
            </div>
        </div>
    </div>
    <img class="rr-hero__art" src="{{ $img('hero-art.jpg') }}" alt="Tukang profesional dan asisten robot RenovatePro di depan rumah hasil renovasi" width="1472" height="508" loading="eager">
</section>

<div class="rr-container rr-home">
    <span class="rr-leaf rr-leaf--l" aria-hidden="true"><svg viewBox="0 0 120 220"><use href="#i-leaf"/></svg></span>
    <span class="rr-leaf rr-leaf--r" aria-hidden="true"><svg viewBox="0 0 120 220"><use href="#i-leaf"/></svg></span>

    {{-- ---- Renovation & repair services (preview) ---- --}}
    <section class="rr-card rr-svcbar" data-rr-in aria-label="Layanan renovasi dan perbaikan">
        <a class="rr-svcbar__head" href="{{ $u('layanan') }}">
            <svg class="rr-i" aria-hidden="true"><use href="#i-home"/></svg>
            <span><strong>Layanan Renovasi<br>&amp; Perbaikan</strong><small>Solusi lengkap untuk rumah Anda.</small></span>
        </a>
        <ul class="rr-svcbar__list">
            @foreach ($cfg['services'] as $s)
                <li><a href="{{ $u('layanan') }}#{{ $s['id'] }}"><svg class="rr-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg><span>{{ $s['title'] }}</span></a></li>
            @endforeach
        </ul>
    </section>

    {{-- ---- Row: packages / gallery / projects ---- --}}
    <div class="rr-row rr-row--b">
        <section class="rr-card rr-pkg" data-rr-in aria-labelledby="rr-pkg-t">
            <div class="rr-ribbon"><svg class="rr-i" aria-hidden="true"><use href="#i-home"/></svg><h2 id="rr-pkg-t">Paket Layanan</h2></div>
            <p class="rr-pkg__sub">Pilihan paket terbaik sesuai kebutuhan Anda.</p>
            <div class="rr-pkg__grid">
                @foreach ($cfg['packages'] as $p)
                    <article class="rr-pkgmini @if (! empty($p['popular'])) is-pop @endif">
                        @if (! empty($p['popular']))<span class="rr-pkgmini__flag">Paling Populer</span>@endif
                        <h3>{{ $p['name'] }}</h3>
                        <small>{{ $p['from'] }}</small>
                        <strong>{{ $p['price_label'] }}</strong>
                        <a class="rr-btn rr-btn--sm @if (! empty($p['popular'])) rr-btn--gold @else rr-btn--light @endif" href="{{ $u('paket-layanan') }}#{{ $p['id'] }}"><span>Pilih Paket</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="rr-card rr-gal" data-rr-in aria-labelledby="rr-gal-t">
            <div class="rr-chead"><svg class="rr-i" aria-hidden="true"><use href="#i-camera"/></svg><div><h2 id="rr-gal-t">Galeri Before - After</h2><p>Lihat hasil nyata dari proyek kami.</p></div></div>
            <a class="rr-gal__pair" href="{{ $u('galeri') }}" aria-label="Buka galeri before-after">
                <figure><img src="{{ $img('gallery-before.jpg') }}" alt="Rumah sebelum renovasi" width="618" height="303" loading="lazy"><figcaption><svg class="rr-i" aria-hidden="true"><use href="#i-camera"/></svg>Sebelum</figcaption></figure>
                <span class="rr-gal__arrow" aria-hidden="true"><svg class="rr-i"><use href="#i-chevr"/></svg></span>
                <figure><img src="{{ $img('gallery-after.jpg') }}" alt="Rumah sesudah renovasi" width="594" height="303" loading="lazy"><figcaption><svg class="rr-i" aria-hidden="true"><use href="#i-camera"/></svg>Sesudah</figcaption></figure>
            </a>
        </section>

        <section class="rr-card rr-prj-prev" data-rr-in aria-labelledby="rr-prj-t">
            <div class="rr-chead"><svg class="rr-i" aria-hidden="true"><use href="#i-briefcase"/></svg><div><h2 id="rr-prj-t">Proyek Kami</h2><p>Portofolio proyek renovasi dan perbaikan kami.</p></div><a class="rr-btn rr-btn--dark rr-btn--sm" href="{{ $u('proyek-kami') }}"><span>Lihat Semua</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a></div>
            <div class="rr-prj-prev__grid">
                @foreach ($cfg['projects'] as $p)
                    @if ($loop->index < 3)
                        <a href="{{ $u('proyek-kami') }}#{{ $p['id'] }}"><img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}" width="402" height="354" loading="lazy"></a>
                    @endif
                @endforeach
            </div>
        </section>
    </div>

    {{-- ---- Row: coverage / process / survey ---- --}}
    <div class="rr-row rr-row--c">
        <section class="rr-card rr-area" data-rr-in aria-labelledby="rr-area-t">
            <div class="rr-area__copy">
                <div class="rr-chead rr-chead--plain"><svg class="rr-i" aria-hidden="true"><use href="#i-pin"/></svg><h2 id="rr-area-t">Area Layanan</h2></div>
                <p>Kami melayani berbagai wilayah di seluruh Indonesia.</p>
                <a class="rr-btn rr-btn--dark rr-btn--sm" href="{{ $u('area-layanan') }}#cek-area"><span>Cek Area Layanan</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <div class="rr-map" aria-hidden="true">
                <img src="{{ $img('map-indonesia.png') }}" alt="" width="1024" height="416" loading="lazy">
                @foreach ($cfg['pins'] as $pin)<i class="rr-pin" style="--x:{{ $pin['x'] }}%;--y:{{ $pin['y'] }}%"></i>@endforeach
            </div>
        </section>

        <section class="rr-card rr-proc" data-rr-in aria-labelledby="rr-proc-t">
            <div class="rr-chead rr-chead--plain"><svg class="rr-i" aria-hidden="true"><use href="#i-gear"/></svg><div><h2 id="rr-proc-t">Proses Kerja Kami</h2><p>Proses mudah, transparan, dan profesional.</p></div></div>
            <ol class="rr-steps">
                @foreach ($cfg['process'] as $st)
                    <li><a href="{{ $u('proses-kerja') }}#langkah-{{ $st['n'] }}"><span class="rr-steps__ic"><svg class="rr-i" aria-hidden="true"><use href="#i-{{ $st['icon'] }}"/></svg></span><span class="rr-steps__t">{{ $st['n'] }}. {{ $st['short'] }}</span></a></li>
                @endforeach
            </ol>
        </section>

        <section class="rr-card rr-book" data-rr-in aria-labelledby="rr-book-t">
            <img class="rr-book__img" src="{{ $img('booking-house.jpg') }}" alt="" width="441" height="270" loading="lazy">
            <div class="rr-book__copy">
                <div class="rr-chead rr-chead--plain"><svg class="rr-i" aria-hidden="true"><use href="#i-calendar"/></svg><h2 id="rr-book-t">Booking Survei Lokasi</h2></div>
                <p>Jadwalkan survei langsung ke lokasi rumah Anda, dengan mudah.</p>
                <a class="rr-btn rr-btn--gold rr-btn--sm" href="{{ $u('booking-survei') }}"><span>Booking Sekarang</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
        </section>
    </div>

    {{-- ---- Row: quotation / testimonial / AI chatbot preview ---- --}}
    <div class="rr-row rr-row--d @if (! $cfg['show_testimonial']) rr-row--2 @endif">
        <section class="rr-card rr-quote" data-rr-in aria-labelledby="rr-quote-t">
            <div class="rr-quote__copy">
                <div class="rr-chead rr-chead--plain"><svg class="rr-i" aria-hidden="true"><use href="#i-doc"/></svg><h2 id="rr-quote-t">Permintaan Penawaran</h2></div>
                <p>Dapatkan penawaran harga terbaik sekarang juga.</p>
                <a class="rr-btn rr-btn--dark rr-btn--sm" href="{{ $u('permintaan-penawaran') }}"><span>Minta Penawaran</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <img class="rr-quote__img" src="{{ $img('penawaran.jpg') }}" alt="" width="444" height="258" loading="lazy">
        </section>

        @if ($cfg['show_testimonial'])
        <section class="rr-card rr-testi" data-rr-in aria-label="Testimoni pelanggan">
            <span class="rr-testi__mark" aria-hidden="true">&ldquo;</span>
            <div class="rr-testi__copy">
                <h2>Testimoni Pelanggan</h2>
                <blockquote>&ldquo;{{ $cfg['testimonial']['quote'] }}&rdquo;</blockquote>
                <p class="rr-testi__by"><span class="rr-stars" aria-label="Penilaian 5 dari 5"><svg class="rr-i rr-i--star"><use href="#i-star"/></svg><svg class="rr-i rr-i--star"><use href="#i-star"/></svg><svg class="rr-i rr-i--star"><use href="#i-star"/></svg><svg class="rr-i rr-i--star"><use href="#i-star"/></svg><svg class="rr-i rr-i--star"><use href="#i-star"/></svg></span> <cite>– {{ $cfg['testimonial']['name'] }}</cite></p>
            </div>
            <img class="rr-testi__img" src="{{ $img($cfg['testimonial']['image']) }}" alt="{{ $cfg['testimonial']['name'] }}, pelanggan RenovatePro" width="440" height="360" loading="lazy">
        </section>
        @endif

        <section class="rr-card rr-aiprev" data-rr-in aria-label="Asisten AI RenovatePro">
            <div class="rr-aiprev__bubble">
                <p>{{ $cfg['chat']['bubble'] }}</p>
                <button type="button" class="rr-btn rr-btn--gold rr-btn--sm" data-rr-chat-open><span>Chat dengan Kami</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            </div>
            <img class="rr-aiprev__mascot" src="{{ $img('mascot-beaver.png') }}" alt="Maskot musang pekerja asisten RenovatePro" width="326" height="431" loading="lazy">
        </section>
    </div>
</div>

@else
{{-- ============ HEADER HALAMAN DALAM ============ --}}
<section class="rr-pagehero">
    <div class="rr-pagehero__bg" style="background-image:url('{{ $img('hero-bg.jpg') }}')"></div>
    <div class="rr-container rr-pagehero__in">
        <nav class="rr-crumb" aria-label="Breadcrumb"><a href="{{ $u() }}">Beranda</a><svg class="rr-i" aria-hidden="true"><use href="#i-chevr"/></svg><span>{{ $pageInfo['title'] }}</span></nav>
        <p class="rr-script">{{ $pageInfo['script'] }}</p>
        <h1>{{ $pageInfo['title'] }}</h1>
        <p class="rr-pagehero__text">{{ $pageInfo['text'] }}</p>
    </div>
</section>

<div class="rr-container rr-body">

@if ($page === 'layanan')
    {{-- ---- Renovation & repair services ---- --}}
    <div class="rr-svcgrid">
        @foreach ($cfg['services'] as $s)
            <article class="rr-card rr-svc" id="{{ $s['id'] }}" data-rr-in>
                <div class="rr-svc__img"><img src="{{ $img($s['image']) }}" alt="{{ $s['title'] }}" width="640" height="360" loading="lazy"><span class="rr-svc__badge"><svg class="rr-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span></div>
                <div class="rr-svc__body">
                    <h2>{{ $s['title'] }}</h2>
                    <p>{{ $s['desc'] }}</p>
                    <ul class="rr-ticks">
                        @foreach ($s['points'] as $pt)<li><svg class="rr-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $pt }}</li>@endforeach
                    </ul>
                    <a class="rr-btn rr-btn--dark rr-btn--sm" href="{{ $u('permintaan-penawaran') }}?layanan={{ $s['id'] }}"><span>Minta Penawaran</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>
        @endforeach
    </div>
@endif

@if ($page === 'paket')
    {{-- ---- Service packages ---- --}}
    <div class="rr-pkgrid">
        @foreach ($cfg['packages'] as $p)
            <article class="rr-card rr-pkgcard @if (! empty($p['popular'])) is-pop @endif" id="{{ $p['id'] }}" data-rr-in>
                @if (! empty($p['popular']))<span class="rr-pkgcard__flag">Paling Populer</span>@endif
                <h2>{{ $p['name'] }}</h2>
                <p class="rr-pkgcard__tag">{{ $p['tagline'] }}</p>
                <p class="rr-pkgcard__price"><small>{{ $p['from'] }}</small><strong>{{ $p['price_label'] }}</strong><small>{{ $cfg['price_unit'] }}</small></p>
                <ul class="rr-ticks">
                    @foreach ($p['features'] as $f)<li><svg class="rr-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $f }}</li>@endforeach
                </ul>
                <a class="rr-btn @if (! empty($p['popular'])) rr-btn--gold @else rr-btn--dark @endif" href="{{ $u('permintaan-penawaran') }}?paket={{ $p['id'] }}"><span>Pilih Paket</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </article>
        @endforeach
    </div>
    <p class="rr-note">Harga di atas adalah harga mulai dari ({{ $cfg['price_unit'] }}). Penawaran final dibuat tertulis setelah survei lokasi.</p>
@endif

@if ($page === 'galeri')
    {{-- ---- Before-after gallery ---- --}}
    <div class="rr-cmpgrid">
        @foreach ($cfg['gallery'] as $g)
            <article class="rr-card rr-cmp" id="{{ $g['id'] }}" data-rr-in>
                <header><h2>{{ $g['title'] }}</h2><p>{{ $g['caption'] }}</p></header>
                <div class="rr-compare" data-rr-compare style="--pos:50%">
                    <img class="rr-compare__after" src="{{ $img($g['after']) }}" alt="{{ $g['title'] }} sesudah renovasi" loading="lazy">
                    <img class="rr-compare__before" src="{{ $img($g['before']) }}" alt="{{ $g['title'] }} sebelum renovasi" loading="lazy">
                    <span class="rr-compare__tag rr-compare__tag--b"><svg class="rr-i" aria-hidden="true"><use href="#i-camera"/></svg>Sebelum</span>
                    <span class="rr-compare__tag rr-compare__tag--a"><svg class="rr-i" aria-hidden="true"><use href="#i-camera"/></svg>Sesudah</span>
                    <span class="rr-compare__handle" aria-hidden="true"><svg class="rr-i"><use href="#i-chevr"/></svg></span>
                    <input type="range" min="0" max="100" value="50" aria-label="Geser untuk membandingkan {{ $g['title'] }} sebelum dan sesudah">
                </div>
            </article>
        @endforeach
    </div>
@endif

@if ($page === 'proyek')
    {{-- ---- Past projects ---- --}}
    <div class="rr-filter" role="group" aria-label="Filter proyek">
        <button type="button" class="is-on" data-rr-filter="all">Semua</button>
        <button type="button" data-rr-filter="interior">Interior</button>
        <button type="button" data-rr-filter="eksterior">Eksterior</button>
    </div>
    <div class="rr-prjgrid">
        @foreach ($cfg['projects'] as $p)
            <article class="rr-card rr-prj" id="{{ $p['id'] }}" data-cat="{{ $p['cat'] }}" data-rr-in>
                <div class="rr-prj__img"><img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}" width="640" height="440" loading="lazy"><span class="rr-prj__cat">{{ $p['cat'] }}</span></div>
                <div class="rr-prj__body"><h2>{{ $p['title'] }}</h2><p class="rr-prj__place"><svg class="rr-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $p['place'] }}</p><p>{{ $p['desc'] }}</p></div>
            </article>
        @endforeach
    </div>
@endif

@if ($page === 'area')
    {{-- ---- Service coverage ---- --}}
    <div class="rr-areagrid">
        <section class="rr-card rr-areamap" data-rr-in>
            <div class="rr-map rr-map--lg">
                <img src="{{ $img('map-indonesia.png') }}" alt="Peta wilayah layanan RenovatePro di Indonesia" width="1024" height="416" loading="lazy">
                @foreach ($cfg['pins'] as $pin)<span class="rr-pin" style="--x:{{ $pin['x'] }}%;--y:{{ $pin['y'] }}%"><b>{{ $pin['l'] }}</b></span>@endforeach
            </div>
        </section>
        <div class="rr-areaside">
            <section class="rr-card rr-regions" data-rr-in>
                <h2>Wilayah layanan</h2>
                <ul>@foreach ($cfg['areas'] as $a)<li><strong>{{ $a['name'] }}</strong><span>{{ $a['cities'] }}</span></li>@endforeach</ul>
            </section>
            <section class="rr-card rr-check" id="cek-area" data-rr-in>
                <h2>Cek Area Layanan</h2>
                <form class="rr-form" data-rr-form="area" novalidate>
                    <div class="rr-field"><label for="ar-wilayah">Wilayah</label><span class="rr-select"><select id="ar-wilayah" name="wilayah" required><option value="">Pilih wilayah</option>@foreach ($cfg['areas'] as $a)<option value="{{ $a['name'] }}">{{ $a['name'] }}</option>@endforeach<option value="Lainnya">Wilayah lain</option></select><svg class="rr-i" aria-hidden="true"><use href="#i-chev"/></svg></span></div>
                    <div class="rr-field"><label for="ar-kota">Kota / kecamatan</label><input id="ar-kota" name="kota" type="text" placeholder="Contoh: Bandung" autocomplete="address-level2" required></div>
                    <button class="rr-btn rr-btn--dark" type="submit"><span>Cek Sekarang</span><svg class="rr-i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                    <div class="rr-check__res" aria-live="polite"></div>
                </form>
            </section>
        </div>
    </div>
@endif

@if ($page === 'proses')
    {{-- ---- Work process ---- --}}
    <ol class="rr-timeline">
        @foreach ($cfg['process'] as $st)
            <li class="rr-card rr-tl" id="langkah-{{ $st['n'] }}" data-rr-in>
                <span class="rr-tl__ic"><svg class="rr-i" aria-hidden="true"><use href="#i-{{ $st['icon'] }}"/></svg></span>
                <div><h2><span>{{ $st['n'] }}.</span> {{ $st['title'] }}</h2><p>{{ $st['desc'] }}</p></div>
            </li>
        @endforeach
    </ol>
@endif

@if ($page === 'penawaran')
    {{-- ---- Quotation request ---- --}}
    <div class="rr-formgrid">
        <section class="rr-card rr-formcard" data-rr-in>
            <h2>Formulir Permintaan Penawaran</h2>
            <form class="rr-form" data-rr-form="quote" novalidate>
                <div class="rr-cols">
                    <div class="rr-field"><label for="q-nama">Nama lengkap</label><input id="q-nama" name="nama" type="text" autocomplete="name" placeholder="Nama Anda" required></div>
                    <div class="rr-field"><label for="q-wa">Nomor WhatsApp</label><input id="q-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required></div>
                </div>
                <div class="rr-field"><label for="q-email">Email (opsional)</label><input id="q-email" name="email" type="email" autocomplete="email" placeholder="Alamat email Anda"></div>
                <div class="rr-cols">
                    <div class="rr-field"><label for="q-layanan">Jenis layanan</label><span class="rr-select"><select id="q-layanan" name="layanan" required><option value="">Pilih layanan</option>@foreach ($cfg['services'] as $s)<option value="{{ $s['id'] }}">{{ $s['title'] }}</option>@endforeach</select><svg class="rr-i" aria-hidden="true"><use href="#i-chev"/></svg></span></div>
                    <div class="rr-field"><label for="q-paket">Paket</label><span class="rr-select"><select id="q-paket" name="paket"><option value="">Belum tahu</option>@foreach ($cfg['packages'] as $p)<option value="{{ $p['id'] }}">{{ $p['name'] }}</option>@endforeach</select><svg class="rr-i" aria-hidden="true"><use href="#i-chev"/></svg></span></div>
                </div>
                <div class="rr-cols">
                    <div class="rr-field"><label for="q-lokasi">Kota / lokasi proyek</label><input id="q-lokasi" name="lokasi" type="text" autocomplete="address-level2" placeholder="Contoh: Jakarta Selatan" required></div>
                    <div class="rr-field"><label for="q-luas">Perkiraan luas area (m²)</label><input id="q-luas" name="luas" type="number" min="1" inputmode="numeric" placeholder="Contoh: 40"></div>
                </div>
                <div class="rr-field"><label for="q-catatan">Kebutuhan Anda</label><textarea id="q-catatan" name="catatan" rows="4" placeholder="Ceritakan kondisi rumah dan hal yang ingin diubah"></textarea></div>
                <button class="rr-btn rr-btn--gold rr-btn--lg" type="submit"><svg class="rr-i rr-i--whatsapp" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Kirim ke WhatsApp</span></button>
                <p class="rr-form__msg" aria-live="polite"></p>
            </form>
        </section>
        <aside class="rr-card rr-side" data-rr-in>
            <img src="{{ $img('penawaran.jpg') }}" alt="Gambar kerja dan alat ukur renovasi" width="444" height="258" loading="lazy">
            <h2>Hubungi kami langsung</h2>
            <ul class="rr-side__list">
                <li><svg class="rr-i" aria-hidden="true"><use href="#i-phone"/></svg><a href="{{ $cfg['contact']['phone_href'] }}">{{ $cfg['contact']['phone'] }}</a></li>
                <li><svg class="rr-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cfg['contact']['email'] }}">{{ $cfg['contact']['email'] }}</a></li>
                <li><svg class="rr-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cfg['contact']['address'] }}</span></li>
            </ul>
            <a class="rr-btn rr-btn--wa" href="{{ $waLink }}" target="_blank" rel="noopener"><svg class="rr-i rr-i--whatsapp" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Chat via WhatsApp</span></a>
        </aside>
    </div>
@endif

@if ($page === 'survei')
    {{-- ---- Site survey booking ---- --}}
    <div class="rr-formgrid">
        <section class="rr-card rr-formcard" data-rr-in>
            <h2>Jadwalkan Survei Lokasi</h2>
            <form class="rr-form" data-rr-form="survey" novalidate>
                <div class="rr-cols">
                    <div class="rr-field"><label for="s-nama">Nama lengkap</label><input id="s-nama" name="nama" type="text" autocomplete="name" placeholder="Nama Anda" required></div>
                    <div class="rr-field"><label for="s-wa">Nomor WhatsApp</label><input id="s-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required></div>
                </div>
                <div class="rr-field"><label for="s-alamat">Alamat lokasi rumah</label><textarea id="s-alamat" name="alamat" rows="3" placeholder="Nama jalan, nomor, kota" required></textarea></div>
                <div class="rr-cols">
                    <div class="rr-field"><label for="s-wilayah">Wilayah</label><span class="rr-select"><select id="s-wilayah" name="wilayah" required><option value="">Pilih wilayah</option>@foreach ($cfg['areas'] as $a)<option value="{{ $a['name'] }}">{{ $a['name'] }}</option>@endforeach<option value="Lainnya">Wilayah lain</option></select><svg class="rr-i" aria-hidden="true"><use href="#i-chev"/></svg></span></div>
                    <div class="rr-field"><label for="s-layanan">Jenis layanan</label><span class="rr-select"><select id="s-layanan" name="layanan" required><option value="">Pilih layanan</option>@foreach ($cfg['services'] as $s)<option value="{{ $s['id'] }}">{{ $s['title'] }}</option>@endforeach</select><svg class="rr-i" aria-hidden="true"><use href="#i-chev"/></svg></span></div>
                </div>
                <div class="rr-field"><label for="s-tanggal">Tanggal survei</label><input id="s-tanggal" name="tanggal" type="date" required></div>
                <fieldset class="rr-field rr-slots"><legend>Jam survei</legend>
                    @foreach ($cfg['survey_slots'] as $slot)<label class="rr-chip"><input type="radio" name="waktu" value="{{ $slot }}" required><span>{{ $slot }}</span></label>@endforeach
                </fieldset>
                <div class="rr-field"><label for="s-catatan">Catatan (opsional)</label><textarea id="s-catatan" name="catatan" rows="3" placeholder="Contoh: akses masuk, kontak yang bisa dihubungi"></textarea></div>
                <button class="rr-btn rr-btn--gold rr-btn--lg" type="submit"><svg class="rr-i rr-i--whatsapp" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Booking via WhatsApp</span></button>
                <p class="rr-form__msg" aria-live="polite"></p>
            </form>
        </section>
        <aside class="rr-card rr-side" data-rr-in>
            <img src="{{ $img('booking-house.jpg') }}" alt="Rumah yang akan disurvei" width="441" height="270" loading="lazy">
            <h2>Saat survei, tim kami akan</h2>
            <ul class="rr-ticks">
                <li><svg class="rr-i" aria-hidden="true"><use href="#i-ruler"/></svg>Mengukur ruangan dan area kerja</li>
                <li><svg class="rr-i" aria-hidden="true"><use href="#i-helmet"/></svg>Memeriksa kondisi bangunan</li>
                <li><svg class="rr-i" aria-hidden="true"><use href="#i-chat"/></svg>Berdiskusi tentang kebutuhan dan anggaran</li>
            </ul>
        </aside>
    </div>
@endif

</div>
@endif
</main>

{{-- ============ FOOTER ============ --}}
<footer class="rr-footer">
    <div class="rr-container rr-footer__top">
        <div class="rr-footer__brand">
            <a class="rr-brand rr-brand--ft" href="{{ $u() }}" aria-label="{{ $brandName }} — Beranda">
                <img class="rr-brand__logo" src="{{ $img('logo.svg') }}" alt="" width="52" height="46" loading="lazy">
                <span class="rr-brand__txt"><strong>{{ $cfg['brand']['name'] }}<em>{{ $cfg['brand']['accent'] }}</em></strong><small>{{ $cfg['brand']['tagline'] }}</small></span>
            </a>
        </div>
        <nav class="rr-footer__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                <li><a href="{{ $u() }}">Beranda</a></li>
                <li><a href="{{ $u('layanan') }}">Layanan</a></li>
                <li><a href="{{ $u('paket-layanan') }}">Paket Layanan</a></li>
                <li><a href="{{ $u('galeri') }}">Galeri</a></li>
            </ul>
        </nav>
        <nav class="rr-footer__col" aria-label="Informasi">
            <h3>Informasi</h3>
            <ul>
                <li><a href="{{ $u('proses-kerja') }}">Tentang Kami</a></li>
                <li><button type="button" class="rr-linkbtn" data-rr-chat-open>FAQ</button></li>
                <li><a href="{{ $u('permintaan-penawaran') }}">Kontak</a></li>
                <li><a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}?text=Halo%20RenovatePro%2C%20saya%20ingin%20menanyakan%20lowongan%20kerja." target="_blank" rel="noopener">Karir</a></li>
            </ul>
        </nav>
        <div class="rr-footer__col">
            <h3>Ikuti Kami</h3>
            <ul class="rr-footer__soc">
                @foreach ($cfg['socials'] as $soc)
                    <li><a href="{{ $soc['url'] }}" aria-label="{{ $soc['label'] }}" target="_blank" rel="noopener"><svg class="rr-i rr-i--{{ $soc['icon'] }}" aria-hidden="true"><use href="#i-{{ $soc['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>
        <div class="rr-footer__col rr-footer__news">
            <h3>Newsletter</h3>
            <p>Dapatkan update terbaru dari {{ $brandName }}.</p>
            <form class="rr-news" data-rr-form="newsletter" novalidate>
                <label class="rr-sr" for="rr-news-email">Email Anda</label>
                <input id="rr-news-email" name="email" type="email" placeholder="Email Anda" autocomplete="email" required>
                <button type="submit" aria-label="Berlangganan"><svg class="rr-i" aria-hidden="true"><use href="#i-send"/></svg></button>
            </form>
            <p class="rr-form__msg" aria-live="polite"></p>
        </div>
    </div>
    <div class="rr-footer__bar">
        <div class="rr-container rr-footer__bar-in">
            <p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
            <ul>
                <li><button type="button" class="rr-linkbtn" data-rr-legal="terms">Syarat &amp; Ketentuan</button></li>
                <li><button type="button" class="rr-linkbtn" data-rr-legal="privacy">Kebijakan Privasi</button></li>
                <li><button type="button" class="rr-linkbtn" data-rr-chat-open>Bantuan</button></li>
            </ul>
        </div>
    </div>
</footer>

{{-- ============ FLOATING: WHATSAPP + AI CHAT ============ --}}
<div class="rr-float" id="rr-float">
    <p class="rr-float__hint" id="rr-hint" hidden>{{ $cfg['chat']['bubble'] }}</p>
    <a class="rr-wa" href="{{ $waLink }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $brandName }}">
        <span class="rr-wa__ring" aria-hidden="true"></span>
        <svg class="rr-i rr-i--whatsapp" aria-hidden="true"><use href="#i-whatsapp"/></svg>
        <span class="rr-wa__txt">WhatsApp</span>
    </a>
    <button class="rr-aibtn" type="button" data-rr-chat-open aria-haspopup="dialog" aria-controls="rr-chat" aria-label="Buka asisten AI Chat">
        <span class="rr-aibtn__av"><svg class="rr-robot" viewBox="0 0 64 64" aria-hidden="true" focusable="false"><g class="rr-robot__ant"><path d="M32 12V5" stroke="#3b2216" stroke-width="2.4" stroke-linecap="round"/><circle cx="32" cy="4.2" r="2.8" fill="#f4c25a" stroke="#3b2216" stroke-width="1.4"/></g><path d="M12 31c0-11.5 9-19 20-19s20 7.500 20 19z" fill="#e8a93b" stroke="#3b2216" stroke-width="2.2" stroke-linejoin="round"/><path d="M28 13.500v17M36 13.500v17" stroke="#c98a22" stroke-width="2.200"/><rect x="7.500" y="29" width="49" height="5.500" rx="2.750" fill="#c98a22" stroke="#3b2216" stroke-width="2"/><rect x="4" y="40" width="6" height="11" rx="3" fill="#c98a22" stroke="#3b2216" stroke-width="1.800"/><rect x="54" y="40" width="6" height="11" rx="3" fill="#c98a22" stroke="#3b2216" stroke-width="1.800"/><rect x="10.500" y="34.500" width="43" height="24" rx="11.500" fill="#f6e8cc" stroke="#3b2216" stroke-width="2.400"/><rect x="15.500" y="38.500" width="33" height="15.500" rx="7.750" fill="#2a1710"/><g class="rr-robot__eyes"><ellipse cx="25" cy="45.500" rx="2.700" ry="3.800" fill="#6fe3ff"/><ellipse cx="39" cy="45.500" rx="2.700" ry="3.800" fill="#6fe3ff"/></g><path d="M29 50.500q3 2.200 6 0" fill="none" stroke="#ff9aa8" stroke-width="1.800" stroke-linecap="round"/></svg></span>
        <span class="rr-aibtn__txt">AI Chat</span>
    </button>
</div>

{{-- ============ AI CHATBOT (service & estimate FAQ) ============ --}}
<section class="rr-chat" id="rr-chat" role="dialog" aria-modal="false" aria-labelledby="rr-chat-t" hidden>
    <header class="rr-chat__head">
        <span class="rr-chat__av"><svg class="rr-robot" viewBox="0 0 64 64" aria-hidden="true" focusable="false"><g class="rr-robot__ant"><path d="M32 12V5" stroke="#3b2216" stroke-width="2.4" stroke-linecap="round"/><circle cx="32" cy="4.2" r="2.8" fill="#f4c25a" stroke="#3b2216" stroke-width="1.4"/></g><path d="M12 31c0-11.5 9-19 20-19s20 7.500 20 19z" fill="#e8a93b" stroke="#3b2216" stroke-width="2.2" stroke-linejoin="round"/><path d="M28 13.500v17M36 13.500v17" stroke="#c98a22" stroke-width="2.200"/><rect x="7.500" y="29" width="49" height="5.500" rx="2.750" fill="#c98a22" stroke="#3b2216" stroke-width="2"/><rect x="4" y="40" width="6" height="11" rx="3" fill="#c98a22" stroke="#3b2216" stroke-width="1.800"/><rect x="54" y="40" width="6" height="11" rx="3" fill="#c98a22" stroke="#3b2216" stroke-width="1.800"/><rect x="10.500" y="34.500" width="43" height="24" rx="11.500" fill="#f6e8cc" stroke="#3b2216" stroke-width="2.400"/><rect x="15.500" y="38.500" width="33" height="15.500" rx="7.750" fill="#2a1710"/><g class="rr-robot__eyes"><ellipse cx="25" cy="45.500" rx="2.700" ry="3.800" fill="#6fe3ff"/><ellipse cx="39" cy="45.500" rx="2.700" ry="3.800" fill="#6fe3ff"/></g><path d="M29 50.500q3 2.200 6 0" fill="none" stroke="#ff9aa8" stroke-width="1.800" stroke-linecap="round"/></svg></span>
        <div><h2 id="rr-chat-t">{{ $cfg['chat']['name'] }}</h2><p>{{ $cfg['chat']['subtitle'] }}</p></div>
        <a class="rr-iconbtn" href="{{ $waLink }}" target="_blank" rel="noopener" aria-label="Lanjut ke WhatsApp"><svg class="rr-i rr-i--whatsapp" aria-hidden="true"><use href="#i-whatsapp"/></svg></a>
        <button type="button" class="rr-iconbtn" data-rr-chat-close aria-label="Tutup chat"><svg class="rr-i" aria-hidden="true"><use href="#i-close"/></svg></button>
    </header>
    <div class="rr-chat__log" id="rr-chat-log" aria-live="polite"></div>
    <div class="rr-chat__quick" id="rr-chat-quick"></div>
    <form class="rr-chat__form" id="rr-chat-form" autocomplete="off">
        <label class="rr-sr" for="rr-chat-input">Pesan Anda</label>
        <input type="text" id="rr-chat-input" placeholder="Tulis pertanyaan Anda…" maxlength="200">
        <button type="submit" class="rr-chat__send" aria-label="Kirim pesan"><svg class="rr-i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</section>

{{-- Dialog syarat & privasi --}}
<div class="rr-modal" id="rr-modal" role="dialog" aria-modal="true" aria-labelledby="rr-modal-t" hidden>
    <div class="rr-modal__box">
        <button type="button" class="rr-iconbtn rr-modal__x" data-rr-modal-close aria-label="Tutup"><svg class="rr-i" aria-hidden="true"><use href="#i-close"/></svg></button>
        <h2 id="rr-modal-t"></h2>
        <div id="rr-modal-body"></div>
    </div>
</div>
<div class="rr-toast" id="rr-toast" role="status" aria-live="polite" hidden></div>

<script type="application/json" id="rr-data">{!! $rrJson !!}</script>
<script src="{{ asset($jsFile) }}?v={{ $assetVer }}" defer></script>
</body>
</html>
