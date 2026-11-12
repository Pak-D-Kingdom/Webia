<header class="abd-header" id="abd-header">
    <div class="abd-container abd-header__in">
        <a class="abd-brand" href="{{ $u() }}" aria-label="{{ $site['brand']['name'] }} — beranda">
            <svg class="abd-brand__mark" viewBox="0 0 48 48" aria-hidden="true"><use href="#i-logo"/></svg>
            <span class="abd-brand__txt"><strong>{{ $site['brand']['name'] }}</strong><small>{{ $site['brand']['tagline'] }}</small></span>
        </a>

        <nav class="abd-nav" aria-label="Navigasi utama">
            <ul>
                @foreach ($site['nav'] as $n)
                    <li>
                        <a href="{{ $n['path'] === '#kontak' ? '#kontak' : $u($n['path']) }}"
                           class="abd-nav__link {{ $active === $n['key'] ? 'is-active' : '' }}"
                           @if ($active === $n['key']) aria-current="page" @endif>{{ $n['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="abd-header__act">
            <button type="button" class="abd-iconbtn" data-search-toggle aria-label="Cari di situs" aria-expanded="false" aria-controls="abd-search">
                <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
            </button>
            <a class="abd-btn abd-btn--primary abd-btn--sm abd-header__cta" href="{{ $u('/konsultasi') }}">
                <span>Konsultasi Sekarang</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
            <button type="button" class="abd-burger" data-menu-toggle aria-label="Buka menu" aria-expanded="false" aria-controls="abd-drawer">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <div class="abd-search" id="abd-search" hidden>
        <div class="abd-container">
            <form class="abd-search__form" role="search" onsubmit="return false">
                <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
                <input type="search" id="abd-search-input" placeholder="Cari portofolio, layanan, proyek…" autocomplete="off" aria-label="Cari di situs">
                <button type="button" class="abd-iconbtn" data-search-toggle aria-label="Tutup pencarian"><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
            </form>
            <ul class="abd-search__list" id="abd-search-list" aria-live="polite"></ul>
        </div>
    </div>
</header>

<div class="abd-drawer" id="abd-drawer" hidden>
    <div class="abd-drawer__bg" data-menu-toggle></div>
    <aside class="abd-drawer__panel" aria-label="Menu">
        <div class="abd-drawer__head">
            <span class="abd-brand__txt"><strong>{{ $site['brand']['name'] }}</strong><small>{{ $site['brand']['tagline'] }}</small></span>
            <button type="button" class="abd-iconbtn" data-menu-toggle aria-label="Tutup menu"><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
        </div>
        <ul class="abd-drawer__nav">
            @foreach ($site['nav'] as $n)
                <li><a href="{{ $n['path'] === '#kontak' ? '#kontak' : $u($n['path']) }}" class="{{ $active === $n['key'] ? 'is-active' : '' }}" data-menu-link>{{ $n['label'] }}</a></li>
            @endforeach
        </ul>
        <a class="abd-btn abd-btn--gold abd-btn--block" href="{{ $u('/konsultasi') }}"><span>Konsultasi Sekarang</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        <p class="abd-drawer__meta">{{ $site['contact']['phone'] }}<br>{{ $site['contact']['email'] }}</p>
    </aside>
</div>
