<header class="uh-navbar" data-uh-navbar>
    <div class="uh-container uh-navbar__inner">
        <a class="uh-brand" href="{{ $url('home') }}" aria-label="{{ $uh['brand']['name'] }} — Beranda">
            <img class="uh-brand__logo" src="{{ $img('logo-emblem-terang.jpg') }}" width="46" height="52" alt="">
            <span class="uh-brand__text">
                <span class="uh-brand__name">{{ $uh['brand']['name'] }}</span>
                <span class="uh-brand__tag">{{ $uh['brand']['tagline'] }}</span>
            </span>
        </a>

        <nav class="uh-nav" id="uh-nav" aria-label="Menu utama">
            <ul class="uh-nav__list">
                @foreach ($uh['nav'] as $item)
                    <li>
                        <a class="uh-nav__link @if ($item['key'] === $active) is-active @endif" href="{{ $url($item['key']) }}" @if ($item['key'] === $active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="uh-btn uh-btn--gold uh-nav__cta" href="{{ $wa($uh['requirements']['wa_register']) }}" target="_blank" rel="noopener noreferrer">
                <span>Daftar Sekarang</span>
                <svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
        </nav>

        <div class="uh-navbar__actions">
            <button type="button" class="uh-iconbtn uh-navbar__search" data-uh-search-open aria-label="Cari di situs">
                <svg class="uh-i" aria-hidden="true"><use href="#i-search"/></svg>
            </button>
            <a class="uh-btn uh-btn--gold uh-navbar__cta" href="{{ $wa($uh['requirements']['wa_register']) }}" target="_blank" rel="noopener noreferrer">
                <span>Daftar Sekarang</span>
                <svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
            <button type="button" class="uh-burger" data-uh-burger aria-controls="uh-nav" aria-expanded="false" aria-label="Buka menu">
                <svg class="uh-i uh-burger__open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="uh-i uh-burger__close" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>
</header>
