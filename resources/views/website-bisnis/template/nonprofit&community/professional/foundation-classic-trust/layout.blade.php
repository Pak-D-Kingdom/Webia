@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
    $current = optional(request()->route())->getName();
    $pages = ['index', 'mission', 'programs', 'impact', 'donation', 'financial', 'partners', 'volunteer', 'news', 'chatbot'];
    $links = [];
    foreach ($pages as $p) { $links[$p] = route('foundation-classic-trust.' . $p); }
    $searchMap = [
        'index'     => ['beranda', 'home', 'utama'],
        'mission'   => ['tentang', 'misi', 'visi', 'nilai', 'profil'],
        'programs'  => ['program', 'pendidikan', 'kesehatan', 'ekonomi', 'lingkungan', 'beasiswa'],
        'impact'    => ['dampak', 'penerima', 'manfaat', 'statistik', 'capaian'],
        'donation'  => ['donasi', 'berdonasi', 'sumbang', 'infak', 'bantu'],
        'financial' => ['transparansi', 'keuangan', 'laporan', 'audit', 'dana'],
        'partners'  => ['mitra', 'sponsor', 'csr', 'kerja sama', 'kolaborasi'],
        'volunteer' => ['relawan', 'volunteer', 'daftar', 'gabung'],
        'news'      => ['berita', 'acara', 'kegiatan', 'agenda', 'event'],
        'chatbot'   => ['chatbot', 'faq', 'tanya', 'bantuan', 'bot'],
    ];
    $search = [];
    foreach ($searchMap as $k => $keys) {
        $meta = $fd['pages'][$k];
        $search[] = ['title' => $meta[0], 'desc' => $meta[1], 'icon' => $meta[2], 'url' => $links[$k], 'keys' => $keys];
    }
    $clientData = [
        'wa'     => $fd['contact']['whatsapp'],
        'links'  => $links,
        'search' => $search,
        'faq'    => ['greeting' => $fd['faq']['greeting'], 'quick' => $fd['faq']['quick'], 'items' => $fd['faq']['items'], 'fallback' => $fd['faq']['fallback']],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Harapan Untuk Negeri Foundation — Membangun Masa Depan yang Lebih Baik')</title>
    <meta name="description" content="@yield('description', 'Yayasan filantropi terpercaya: program pendidikan, kesehatan, pemberdayaan ekonomi, dan pelestarian lingkungan untuk masyarakat Indonesia.')">
    <meta name="theme-color" content="#0a2748">
    <link rel="icon" type="image/svg+xml" href="{{ $i('logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($fdCss) }}">
    <script>document.documentElement.classList.add('fd-js');</script>
</head>
<body class="fd-body" data-page="{{ $current }}">
    @include($fdBase . '.partials.icons')
    <a class="fd-skip" href="#fd-main">Lewati ke konten utama</a>

    @include($fdBase . '.partials.topbar')
    @include($fdBase . '.partials.navbar')

    <main id="fd-main">
        @yield('content')
    </main>

    @include($fdBase . '.partials.footer')
    @include($fdBase . '.partials.floating')

    <script>window.FD = @json($clientData);</script>
    <script src="{{ asset($fdJs) }}" defer></script>
</body>
</html>
