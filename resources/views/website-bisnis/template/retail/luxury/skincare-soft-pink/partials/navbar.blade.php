@php
    $is = fn (string $n) => request()->routeIs($rp . $n);
    $links = [
        'index'   => 'Home',
        'catalog' => 'Katalog',
        'price'   => 'Harga',
        'stock'   => 'Stok',
        'shop'    => 'Toko Online',
        'inquiry' => 'Inquiry',
    ];
@endphp
<header class="nav" data-nav>
    <div class="container nav__inner">
        <a class="brand" href="{{ route($rp . 'index') }}" aria-label="{{ $cfg['brand']['name'] }} - Beranda">
            <svg class="brand__mark" aria-hidden="true"><use href="#bz-flower"/></svg>
            <span class="brand__text"><strong>{{ $cfg['brand']['name'] }}</strong><small>{{ $cfg['brand']['tagline'] }}</small></span>
        </a>

        <nav class="nav__menu" id="primary-nav" aria-label="Navigasi utama" data-nav-menu>
            @foreach ($links as $name => $label)
                <a class="nav__link {{ $is($name) ? 'is-active' : '' }}" href="{{ route($rp . $name) }}" @if ($is($name)) aria-current="page" @endif>{{ $label }}</a>
            @endforeach
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
