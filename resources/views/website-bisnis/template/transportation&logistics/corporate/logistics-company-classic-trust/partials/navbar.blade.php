{{-- Navbar utama + drawer mobile + dialog pencarian --}}
<header class="navbar" data-navbar>
    <div class="container container--nav navbar__in">
        <a class="brand" href="{{ $route('home') }}" aria-label="{{ $c['brand']['name'] }} — Beranda">
            <svg class="brand__mark" viewBox="0 0 48 48" aria-hidden="true"><use href="#logo-mark"/></svg>
            <span class="brand__text">
                <strong>{{ $c['brand']['upper'] }}</strong>
                <small>{{ $c['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="nav" id="nav-menu" data-nav aria-label="Menu utama">
            <ul class="nav__list">
                @foreach ($c['nav'] as $item)
                    @php
                        $href = isset($item['route']) ? $route($item['route']) : $item['href'];
                        $active = isset($item['route']) && request()->routeIs($c['route_prefix'] . $item['route']);
                    @endphp
                    <li>
                        <a class="nav__link {{ $active ? 'is-active' : '' }}" href="{{ $href }}" @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="btn btn--orange nav__cta-mobile" href="{{ $route('penawaran') }}">Minta Penawaran
                <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
        </nav>

        <div class="navbar__actions">
            <button type="button" class="icon-btn" data-search-open aria-label="Cari halaman" aria-haspopup="dialog">
                <svg class="ic" aria-hidden="true"><use href="#i-search"/></svg>
            </button>
            <a class="btn btn--orange navbar__cta" href="{{ $route('penawaran') }}">Minta Penawaran
                <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
            <button type="button" class="burger" data-nav-toggle aria-expanded="false" aria-controls="nav-menu" aria-label="Buka menu">
                <svg class="ic ic--open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="ic ic--close" aria-hidden="true"><use href="#i-close"/></svg>
            </button>
        </div>
    </div>
</header>
<div class="nav-backdrop" data-nav-backdrop hidden></div>

<div class="search-modal" data-search-modal role="dialog" aria-modal="true" aria-label="Cari halaman" hidden>
    <div class="search-modal__box">
        <form class="search-modal__form" data-search-form role="search">
            <svg class="ic" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" data-search-input placeholder="Cari layanan, tracking, tarif…" autocomplete="off" aria-label="Kata kunci pencarian">
            <button type="button" class="icon-btn icon-btn--plain" data-search-close aria-label="Tutup pencarian">
                <svg class="ic" aria-hidden="true"><use href="#i-close"/></svg>
            </button>
        </form>
        <ul class="search-modal__list" data-search-list></ul>
    </div>
</div>
