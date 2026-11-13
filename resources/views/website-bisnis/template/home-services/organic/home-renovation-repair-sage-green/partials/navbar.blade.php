<header class="hr-header" data-header>
    <div class="hr-container hr-header__inner">
        <a class="hr-logo" href="{{ $go('home') }}" aria-label="{{ $cfg['site']['name'] }} — Beranda">
            @include($vp.'logo')
            <span class="hr-logo__text"><strong>{{ $cfg['site']['name'] }}</strong><small>{{ $cfg['site']['tagline'] }}</small></span>
        </a>

        <nav class="hr-nav" id="hrNav" aria-label="Menu utama" data-nav>
            <div class="hr-nav__top">
                <span class="hr-nav__title">Menu</span>
                <button type="button" class="hr-iconbtn" data-nav-close aria-label="Tutup menu">{{ $i('close') }}</button>
            </div>
            <ul class="hr-nav__list">
                @foreach ($cfg['nav'] as $item)
                    <li class="hr-nav__item {{ $page === $item['route'] ? 'is-active' : '' }}">
                        <a class="hr-nav__link" href="{{ $go($item['route']) }}" @if ($page === $item['route']) aria-current="page" @endif>
                            <span class="hr-nav__ico">{{ $i($item['icon']) }}</span><span>{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="hr-nav__foot">
                <a class="hr-btn hr-btn--primary hr-btn--block" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Booking Survei</span>{{ $i('arrow') }}</a>
                <div class="hr-nav__contact">
                    <a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $i('whatsapp') }}<span>WhatsApp</span></a>
                    <a href="{{ $cfg['site']['phone_href'] }}">{{ $i('phone') }}<span>Telepon</span></a>
                </div>
            </div>
        </nav>

        <div class="hr-header__actions">
            <button type="button" class="hr-searchbtn" data-search-open aria-label="Cari di situs" aria-haspopup="dialog">
                {{ $i('search') }}<span class="hr-searchbtn__txt">Cari</span><kbd>/</kbd>
            </button>
            <a class="hr-btn hr-btn--primary hr-btn--sm hr-header__cta" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Booking Survei</span>{{ $i('arrow') }}</a>
            <button type="button" class="hr-iconbtn hr-burger" data-nav-open aria-controls="hrNav" aria-expanded="false" aria-label="Buka menu">{{ $i('menu') }}</button>
        </div>
    </div>
    <div class="hr-progress" data-progress aria-hidden="true"></div>
    <div class="hr-scrim" data-scrim hidden></div>
</header>
