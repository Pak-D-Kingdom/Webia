{{-- Dipakai halaman dalam. Variabel: $bannerTitle, $bannerText, $bannerKey (halaman aktif), $bannerImg (opsional) --}}
@php
    $pages = [
        ['key' => 'komoditas',   'label' => 'Katalog Komoditas',   'href' => $u['komoditas']],
        ['key' => 'panen',       'label' => 'Informasi Panen',     'href' => $u['panen']],
        ['key' => 'spesifikasi', 'label' => 'Spesifikasi Produk',  'href' => $u['spesifikasi']],
        ['key' => 'moq',         'label' => 'Pesanan Minimum',     'href' => $u['moq']],
        ['key' => 'kapasitas',   'label' => 'Kapasitas Pasokan',   'href' => $u['kapasitas']],
        ['key' => 'distribusi',  'label' => 'Jangkauan Distribusi', 'href' => $u['distribusi']],
        ['key' => 'sertifikasi', 'label' => 'Sertifikasi',         'href' => $u['sertifikasi']],
        ['key' => 'b2b',         'label' => 'Inquiry B2B',         'href' => $u['b2b']],
        ['key' => 'penawaran',   'label' => 'Permintaan Penawaran', 'href' => $u['penawaran']],
        ['key' => 'chatbot',     'label' => 'AI FAQ',              'href' => $u['chatbot']],
    ];
@endphp
<section class="page-banner">
    <img class="page-banner__bg" src="{{ $img }}/{{ $bannerImg ?? 'hero-bg.jpg' }}" alt="" aria-hidden="true">
    <div class="page-banner__veil" aria-hidden="true"></div>
    <div class="page-banner__inner">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ $u['home'] }}">Beranda</a>
            <svg class="ico"><use href="#i-chev-right"></use></svg>
            <span aria-current="page">{{ $bannerTitle }}</span>
        </nav>
        <h1>{{ $bannerTitle }}</h1>
        <p>{{ $bannerText }}</p>
    </div>
</section>
<nav class="page-tabs" aria-label="Halaman informasi komoditas">
    <ul class="page-tabs__list">
        @foreach ($pages as $p)
            <li><a href="{{ $p['href'] }}" class="page-tabs__link {{ $bannerKey === $p['key'] ? 'is-active' : '' }}" @if($bannerKey === $p['key']) aria-current="page" @endif>{{ $p['label'] }}</a></li>
        @endforeach
    </ul>
</nav>
