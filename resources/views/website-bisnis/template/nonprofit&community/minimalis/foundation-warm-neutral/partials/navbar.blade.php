<header class="hf-nav" data-nav>
    <div class="hf-nav__progress" aria-hidden="true"><span data-scroll-progress></span></div>
    <div class="hf-container hf-nav__inner">
        <a class="hf-brand" href="{{ route($rp.'home') }}" aria-label="{{ $f['brand']['name'] }} {{ $f['brand']['suffix'] }} - Beranda">
            @include($v.'.partials.logo')
        </a>

        <nav class="hf-nav__links" id="hf-menu" aria-label="Navigasi utama">
            @foreach($f['nav'] as $item)
                <a class="hf-nav__link {{ request()->routeIs($rp.$item['route']) ? 'is-active' : '' }}" href="{{ route($rp.$item['route']) }}" data-menu-link>{{ $item['label'] }}</a>
            @endforeach
            <a class="hf-btn hf-btn--dark hf-nav__cta-mobile" href="{{ route($rp.'donation') }}">Donasi Sekarang <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="hf-nav__actions">
            <button class="hf-iconbtn hf-iconbtn--search" type="button" data-search-open aria-label="Cari halaman (tekan /)" aria-haspopup="dialog"><svg class="hf-i" aria-hidden="true"><use href="#i-search"/></svg></button>
            <a class="hf-btn hf-btn--dark hf-btn--sm hf-nav__cta" href="{{ route($rp.'donation') }}">Donasi Sekarang <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button class="hf-burger" type="button" data-menu-toggle aria-expanded="false" aria-controls="hf-menu" aria-label="Buka menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div class="hf-search" id="hf-search" hidden>
    <div class="hf-search__backdrop" data-search-close></div>
    <div class="hf-search__panel" role="dialog" aria-modal="true" aria-label="Cari di situs">
        <div class="hf-search__bar">
            <svg class="hf-i" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" id="hf-search-input" placeholder="Cari halaman, program, donasi, relawan..." autocomplete="off" aria-controls="hf-search-list" aria-label="Kata kunci pencarian">
            <button type="button" class="hf-search__esc" data-search-close aria-label="Tutup pencarian">Esc</button>
        </div>
        <div class="hf-search__tags" aria-label="Pencarian cepat">
            <span>Cepat:</span>
            <button type="button" data-search-tag="donasi">Donasi</button>
            <button type="button" data-search-tag="relawan">Relawan</button>
            <button type="button" data-search-tag="laporan">Laporan</button>
            <button type="button" data-search-tag="program">Program</button>
        </div>
        <p class="hf-search__label" id="hf-search-label">Halaman populer</p>
        <ul class="hf-search__list" id="hf-search-list" role="listbox" aria-labelledby="hf-search-label"></ul>
        <div class="hf-search__foot" aria-hidden="true">
            <span><kbd>&uarr;</kbd><kbd>&darr;</kbd> pilih</span>
            <span><kbd>Enter</kbd> buka</span>
            <span><kbd>Esc</kbd> tutup</span>
        </div>
    </div>
</div>
