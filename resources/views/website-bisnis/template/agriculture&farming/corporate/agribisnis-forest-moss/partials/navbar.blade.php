<div class="navbar">
    <div class="container navbar__in">
        <a class="brand" href="{{ route('agribisnis.home') }}" aria-label="{{ $cfg['site']['name'] }} — beranda">
            <img class="brand__mark" src="{{ asset($cfg['img']['logo']) }}" alt="" width="44" height="44">
            <span class="brand__txt">
                <strong>GREEN HARVEST</strong>
                <small>{{ $cfg['site']['tagline'] }}</small>
            </span>
        </a>

        <div class="nav-panel" id="navPanel">
            <nav aria-label="Navigasi utama">
                <ul class="nav">
                    @foreach($cfg['nav'] as $item)
                        <li class="nav__item @if(request()->routeIs($item['match'])) is-active @endif">
                            <a class="nav__link" href="{{ route($item['route']) }}" title="{{ $item['title'] }}" @if(request()->routeIs($item['match'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <a class="btn btn--dark btn--pill nav-panel__cta" href="{{ route('agribisnis.inquiry') }}">
                <span>Hubungi Kami</span>
                <svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
        </div>

        <div class="navbar__actions">
            <div class="site-search" data-search>
                <button class="icon-btn" type="button" aria-label="Cari halaman" aria-expanded="false" data-search-toggle>
                    <svg class="ic" aria-hidden="true"><use href="#i-search"/></svg>
                </button>
                <div class="site-search__pop" hidden>
                    <label class="sr-only" for="siteSearchInput">Cari halaman</label>
                    <input id="siteSearchInput" type="search" placeholder="Cari komoditas, MOQ, sertifikasi…" autocomplete="off" data-search-input>
                    <ul data-search-list>
                        @foreach($cfg['quick'] as $q)
                            <li><a href="{{ route($q['route']) }}"><svg class="ic" aria-hidden="true"><use href="#i-{{ $q['icon'] }}"/></svg><span>{{ $q['title'] }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a class="btn btn--dark btn--pill navbar__cta" href="{{ route('agribisnis.inquiry') }}">
                <span>Hubungi Kami</span>
                <svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
            <button class="nav-toggle" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="navPanel">
                <svg class="ic ic--menu" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="ic ic--close" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>
</div>
<div class="progress" aria-hidden="true"><i data-progress></i></div>
<div class="nav-backdrop" data-nav-backdrop hidden></div>
