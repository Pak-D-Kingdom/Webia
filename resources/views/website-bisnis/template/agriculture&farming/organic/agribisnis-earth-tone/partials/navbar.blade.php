@php
    $nav = [
        ['label' => 'Beranda',       'href' => $u['home'],              'active' => request()->routeIs('agribisnis.home')],
        ['label' => 'Komoditas',     'href' => $u['komoditas'],         'active' => request()->routeIs('agribisnis.komoditas')],
        ['label' => 'Tentang Kami',  'href' => $u['home'] . '#tentang', 'active' => false],
        ['label' => 'Kemitraan',     'href' => $u['b2b'],               'active' => request()->routeIs('agribisnis.b2b')],
        ['label' => 'Sertifikasi',   'href' => $u['sertifikasi'],       'active' => request()->routeIs('agribisnis.sertifikasi')],
        ['label' => 'Kontak',        'href' => '#kontak',               'active' => false],
    ];
@endphp
<div class="navbar" id="navbar">
    <div class="navbar__inner">
        <a class="brand" href="{{ $u['home'] }}" aria-label="{{ $data['brand']['name'] }} - Beranda">
            <img class="brand__leaf" src="{{ $img }}/logo-leaf.png" alt="" width="46" height="46">
            <span class="brand__text">
                <strong>{{ $data['brand']['name'] }}</strong>
                <small>{{ $data['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="nav" id="navMenu" aria-label="Navigasi utama">
            <ul class="nav__list">
                @foreach ($nav as $item)
                    <li>
                        <a href="{{ $item['href'] }}" class="nav__link {{ $item['active'] ? 'is-active' : '' }}" @if($item['active']) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="btn btn--primary nav__cta-mobile" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener">Hubungi Kami <svg class="ico"><use href="#i-arrow"></use></svg></a>
        </nav>

        <div class="navbar__actions">
            <button class="icon-btn" type="button" id="searchToggle" aria-label="Cari komoditas" aria-haspopup="dialog" aria-controls="searchOverlay">
                <svg class="ico"><use href="#i-search"></use></svg>
            </button>
            <a class="btn btn--primary navbar__cta" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener">Hubungi Kami <svg class="ico"><use href="#i-arrow"></use></svg></a>
            <button class="icon-btn navbar__burger" type="button" id="navToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="navMenu">
                <svg class="ico ico--open"><use href="#i-menu"></use></svg>
                <svg class="ico ico--close"><use href="#i-close"></use></svg>
            </button>
        </div>
    </div>
</div>

<div class="search-overlay" id="searchOverlay" role="dialog" aria-modal="true" aria-label="Cari komoditas" hidden>
    <div class="search-overlay__box">
        <form class="search-overlay__form" id="searchForm" action="{{ $u['komoditas'] }}" method="get" role="search">
            <svg class="ico"><use href="#i-search"></use></svg>
            <input type="search" name="q" id="searchInput" placeholder="Cari komoditas, mis. kopi, kakao, padi" autocomplete="off" aria-label="Kata kunci komoditas">
            <button class="btn btn--primary btn--sm" type="submit">Cari</button>
            <button class="icon-btn" type="button" id="searchClose" aria-label="Tutup pencarian"><svg class="ico"><use href="#i-close"></use></svg></button>
        </form>
        <ul class="search-overlay__chips">
            @foreach ($data['commodities'] as $c)
                <li><a href="{{ $u['komoditas'] }}?q={{ urlencode(strtolower($c['name'])) }}">{{ $c['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
