<header class="hf-nav" data-nav>
    <div class="hf-container hf-nav__inner">
        <a class="hf-brand" href="{{ route($rp.'home') }}" aria-label="{{ $f['brand']['name'] }} {{ $f['brand']['suffix'] }} - Beranda">
            @include($v.'.partials.logo')
        </a>

        <nav class="hf-nav__links" id="hf-menu" aria-label="Navigasi utama">
            @foreach($f['nav'] as $item)
                @if($item['route'] === 'kontak')
                    <a class="hf-nav__link" href="#kontak" data-menu-link>{{ $item['label'] }}</a>
                @else
                    <a class="hf-nav__link {{ request()->routeIs($rp.$item['route']) ? 'is-active' : '' }}" href="{{ route($rp.$item['route']) }}" data-menu-link>{{ $item['label'] }}</a>
                @endif
            @endforeach
            <a class="hf-btn hf-btn--dark hf-nav__cta-mobile" href="{{ route($rp.'donation') }}">Donasi Sekarang <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="hf-nav__actions">
            <button class="hf-iconbtn" type="button" data-search-open aria-label="Cari halaman"><svg class="hf-i" aria-hidden="true"><use href="#i-search"/></svg></button>
            <a class="hf-btn hf-btn--dark hf-btn--sm hf-nav__cta" href="{{ route($rp.'donation') }}">Donasi Sekarang <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button class="hf-burger" type="button" data-menu-toggle aria-expanded="false" aria-controls="hf-menu" aria-label="Buka menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div class="hf-search" id="hf-search" hidden>
    <div class="hf-search__backdrop" data-search-close></div>
    <div class="hf-search__box" role="dialog" aria-modal="true" aria-label="Cari halaman">
        <div class="hf-search__field">
            <svg class="hf-i" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" id="hf-search-input" placeholder="Cari halaman: donasi, program, relawan..." autocomplete="off">
            <button type="button" class="hf-iconbtn" data-search-close aria-label="Tutup pencarian"><svg class="hf-i" aria-hidden="true"><use href="#i-close"/></svg></button>
        </div>
        <ul class="hf-search__list" id="hf-search-list"></ul>
    </div>
</div>
