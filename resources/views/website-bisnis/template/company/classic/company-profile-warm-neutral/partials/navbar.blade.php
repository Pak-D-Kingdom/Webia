{{-- NAVBAR: logo, menu utama, pencarian, tombol Minta Penawaran --}}
<header class="cp-navbar" data-cp-navbar>
    <div class="cp-container cp-navbar__inner">
        <a class="cp-brand" href="{{ $page('beranda') }}" aria-label="{{ $company['name'] }} — ke beranda">
            <img class="cp-brand__mark" src="{{ $img('logo-leaf.png') }}" alt="" width="200" height="168">
            <span class="cp-brand__text">
                <span class="cp-brand__name">NUSANTARA KREASI</span>
                <span class="cp-brand__tag">{{ $company['tagline'] }}</span>
            </span>
        </a>

        <nav class="cp-nav" id="cp-nav" aria-label="Navigasi utama" data-cp-nav>
            <ul class="cp-nav__list">
                @foreach ($nav as $item)
                    <li>
                        <a class="cp-nav__link{{ $item['current'] ? ' is-active' : '' }}"
                           href="{{ $item['href'] }}"
                           @if ($item['current']) aria-current="page" @endif
                           @if (str_starts_with($item['href'], '#')) data-cp-spy @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="cp-btn cp-btn--primary cp-nav__cta" href="{{ $link('penawaran') }}" data-cp-focus-quote>Minta Penawaran {!! $icon('arrow') !!}</a>
        </nav>

        <div class="cp-navbar__actions">
            <button class="cp-iconbtn" type="button" data-cp-search-toggle aria-expanded="false" aria-controls="cp-search" aria-label="Cari di situs">
                {!! $icon('search') !!}
            </button>
            <a class="cp-btn cp-btn--primary cp-navbar__cta" href="{{ $link('penawaran') }}" data-cp-focus-quote>Minta Penawaran {!! $icon('arrow') !!}</a>
            <button class="cp-iconbtn cp-burger" type="button" data-cp-nav-toggle aria-expanded="false" aria-controls="cp-nav" aria-label="Buka menu">
                {!! $icon('menu', 'cp-burger__open') !!}{!! $icon('close', 'cp-burger__close') !!}
            </button>
        </div>

        <div class="cp-search" id="cp-search" data-cp-search-panel hidden>
            <form class="cp-search__form" role="search" data-cp-search-form>
                <label class="cp-sr" for="cp-search-input">Cari di situs</label>
                <input class="cp-search__input" id="cp-search-input" type="search" placeholder="Cari layanan, portofolio, proyek..." autocomplete="off" data-cp-search-input>
            </form>
            <ul class="cp-search__results" data-cp-search-results></ul>
            <p class="cp-search__empty" role="status" data-cp-search-empty hidden></p>
        </div>
    </div>
</header>
