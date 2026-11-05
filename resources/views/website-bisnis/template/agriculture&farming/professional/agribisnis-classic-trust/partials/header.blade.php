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
        <a class="brand" href="{{ route('agribisnis.home') }}" aria-label="AgroTrade — beranda">
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
                        <a href="{{ route('agribisnis.' . $item['route']) }}"
                           class="menu__link {{ request()->routeIs('agribisnis.' . $item['route']) ? 'is-active' : '' }}"
                           @if (request()->routeIs('agribisnis.' . $item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="btn btn--amber btn--block menu__cta-mobile" href="{{ route('agribisnis.b2b') }}">
                Hubungi Kami <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
        </nav>

        <div class="nav__actions">
            <button type="button" class="icon-btn" id="searchToggle" aria-label="Cari komoditas" aria-expanded="false" aria-controls="searchBox">
                <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
            </button>
            <a class="btn btn--amber nav__cta" href="{{ route('agribisnis.b2b') }}">
                Hubungi Kami <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
            <button type="button" class="icon-btn nav__burger" id="menuToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="mainMenu">
                <svg class="i i--open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="i i--close" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>

    <div class="searchbox" id="searchBox" hidden>
        <form class="container searchbox__form" action="{{ route('agribisnis.komoditas') }}" method="get" role="search">
            <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" name="q" placeholder="Cari komoditas, mis. kopi, kakao, lada…" aria-label="Cari komoditas" autocomplete="off">
            <button type="submit" class="btn btn--amber btn--sm">Cari</button>
        </form>
    </div>
</header>
<div class="nav-backdrop" id="navBackdrop" hidden></div>
