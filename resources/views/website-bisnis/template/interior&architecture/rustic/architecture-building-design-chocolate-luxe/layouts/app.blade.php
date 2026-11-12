@php
    /** @var array $site  Data dari config/template/.../architecture-building-design.php */
    // Pengaman: jika halaman tidak mengirim $site, muat sendiri dari config.
    $site = $site ?? (config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php'));
    $u   = fn (string $p = '') => url($site['base'] . $p);
    $img = fn (string $f) => asset($site['img'] . '/' . $f);
    $v   = $site['view'];
    $active = trim($__env->yieldContent('active', 'beranda'));

    // Index pencarian (dipakai tombol search di navbar)
    $search = [];
    foreach ($site['nav'] as $n) {
        if ($n['path'] !== '#kontak') { $search[] = ['t' => $n['label'], 'u' => $u($n['path']), 's' => 'Halaman']; }
    }
    foreach ($site['portfolio'] as $p) { $search[] = ['t' => $p['title'], 'u' => $u('/portofolio'), 's' => 'Portofolio · ' . $p['loc']]; }
    foreach ($site['projects'] as $group => $items) { foreach ($items as $p) { $search[] = ['t' => $p['title'], 'u' => $u('/proyek#' . $group), 's' => 'Proyek ' . ucfirst($group)]; } }
    foreach ($site['services'] as $s) { $search[] = ['t' => $s['title'], 'u' => $u('/layanan'), 's' => 'Layanan']; }
    foreach ($site['plans'] as $p) { $search[] = ['t' => 'Denah ' . $p['title'], 'u' => $u('/denah-3d'), 's' => 'Denah & 3D Render']; }
    foreach ($site['process'] as $p) { $search[] = ['t' => $p['title'], 'u' => $u('/proses'), 's' => 'Proses Proyek']; }
    foreach ($site['certs'] as $c) { $search[] = ['t' => $c['title'], 'u' => $u('/sertifikasi'), 's' => 'Sertifikasi']; }
    $search[] = ['t' => 'Booking Konsultasi', 'u' => $u('/konsultasi'), 's' => 'Konsultasi'];
    $search[] = ['t' => 'Permintaan Penawaran', 'u' => $u('/penawaran'), 's' => 'Penawaran'];

    $client = [
        'brand'    => $site['brand']['name'],
        'whatsapp' => $site['contact']['whatsapp'],
        'base'     => url($site['base']),
        'img'      => asset($site['img']),
        'faq'      => $site['faq'],
        'quick'    => $site['quick'],
        'search'   => $search,
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="abd-root" data-theme="chocolate-luxe">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', $site['meta']['title'])</title>
    <meta name="description" content="@yield('description', $site['meta']['description'])">
    <meta name="theme-color" content="#3a2515">
    <link rel="icon" type="image/svg+xml" href="{{ $img('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($site['css']) }}">
    <script>document.documentElement.className+=" abd-js";window.addEventListener("load",function(){setTimeout(function(){if(!window.__abdReady){document.documentElement.classList.remove("abd-js");}},3000);});</script>
    @stack('head')
</head>
<body class="abd-body" data-page="{{ $active }}">
    <a class="abd-skip" href="#abd-main">Lewati ke konten utama</a>

    @include($v . '.partials.sprite')
    @include($v . '.partials.topbar')
    @include($v . '.partials.header')

    <main id="abd-main" class="abd-main">
        @yield('content')
    </main>

    @include($v . '.partials.footer')
    @include($v . '.partials.floating')

    <div class="abd-toast" id="abd-toast" role="status" aria-live="polite"></div>
    <script type="application/json" id="abd-data">@json($client)</script>
    <script src="{{ asset($site['js']) }}" defer></script>
    @stack('scripts')
</body>
</html>
