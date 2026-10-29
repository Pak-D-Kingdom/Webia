<header class="ta-header" data-ta-header>
    <div class="ta-container ta-header__in">
        <a class="ta-brand" href="{{ $r('index') }}" aria-label="{{ $cfg['brand']['name'] }} — beranda">
            <svg class="ta-brand__mark" aria-hidden="true"><use href="#ta-logo"/></svg>
            <span class="ta-brand__text">
                <strong>{{ $cfg['brand']['name'] }}</strong>
                <small>{{ $cfg['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="ta-nav" id="ta-nav" aria-label="Navigasi utama" data-ta-nav>
            <ul class="ta-nav__list">
                @foreach ($cfg['nav'] as $item)
                    @php $active = request()->routeIs($cfg['route_prefix'] . $item['route']); @endphp
                    <li>
                        <a class="ta-nav__link {{ $active ? 'is-active' : '' }}" href="{{ $r($item['route']) }}" @if($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="ta-btn ta-btn--primary ta-nav__cta" href="{{ $r('booking-inquiry') }}">
                <svg class="ta-i" aria-hidden="true"><use href="#i-chat"/></svg>Pesan Sekarang
            </a>
        </nav>

        <div class="ta-header__actions">
            <a class="ta-iconbtn" href="{{ $r('paket-tour') }}" aria-label="Cari paket tour"><svg class="ta-i" aria-hidden="true"><use href="#i-search"/></svg></a>
            <a class="ta-btn ta-btn--primary ta-header__cta" href="{{ $r('booking-inquiry') }}">
                <svg class="ta-i" aria-hidden="true"><use href="#i-chat"/></svg>Pesan Sekarang
            </a>
            <button class="ta-burger" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="ta-nav" data-ta-burger>
                <svg class="ta-i ta-burger__open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="ta-i ta-burger__close" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>
</header>
