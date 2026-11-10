<header class="uh-header" id="uh-header">
    <div class="uh-container uh-nav">
        <a class="uh-brand" href="{{ $r('home') }}" aria-label="{{ $d['brand']['name'] }} — Beranda">
            <img class="uh-brand__logo" src="{{ $img('logo.svg') }}" alt="" width="56" height="56">
            <span class="uh-brand__text">
                <strong>{{ $d['brand']['name'] }}</strong>
                <small>{{ $d['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="uh-menu" id="uh-menu" aria-label="Menu utama">
            <ul class="uh-menu__list">
                @foreach ($d['menu'] as [$key, $label])
                    <li><a href="{{ $r($key) }}" class="{{ $page === $key ? 'is-active' : '' }}" @if ($page === $key) aria-current="page" @endif>{{ $label }}</a></li>
                @endforeach
            </ul>
            <a class="uh-btn uh-btn--gold uh-menu__cta" href="{{ $wa($d['contact']['wa_daftar']) }}" target="_blank" rel="noopener">Daftar Sekarang <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="uh-nav__actions">
            <button type="button" class="uh-iconbtn" data-search-open aria-label="Cari halaman" aria-haspopup="dialog">
                <svg class="uh-ico" aria-hidden="true"><use href="#i-search"/></svg>
            </button>
            <a class="uh-btn uh-btn--gold uh-nav__cta" href="{{ $wa($d['contact']['wa_daftar']) }}" target="_blank" rel="noopener">Daftar Sekarang <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button type="button" class="uh-burger" data-menu-toggle aria-expanded="false" aria-controls="uh-menu" aria-label="Buka menu">
                <svg class="uh-ico uh-burger__open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="uh-ico uh-burger__close" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </div>
</header>
<div class="uh-scrim" data-menu-scrim hidden></div>
