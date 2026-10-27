@php
    $is = fn ($n) => request()->routeIs('skincare-warm-neutral.' . $n) ? 'is-active' : '';
@endphp
<header class="navbar-wrap" data-navbar>
    <div class="container navbar">
        <a class="brand" href="{{ route('skincare-warm-neutral.home') }}" aria-label="{{ $skin['name'] }} — Beranda">
            <img class="brand__leaf" src="{{ asset($skin['img'] . '/logo-leaf.png') }}" alt="" width="44" height="42">
            <span class="brand__txt"><b>{{ $skin['name'] }}</b><small>{{ $skin['tagline'] }}</small></span>
        </a>

        <nav class="nav" id="primaryNav" aria-label="Navigasi utama" data-nav>
            <a class="nav__link {{ $is('home') }}" href="{{ route('skincare-warm-neutral.home') }}">Beranda</a>

            <div class="nav__item has-dd" data-dd>
                <a class="nav__link {{ $is('catalog') }}" href="{{ route('skincare-warm-neutral.catalog') }}">Katalog</a>
                <button type="button" class="nav__caret" data-dd-toggle aria-expanded="false" aria-label="Buka submenu Katalog"><i class="bi bi-chevron-down"></i></button>
                <ul class="dd">
                    @foreach ($skin['categories'] as $c)
                        <li><a href="{{ route('skincare-warm-neutral.catalog') }}{{ $c['slug'] === 'all' ? '' : '?kategori=' . $c['slug'] }}"><i class="bi {{ $c['icon'] }}"></i>{{ $c['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <a class="nav__link {{ $is('price') }}" href="{{ route('skincare-warm-neutral.price') }}">Harga</a>
            <a class="nav__link {{ $is('stock') }}" href="{{ route('skincare-warm-neutral.stock') }}">Ketersediaan</a>
            <a class="nav__link {{ $is('inquiry') }}" href="{{ route('skincare-warm-neutral.inquiry') }}">Inquiry</a>
            <button type="button" class="nav__link nav__ai" data-ai-open><i class="bi bi-stars"></i> AI FAQ</button>
        </nav>

        <div class="navbar__actions">
            <button type="button" class="icon-btn" data-search-toggle aria-expanded="false" aria-controls="navSearch" aria-label="Cari produk"><i class="bi bi-search"></i></button>
            <a class="icon-btn icon-btn--cart {{ $is('cart') }}" href="{{ route('skincare-warm-neutral.cart') }}" aria-label="Keranjang belanja">
                <i class="bi bi-bag"></i><span class="cart-count" data-cart-count>0</span>
            </a>
            <a class="btn btn--sm navbar__cta" href="{{ route('skincare-warm-neutral.catalog') }}">Shop Now <i class="bi bi-arrow-right"></i></a>
            <button type="button" class="nav-toggle" data-nav-toggle aria-expanded="false" aria-controls="primaryNav" aria-label="Buka menu"><span></span><span></span><span></span></button>
        </div>
    </div>

    <form class="navsearch" id="navSearch" action="{{ route('skincare-warm-neutral.catalog') }}" method="get" role="search" hidden>
        <div class="container navsearch__in">
            <i class="bi bi-search"></i>
            <input type="search" name="q" placeholder="Cari produk skincare, makeup, dll..." aria-label="Cari produk" autocomplete="off">
            <button class="btn btn--sm" type="submit">Cari</button>
        </div>
    </form>
</header>
<div class="nav-backdrop" data-nav-backdrop hidden></div>
