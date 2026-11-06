<div class="topbar" id="topbar">
    <div class="container topbar__in">
        <ul class="topbar__list">
            @foreach ($agro['topbar']['items'] as $item)
                <li class="topbar__item topbar__item--{{ $item[0] }}">
                    <svg class="i" aria-hidden="true"><use href="#i-{{ $item[0] }}"/></svg>
                    @if ($item[0] === 'phone')
                        <a href="tel:{{ preg_replace('/[^+\d]/', '', $item[1]) }}">{{ $item[1] }}</a>
                    @elseif ($item[0] === 'mail')
                        <a href="mailto:{{ $item[1] }}">{{ $item[1] }}</a>
                    @else
                        <span>{{ $item[1] }}</span>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="topbar__lang" data-dropdown>
            <button type="button" class="topbar__lang-btn" aria-haspopup="listbox" aria-expanded="false">
                <span>ID</span>
                <svg class="i i--sm" aria-hidden="true"><use href="#i-chev"/></svg>
            </button>
            <ul class="dropdown__menu" role="listbox" hidden>
                @foreach ($agro['topbar']['langs'] as $lang)
                    <li role="option" aria-selected="{{ $lang[2] ? 'true' : 'false' }}" class="{{ $lang[2] ? 'is-active' : 'is-disabled' }}">
                        <b>{{ $lang[0] }}</b> {{ $lang[1] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<header class="nav" id="siteNav">
    <div class="container nav__in">
        <a class="brand" href="{{ route('agribisnis-classic-trust.home') }}" aria-label="AgroTrade — beranda">
            <img class="brand__logo" src="{{ $img('logo-agrotrade.svg') }}" width="48" height="42" alt="">
            <span class="brand__txt">
                <strong>AgroTrade</strong>
                <small>{{ $agro['meta']['tagline'] }}</small>
            </span>
        </a>

        <nav class="menu" id="mainMenu" aria-label="Menu utama">
            <ul class="menu__list">
                @foreach ($agro['nav'] as $item)
                    <li>
                        <a href="{{ route('agribisnis-classic-trust.' . $item['route']) }}"
                           class="menu__link {{ request()->routeIs('agribisnis-classic-trust.' . $item['route']) ? 'is-active' : '' }}"
                           @if (request()->routeIs('agribisnis-classic-trust.' . $item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="btn btn--amber btn--block menu__cta-mobile" href="{{ route('agribisnis-classic-trust.b2b') }}">
                Hubungi Kami <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
        </nav>

        <div class="nav__actions">
            <button type="button" class="searchbtn" id="searchToggle" aria-label="Cari komoditas atau halaman" aria-haspopup="dialog" aria-controls="searchModal">
                <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
                <span class="searchbtn__txt">Cari</span>
                <kbd class="searchbtn__kbd" aria-hidden="true">/</kbd>
            </button>
            <a class="btn btn--amber nav__cta" href="{{ route('agribisnis-classic-trust.b2b') }}">
                Hubungi Kami <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
            <button type="button" class="icon-btn nav__burger" id="menuToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="mainMenu">
                <svg class="i i--open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="i i--close" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>

    <div class="nav__progress" id="navProgress" aria-hidden="true"></div>
</header>
<div class="nav-backdrop" id="navBackdrop" hidden></div>

<div class="smodal" id="searchModal" role="dialog" aria-modal="true" aria-label="Pencarian" hidden>
    <div class="smodal__backdrop" data-search-close></div>
    <div class="smodal__panel">
        <form class="smodal__form" id="searchForm" action="{{ route('agribisnis-classic-trust.komoditas') }}" method="get" role="search">
            <svg class="i smodal__ico" aria-hidden="true"><use href="#i-search"/></svg>
            <label class="sr-only" for="searchInput">Cari komoditas atau halaman</label>
            <input type="search" id="searchInput" name="q" placeholder="Cari komoditas, mis. kopi, kakao, lada…" autocomplete="off" enterkeyhint="search" spellcheck="false">
            <button type="button" class="smodal__clear" id="searchClear" aria-label="Hapus pencarian" hidden>
                <svg class="i" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
            <button type="button" class="smodal__close" data-search-close>Tutup</button>
        </form>
        <div class="smodal__body" id="searchBody" aria-live="polite"></div>
        <div class="smodal__foot" aria-hidden="true">
            <span><kbd>↑</kbd><kbd>↓</kbd> pilih</span>
            <span><kbd>Enter</kbd> buka</span>
            <span><kbd>Esc</kbd> tutup</span>
        </div>
    </div>
</div>
