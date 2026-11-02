@php
    $rp = $site['route_prefix'];
    $current = optional(request()->route())->getName();
@endphp
<header class="lc-header" data-lc-header>
    <div class="lc-wrap lc-header__in">
        <a class="lc-brand" href="{{ route($rp . 'home') }}" aria-label="{{ $site['brand']['name'] }} — beranda">
            <svg class="lc-brand__mark" aria-hidden="true" focusable="false"><use href="#lc-logo"></use></svg>
            <span class="lc-brand__text">
                <strong>{{ strtoupper($site['brand']['name']) }}<sup>®</sup></strong>
                <small>{{ $site['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="lc-nav" id="lc-nav" aria-label="Menu utama" data-lc-nav>
            <ul class="lc-nav__list">
                @foreach ($site['nav'] as $item)
                    @php $active = $current === $rp . $item['route']; @endphp
                    <li>
                        <a class="lc-nav__link{{ $active ? ' is-active' : '' }}" href="{{ route($rp . $item['route']) }}"{!! $active ? ' aria-current="page"' : '' !!}>{{ $item['label'] }}</a>
                    </li>
                @endforeach
                <li class="lc-nav__cta-item">
                    <a class="lc-btn lc-btn--outline" href="{{ route($rp . 'quotation') }}">Hubungi Kami
                        <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="lc-header__tools">
            <a class="lc-iconbtn" href="{{ route($rp . 'tracking') }}" aria-label="Lacak pengiriman">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-search"></use></svg>
            </a>
            <a class="lc-btn lc-btn--outline lc-header__cta" href="{{ route($rp . 'quotation') }}">Hubungi Kami
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
            </a>
            <button class="lc-iconbtn lc-burger" type="button" aria-expanded="false" aria-controls="lc-nav" data-lc-burger>
                <span class="lc-sr">Buka menu</span>
                <svg class="lc-ico lc-burger__open" aria-hidden="true"><use href="#lc-i-menu"></use></svg>
                <svg class="lc-ico lc-burger__close" aria-hidden="true"><use href="#lc-i-close"></use></svg>
            </button>
        </div>
    </div>
</header>
<div class="lc-scrim" data-lc-scrim hidden></div>
