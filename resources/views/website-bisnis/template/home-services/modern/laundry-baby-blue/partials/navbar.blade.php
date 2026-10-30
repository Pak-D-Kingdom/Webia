<header class="lb-header" data-lb-header>
    <div class="lb-container lb-header__inner">
        <a class="lb-brand" href="{{ $lbRoute('home') }}" aria-label="{{ $brand['name'] }} — Beranda">
            <img class="lb-brand__logo" src="{{ $lbAsset('img', 'logo-cloud.png') }}" alt="" width="62" height="50">
            <span class="lb-brand__text">
                <strong>Blue<span>Laundry</span></strong>
                <small>{{ $brand['tagline'] }}</small>
            </span>
        </a>

        <nav class="lb-nav" id="lbNav" data-lb-nav aria-label="Navigasi utama">
            <ul class="lb-nav__list">
                @foreach ($laundry['nav'] as $item)
                    @php $active = $current === 'webia.laundry-baby-blue.' . $item['route']; @endphp
                    <li>
                        <a class="lb-nav__link {{ $active ? 'is-active' : '' }}" href="{{ $lbRoute($item['route']) }}" @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="lb-btn lb-btn--primary lb-nav__cta-mobile" href="{{ $lbRoute('order-inquiry') }}">
                <svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg>Order Sekarang
            </a>
        </nav>

        <a class="lb-btn lb-btn--primary lb-header__cta" href="{{ $lbRoute('order-inquiry') }}">
            <svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg><span>Order Sekarang</span>
        </a>

        <button class="lb-nav-toggle" type="button" data-lb-nav-toggle aria-controls="lbNav" aria-expanded="false" aria-label="Buka menu">
            <svg class="lb-i lb-i--menu" aria-hidden="true"><use href="#i-menu"/></svg>
            <svg class="lb-i lb-i--close" aria-hidden="true"><use href="#i-close"/></svg>
        </button>
    </div>
</header>
<div class="lb-nav-backdrop" data-lb-nav-backdrop hidden></div>
