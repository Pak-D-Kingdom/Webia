@php
    $is = fn (string $n) => request()->routeIs($rp . $n);
    $shopActive = $is('catalog') || $is('price') || $is('stock') || $is('shop');
@endphp
<header class="nav" data-nav>
    <div class="container nav__inner">
        <a class="brand" href="{{ route($rp . 'index') }}" aria-label="{{ $cfg['brand']['name'] }} - Beranda">
            <svg class="brand__mark" aria-hidden="true"><use href="#bz-flower"/></svg>
            <span class="brand__text"><strong>{{ $cfg['brand']['name'] }}</strong><small>{{ $cfg['brand']['tagline'] }}</small></span>
        </a>

        <nav class="nav__menu" id="primary-nav" aria-label="Navigasi utama" data-nav-menu>
            <a class="nav__link {{ $is('index') ? 'is-active' : '' }}" href="{{ route($rp . 'index') }}" @if($is('index')) aria-current="page" @endif>Home</a>

            <div class="nav__dd" data-dd>
                <button class="nav__link {{ $shopActive ? 'is-active' : '' }}" type="button" aria-haspopup="true" aria-expanded="false" data-dd-toggle>
                    Shop <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </button>
                <div class="nav__dd-menu">
                    <a href="{{ route($rp . 'catalog') }}" @if($is('catalog')) aria-current="page" @endif><i class="bi bi-grid" aria-hidden="true"></i> Katalog Produk</a>
                    <a href="{{ route($rp . 'price') }}" @if($is('price')) aria-current="page" @endif><i class="bi bi-tag" aria-hidden="true"></i> Daftar Harga</a>
                    <a href="{{ route($rp . 'stock') }}" @if($is('stock')) aria-current="page" @endif><i class="bi bi-box-seam" aria-hidden="true"></i> Stok &amp; Ketersediaan</a>
                    <a href="{{ route($rp . 'shop') }}" @if($is('shop')) aria-current="page" @endif><i class="bi bi-bag-heart" aria-hidden="true"></i> Toko Online</a>
                </div>
            </div>

            <a class="nav__link {{ $is('inquiry') ? 'is-active' : '' }}" href="{{ route($rp . 'inquiry') }}" @if($is('inquiry')) aria-current="page" @endif>Inquiry</a>
            <button class="nav__link" type="button" data-open-chat>AI FAQ</button>
        </nav>

        <div class="nav__actions">
            <a class="icon-btn" href="{{ route($rp . 'catalog') }}?focus=search" aria-label="Cari produk"><i class="bi bi-search" aria-hidden="true"></i></a>
            <a class="icon-btn" href="{{ route($rp . 'catalog') }}?wishlist=1" aria-label="Wishlist"><i class="bi bi-heart" aria-hidden="true"></i><span class="icon-btn__badge" data-wish-count hidden>0</span></a>
            <button class="icon-btn" type="button" aria-label="Buka keranjang" data-cart-open><i class="bi bi-bag" aria-hidden="true"></i><span class="icon-btn__badge" data-cart-count hidden>0</span></button>
            <a class="btn btn--rose nav__cta" href="{{ route($rp . 'shop') }}">Shop Now <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            <button class="nav__toggle" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="primary-nav" data-nav-toggle><span></span><span></span><span></span></button>
        </div>
    </div>
</header>
