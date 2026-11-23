{{--
    Layout utama Renovaku. Variabel cfg, img, go, i, vp, page diturunkan dari view anak
    (lihat blok PHP di bagian atas setiap halaman).
--}}
@php
    $jsData = $cfg['js'];
    $jsData['whatsapp'] = $cfg['site']['whatsapp'];
    $jsData['siteName'] = $cfg['site']['name'];
    $jsData['page']     = $page;
    $jsData['links']    = [];
    $searchIndex        = [];

    $pageImg = [
        'home' => 'hero-house-mascot.jpg', 'layanan' => 'service-living-room.jpg', 'paket-layanan' => 'project-2.jpg',
        'galeri' => 'gallery-after.jpg', 'proyek' => 'project-1.jpg', 'area-layanan' => 'coverage-map.png',
        'proses-kerja' => 'survey-tape.jpg', 'permintaan-penawaran' => 'quotation-hand.jpg', 'booking-survei' => 'survey-tape.jpg',
    ];
    foreach ($cfg['pages'] as $key => $p) {
        $jsData['links'][$key] = $go($key);
        $searchIndex[] = ['g' => 'Halaman', 't' => $p['title'], 'd' => $p['desc'], 'u' => $go($key), 'i' => $p['icon'], 'm' => $img($pageImg[$key])];
    }
    foreach ($cfg['services'] as $s) {
        $searchIndex[] = ['g' => 'Layanan', 't' => $s['title'], 'd' => $s['short'], 'u' => $go('layanan').'#'.$s['id'], 'i' => $s['icon'], 'm' => $img('service-living-room.jpg'), 'x' => $s['duration']];
    }
    foreach ($cfg['packages'] as $p) {
        $searchIndex[] = ['g' => 'Paket', 't' => $p['name'], 'd' => $p['tagline'].' — '.$p['price'], 'u' => $go('paket-layanan').'#'.$p['id'], 'i' => 'crown', 'm' => $img('project-2.jpg'), 'x' => $p['price']];
    }
    foreach ($cfg['projects'] as $p) {
        $searchIndex[] = ['g' => 'Proyek', 't' => $p['title'], 'd' => $p['location'].' · '.$p['type'], 'u' => $go('proyek').'#'.$p['id'], 'i' => 'home', 'm' => $img($p['image']), 'x' => $p['area']];
    }
    foreach ($cfg['regions'] as $n => $r) {
        $searchIndex[] = ['g' => 'Area', 't' => $r['name'], 'd' => $r['cities'], 'u' => $go('area-layanan').'#wilayah-'.$n, 'i' => 'pin', 'm' => $img('coverage-map.png'), 'x' => $r['lead']];
    }
    $jsData['search'] = $searchIndex;
    $jsData['cards'] = [
        'paket' => array_map(fn ($p) => ['title' => $p['name'], 'price' => $p['price'], 'sub' => $p['tagline'], 'pop' => $p['popular'], 'icon' => $p['icon'], 'href' => $go('permintaan-penawaran').'?paket='.$p['id'], 'label' => 'Pilih paket'], $cfg['packages']),
        'proyek' => array_map(fn ($p) => ['title' => $p['title'], 'sub' => $p['location'], 'img' => $img($p['image']), 'href' => $go('proyek').'#'.$p['id'], 'label' => 'Lihat proyek'], $cfg['projects']),
        'layanan' => array_map(fn ($s) => ['title' => $s['title'], 'sub' => $s['duration'], 'icon' => $s['icon'], 'href' => $go('layanan').'#'.$s['id'], 'label' => 'Lihat layanan'], $cfg['services']),
        'area' => array_map(fn ($r) => ['title' => $r['name'], 'sub' => $r['lead'], 'icon' => 'pin', 'href' => $go('area-layanan'), 'label' => 'Cek area'], $cfg['regions']),
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Renovaku — Renovasi & Perbaikan Rumah dengan Kualitas Terbaik')</title>
    <meta name="description" content="@yield('meta_description', 'Renovaku: renovasi total hingga perbaikan kecil untuk rumah yang lebih nyaman, indah, dan bernilai lebih tinggi.')">
    <meta name="theme-color" content="#2f4a2d">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='14' fill='%232f4a2d'/%3E%3Cpath d='M12 32 32 14l20 18v18H12z' fill='%239cba8a'/%3E%3Cpath d='M8 33 32 11l24 22' stroke='%23fff' stroke-width='5' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($cfg['paths']['css'].'/home-renovation-repair.css') }}">
    <script>document.documentElement.classList.add('hr-js');</script>
    @stack('head')
</head>
<body class="hr-body hr-page-{{ $page }}">
    <a class="hr-skip" href="#main">Lewati ke konten utama</a>
    @include($vp.'sprite')
    @include($vp.'topbar')
    @include($vp.'navbar')

    <main id="main">
        @yield('content')
    </main>

    @include($vp.'footer')
    @include($vp.'search')
    @include($vp.'floating')

    <div class="hr-lightbox" data-lightbox hidden role="dialog" aria-modal="true" aria-label="Pratinjau gambar">
        <button type="button" class="hr-lightbox__x" data-lightbox-close aria-label="Tutup pratinjau">{{ $i('close') }}</button>
        <button type="button" class="hr-lightbox__nav hr-lightbox__nav--prev" data-lightbox-prev aria-label="Gambar sebelumnya">{{ $i('chevron-left') }}</button>
        <figure><img data-lightbox-img src="" alt=""><figcaption data-lightbox-cap></figcaption></figure>
        <button type="button" class="hr-lightbox__nav hr-lightbox__nav--next" data-lightbox-next aria-label="Gambar berikutnya">{{ $i('chevron-right') }}</button>
    </div>

    <div class="hr-wipe" data-wipe aria-hidden="true"><span></span><span></span><span></span></div>

    <script>window.HRR = {!! json_encode($jsData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!};</script>
    <script src="{{ asset($cfg['paths']['js'].'/home-renovation-repair.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
