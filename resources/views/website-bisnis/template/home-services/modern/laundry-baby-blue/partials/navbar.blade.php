<header class="lb-header" data-lb-header>
    <div class="lb-container lb-header__inner">
        <a class="lb-brand" href="{{ route('webia.laundry-baby-blue.home') }}" aria-label="{{ $brand['name'] }} — Beranda">
            <img class="lb-brand__logo" src="{{ asset($laundry['assets']['img'] . '/logo-cloud.png') }}" alt="" width="62" height="50">
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
                        <a class="lb-nav__link {{ $active ? 'is-active' : '' }}" href="{{ route('webia.laundry-baby-blue.' . $item['route']) }}" @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <a class="lb-btn lb-btn--primary lb-header__cta" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}">
            <svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg><span>Order Sekarang</span>
        </a>
    </div>
</header>
