@php
    $isHome  = request()->routeIs($cafe['routes']['home']);
    $homeUrl = route($cafe['routes']['home']);
    $cta     = $cafe['nav_cta'];
@endphp
<header class="kl-navbar" data-kl-navbar>
    <div class="kl-navbar__inner">
        <a class="kl-brand" href="{{ $homeUrl }}" aria-label="{{ $cafe['brand']['name'] }} — ke beranda">
            <img class="kl-brand__icon" src="{{ $img('logo-icon.png') }}" alt="" width="78" height="44">
            <span class="kl-brand__text">
                <span class="kl-brand__name">{{ $cafe['brand']['name'] }}</span>
                <span class="kl-brand__tag">{{ $cafe['brand']['tagline'] }}</span>
            </span>
        </a>

        <nav class="kl-nav" id="kl-nav" aria-label="Navigasi utama">
            <ul class="kl-nav__list">
                @foreach ($cafe['nav'] as $item)
                    @php $active = $isHome && $loop->first; @endphp
                    <li>
                        <a class="kl-nav__link {{ $active ? 'is-active' : '' }}"
                           href="{{ $isHome ? '#' . $item['anchor'] : $homeUrl . '#' . $item['anchor'] }}"
                           data-kl-nav="{{ $item['anchor'] }}"
                           @if ($active) aria-current="true" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="kl-navbar__actions">
            <button class="kl-iconbtn" type="button" data-kl-search-toggle aria-expanded="false" aria-controls="kl-search" aria-label="Cari menu">
                <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-search"/></svg>
            </button>

            <a class="kl-btn kl-btn--green kl-navbar__cta" href="{{ route($cafe['routes'][$cta['route']]) }}" aria-label="{{ $cta['label'] }}">
                <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-calendar"/></svg>
                <span>{{ $cta['label'] }}</span>
            </a>

            <button class="kl-iconbtn kl-navbar__toggle" type="button" data-kl-nav-toggle aria-expanded="false" aria-controls="kl-nav" aria-label="Buka menu navigasi">
                <svg class="kl-icon kl-navbar__toggle-open" aria-hidden="true"><use href="#kl-i-menu"/></svg>
                <svg class="kl-icon kl-navbar__toggle-close" aria-hidden="true"><use href="#kl-i-close"/></svg>
            </button>
        </div>
    </div>

    <div class="kl-navbar__search" id="kl-search" data-kl-search-panel hidden>
        <form class="kl-searchform" action="{{ route($cafe['routes']['menu']) }}" method="GET" role="search">
            <label class="kl-sr" for="kl-search-input">Cari menu</label>
            <input id="kl-search-input" class="kl-input" type="search" name="q" placeholder="Cari kopi, makanan, atau dessert…" autocomplete="off">
            <button class="kl-btn kl-btn--red kl-btn--sm" type="submit">Cari</button>
        </form>
    </div>
</header>
