{{-- Navbar sticky + menu mobile + panel pencarian --}}
<header class="navbar" data-navbar>
    <div class="container navbar__in">
        <a class="brand" href="{{ route($rp.'home') }}" aria-label="{{ $t['brand']['name'] }} — beranda">
            <img src="{{ $img }}logo-mark.png" alt="" width="42" height="42">
            <span class="brand__txt"><strong>{{ $t['brand']['name'] }}</strong><small>{{ $t['brand']['tagline'] }}</small></span>
        </a>

        <nav class="menu" id="primary-menu" aria-label="Navigasi utama" data-menu>
            <ul class="menu__list">
                @foreach ($t['nav'] as $item)
                    @php
                        $href   = route($rp.$item['route']).(isset($item['anchor']) ? '#'.$item['anchor'] : '');
                        $active = ! isset($item['anchor']) && request()->routeIs($rp.$item['route']);
                    @endphp
                    <li><a class="menu__link {{ $active ? 'is-active' : '' }}" href="{{ $href }}"
                           @if ($active) aria-current="page" @endif
                           @if (! empty($item['chat'])) data-chat-trigger aria-haspopup="dialog" aria-controls="el-chat" @endif>{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
            <div class="menu__cta">
                <a class="btn btn--ghost" href="{{ route($rp.'member-area') }}">Login</a>
                <a class="btn btn--primary" href="{{ route($rp.'registration') }}">Get Started <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
        </nav>

        <div class="navbar__actions">
            <button class="icon-btn" type="button" data-search-toggle aria-label="Cari kursus" aria-expanded="false" aria-controls="nav-search"><i class="bi bi-search" aria-hidden="true"></i></button>
            <a class="btn btn--ghost navbar__login" href="{{ route($rp.'member-area') }}">Login</a>
            <a class="btn btn--primary navbar__start" href="{{ route($rp.'registration') }}">Get Started <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            <button class="burger" type="button" data-menu-toggle aria-label="Buka menu" aria-expanded="false" aria-controls="primary-menu"><span></span><span></span><span></span></button>
        </div>
    </div>

    <form class="navsearch" id="nav-search" action="{{ route($rp.'programs') }}" method="get" role="search" data-search-panel hidden>
        <div class="container navsearch__in">
            <i class="bi bi-search" aria-hidden="true"></i>
            <input type="search" name="q" placeholder="{{ $t['hero']['search_placeholder'] }}" aria-label="Cari kursus" autocomplete="off">
            <button class="btn btn--primary btn--sm" type="submit">Cari</button>
        </div>
    </form>
</header>