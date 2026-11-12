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
                    @php
                        $children = $item['children'] ?? [];
                        $active = $page === $item['route'];
                    @endphp
                    <li class="hr-nav__item {{ $children ? 'has-dd' : '' }} {{ $active ? 'is-active' : '' }}">
                        @if ($children)
                            <div class="hr-nav__row">
                                <a class="hr-nav__link" href="{{ $go($item['route']) }}">{{ $item['label'] }}</a>
                                <button type="button" class="hr-nav__caret" data-dd-toggle aria-expanded="false" aria-label="Buka submenu {{ $item['label'] }}">{{ $i('chevron') }}</button>
                            </div>
                            <ul class="hr-dd" role="menu">
                                @foreach ($children as $c)
                                    <li role="none">
                                        <a role="menuitem" href="{{ $go($c['route'] ?? $item['route']) }}{{ isset($c['hash']) ? '#'.$c['hash'] : '' }}">
                                            <span class="hr-dd__ico">{{ $i($c['icon'] ?? 'check') }}</span>{{ $c['label'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a class="hr-nav__link" href="{{ $go($item['route']) }}" @if($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a class="hr-btn hr-btn--primary hr-nav__cta" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Booking Survei</span>{{ $i('arrow') }}</a>
        </nav>

        <div class="hr-header__actions">
            <button type="button" class="hr-iconbtn hr-iconbtn--search" data-search-open aria-label="Cari di situs">{{ $i('search') }}</button>
            <a class="hr-btn hr-btn--primary hr-btn--sm hr-header__cta" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Booking Survei</span>{{ $i('arrow') }}</a>
            <button type="button" class="hr-iconbtn hr-burger" data-nav-open aria-controls="hrNav" aria-expanded="false" aria-label="Buka menu">{{ $i('menu') }}</button>
        </div>
    </div>
    <div class="hr-scrim" data-scrim hidden></div>

    <div class="hr-search" data-search hidden role="dialog" aria-modal="true" aria-label="Pencarian">
        <div class="hr-search__box">
            <div class="hr-search__field">
                {{ $i('search') }}
                <input type="search" data-search-input placeholder="Cari layanan, paket, proyek, area…" autocomplete="off" aria-label="Kata kunci pencarian">
                <button type="button" class="hr-iconbtn" data-search-close aria-label="Tutup pencarian">{{ $i('close') }}</button>
            </div>
            <ul class="hr-search__results" data-search-results></ul>
        </div>
    </div>
</header>
