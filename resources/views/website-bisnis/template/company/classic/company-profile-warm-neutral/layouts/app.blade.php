@php
    /*
    |--------------------------------------------------------------------------
    | Company Profile — Classic / Warm Neutral  (WEBIA by D-KREASI)
    |--------------------------------------------------------------------------
    | Layout utama untuk semua halaman (Beranda, Tentang Kami, Portofolio).
    |
    | Frontend statis: semua konten dibaca dari file config
    |   config/template/company/classic/company-profile-warm-neutral/company-profile.php
    | Layout ini hanya menyiapkan URL, navigasi, dan helper (tanpa data hardcode).
    |
    | Setiap halaman memanggil layout ini lewat @extends dan menentukan:
    |   pageKey    : 'beranda' | 'tentang' | 'portofolio'
    |   pageTitle  : judul <title>
    |   pageDesc   : meta description
    |   anchors    : id bagian yang ada di halaman itu (dipakai untuk tautan menu)
    |   sections   : daftar file di folder sections/ yang dirender berurutan
    |   pageHeader : (opsional) judul, subjudul, dan breadcrumb header halaman
    */

    $ns  = 'website-bisnis.template.company.classic.company-profile-warm-neutral';
    $cfg = config('template.company.classic.company-profile-warm-neutral.company-profile', []);

    $pageKey    = $pageKey ?? 'beranda';
    $pageTitle  = $pageTitle ?? 'Solusi Kreatif untuk Masa Depan';
    $pageDesc   = $pageDesc ?? 'Nusantara Kreasi adalah mitra terpercaya dalam menghadirkan solusi kreatif dan inovatif untuk mendukung pertumbuhan bisnis Anda.';
    $anchors    = $anchors ?? [];
    $sections   = $sections ?? [];
    $pageHeader = $pageHeader ?? null;

    /* ----- Data dari config ------------------------------------------------ */
    $company        = $cfg['company'] ?? [];
    $social         = $cfg['social'] ?? [];
    $hero           = $cfg['hero'] ?? [];
    $about          = $cfg['about'] ?? [];
    $whatsapp       = $cfg['whatsapp'] ?? [];
    $ai             = $cfg['ai'] ?? [];
    $quote          = $cfg['quote'] ?? [];
    $services       = $cfg['services'] ?? [];
    $portfolio      = $cfg['portfolio'] ?? [];
    $projects       = $cfg['projects'] ?? [];
    $certifications = $cfg['certifications'] ?? [];
    $clients        = $cfg['clients'] ?? [];

    /* ----- Aset ------------------------------------------------------------ */
    $cssPath = $cfg['assets']['css'] ?? '';
    $jsPath  = $cfg['assets']['js'] ?? '';
    $imgDir  = $cfg['assets']['img_dir'] ?? '';

    $asset = fn (string $path) => asset($path) . (is_file(public_path($path)) ? '?v=' . filemtime(public_path($path)) : '');
    $img   = fn (string $file) => $asset($imgDir . $file);
    $icon  = fn (string $name, string $class = '') => '<svg class="cp-i ' . $class . '" aria-hidden="true" focusable="false"><use href="#i-' . $name . '"></use></svg>';

    /* ----- URL halaman ----------------------------------------------------- */
    $routeNames = $cfg['routes'] ?? [];
    $page = fn (string $key) => isset($routeNames[$key]) && \Illuminate\Support\Facades\Route::has($routeNames[$key]) ? route($routeNames[$key]) : '#';

    // Tautan ke sebuah bagian: anchor jika bagian ada di halaman ini, selain itu ke Beranda.
    $link = fn (string $id) => in_array($id, $anchors, true) ? '#' . $id : $page('beranda') . '#' . $id;

    // Ubah definisi tautan di config (type home | page | section) menjadi URL.
    $resolve = function (array $target) use ($page, $link, $pageKey) {
        switch ($target['type'] ?? 'section') {
            case 'home':
                return $pageKey === 'beranda' ? '#beranda' : $page('beranda');
            case 'page':
                return $page($target['page'] ?? 'beranda');
            default:
                return $link($target['id'] ?? 'beranda');
        }
    };

    /* ----- Navigasi -------------------------------------------------------- */
    $nav = array_map(fn (array $item) => [
        'label'   => $item['label'],
        'href'    => $resolve($item),
        'current' => ($item['type'] ?? '') === 'page' && ($item['page'] ?? null) === $pageKey,
    ], $cfg['nav'] ?? []);

    // Navbar hanya menampilkan item yang tidak ditandai 'navbar' => false di config.
    $navbar = array_values(array_filter($cfg['nav'] ?? [], fn (array $item) => ($item['navbar'] ?? true) !== false));
    $navbar = array_map(fn (array $item) => [
        'label'   => $item['label'],
        'href'    => $resolve($item),
        'current' => ($item['type'] ?? '') === 'page' && ($item['page'] ?? null) === $pageKey,
    ], $navbar);

    $footerNav = array_chunk($nav, 4);

    /* ----- WhatsApp -------------------------------------------------------- */
    $waBase = 'https://wa.me/' . preg_replace('/\D+/', '', $whatsapp['number'] ?? '');
    $waUrl  = $waBase . '?text=' . rawurlencode($whatsapp['message'] ?? '');

    /* ----- AI Company FAQ -------------------------------------------------- */
    $faq = array_map(function (array $entry) use ($resolve) {
        $entry['link'] = ['href' => $resolve($entry['link']), 'label' => $entry['link']['label'] ?? ''];

        return $entry;
    }, $cfg['faq'] ?? []);

    /* ----- Indeks pencarian (lintas halaman) ------------------------------- */
    $searchIndex = array_merge(
        array_map(fn ($item) => ['label' => $item['label'], 'href' => $item['href'], 'group' => ''], $nav),
        array_map(fn ($item) => ['label' => $item['title'], 'href' => $link('layanan'), 'group' => 'Layanan'], $services),
        array_map(fn ($item) => ['label' => $item['title'], 'href' => $page('portofolio'), 'group' => 'Portofolio'], $portfolio),
        array_map(fn ($item) => ['label' => $item['title'], 'href' => $link('proyek'), 'group' => 'Proyek'], $projects),
        array_map(fn ($item) => ['label' => $item['title'], 'href' => $link('sertifikasi'), 'group' => 'Sertifikasi'], $certifications),
        array_map(fn ($item) => ['label' => $item['name'], 'href' => $link('klien'), 'group' => 'Klien'], $clients)
    );
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#5a4335">
    <title>{{ $pageTitle }} — {{ $company['name'] }}</title>
    <meta name="description" content="{{ $pageDesc }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="{{ $asset($cssPath) }}">

    <script>document.documentElement.classList.add('cp-js');</script>
    <script src="{{ $asset($jsPath) }}" defer></script>
</head>
<body class="cp cp--{{ $pageKey }}" id="top">

    <a class="cp-skip" href="#konten">Lewati ke konten utama</a>

    @include($ns . '.partials.svg-sprite')
    @include($ns . '.partials.topbar')
    @include($ns . '.partials.navbar')

    <main id="konten">
        @foreach ($sections as $section)
            @include($ns . '.sections.' . $section)
        @endforeach
    </main>

    @include($ns . '.partials.footer')
    @include($ns . '.partials.ai-assistant')
    @include($ns . '.partials.video-dialog')

    <script type="application/json" id="cp-faq-data">{!! json_encode($faq, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
    <script type="application/json" id="cp-search-data">{!! json_encode($searchIndex, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
</body>
</html>
