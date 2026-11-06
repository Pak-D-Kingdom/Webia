@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $active ??= 'home';
@endphp
<header class="site-header" data-header>
    <div class="container header__inner">
        <a class="brand" href="{{ route($cfg['route'] . 'home') }}" aria-label="{{ $cfg['brand']['name'] }} — beranda">
            <span class="brand__mark"><svg class="ico" aria-hidden="true"><use href="#i-logo"/></svg></span>
            <span class="brand__text">
                <strong>{{ $cfg['brand']['name'] }}</strong>
                <small>{{ $cfg['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="nav" id="site-nav" aria-label="Navigasi utama" data-nav>
            <ul class="nav__list">
                @foreach($cfg['nav'] as $item)
                    <li>
                        <a class="nav__link {{ $active === $item['key'] ? 'is-active' : '' }}"
                           href="{{ route($cfg['route'] . $item['route']) }}"
                           @if($active === $item['key']) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
                <li>
                    <button type="button" class="nav__link nav__link--ai" data-ai-open>
                        <svg class="ico" aria-hidden="true"><use href="#i-sparkles"/></svg> AI FAQ
                    </button>
                </li>
            </ul>
            <a class="btn btn--primary nav__cta-mobile" href="{{ route($cfg['route'] . 'shop') }}">Shop Now <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </nav>

        <div class="header__actions">
            <a class="icon-btn" href="{{ route($cfg['route'] . 'catalog') }}#cari" aria-label="Cari produk"><svg class="ico"><use href="#i-search"/></svg></a>
            <button type="button" class="icon-btn" data-wish-open aria-label="Produk favorit">
                <svg class="ico"><use href="#i-heart"/></svg><span class="count" data-wish-count hidden>0</span>
            </button>
            <button type="button" class="icon-btn" data-cart-open aria-label="Buka keranjang">
                <svg class="ico"><use href="#i-bag"/></svg><span class="count" data-cart-count hidden>0</span>
            </button>
            <a class="btn btn--primary header__cta" href="{{ route($cfg['route'] . 'shop') }}">Shop Now <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
            <button type="button" class="icon-btn nav-toggle" data-nav-toggle aria-expanded="false" aria-controls="site-nav" aria-label="Buka menu">
                <svg class="ico ico--open"><use href="#i-menu"/></svg>
                <svg class="ico ico--close"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>
</header>
<div class="nav-backdrop" data-nav-backdrop hidden></div>
