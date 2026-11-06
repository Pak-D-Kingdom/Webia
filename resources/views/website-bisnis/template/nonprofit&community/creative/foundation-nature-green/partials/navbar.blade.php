<header class="fh-header" data-fh-header>
    <div class="fh-wrap fh-nav">
        <a class="fh-logo" href="{{ $url('') }}" aria-label="{{ $cfg['brand']['name'] }} {{ $cfg['brand']['suffix'] }} — beranda">
            <img src="{{ $img('logo-leaf.png') }}" alt="" width="46" height="37">
            <span class="fh-logo__text"><strong>{{ $cfg['brand']['name'] }}</strong><small>{{ $cfg['brand']['suffix'] }}</small></span>
        </a>

        <nav class="fh-menu" id="fh-menu" aria-label="Navigasi utama">
            <ul>
                @foreach ($cfg['nav'] as $item)
                    <li>
                        <a href="{{ $url($item['slug']) }}" class="{{ $page === $item['key'] ? 'is-active' : '' }}"{!! $page === $item['key'] ? ' aria-current="page"' : '' !!}>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="fh-btn fh-btn--dark fh-menu__donate" href="{{ $url('donasi') }}">
                <span class="fh-btn__heart">{{ $icon('heart', 'fh-ic fh-ic--gold') }}</span>Donasi Sekarang {{ $icon('arrow') }}
            </a>
        </nav>

        <div class="fh-nav__actions">
            <button class="fh-iconbtn" type="button" data-fh-search-toggle aria-expanded="false" aria-controls="fh-search" aria-label="Cari halaman">{{ $icon('search') }}</button>
            <a class="fh-btn fh-btn--dark fh-nav__donate" href="{{ $url('donasi') }}">
                <span class="fh-btn__heart">{{ $icon('heart', 'fh-ic fh-ic--gold') }}</span>Donasi Sekarang {{ $icon('arrow') }}
            </a>
            <button class="fh-burger" type="button" data-fh-menu-toggle aria-expanded="false" aria-controls="fh-menu" aria-label="Buka menu">
                <span class="fh-burger__open">{{ $icon('menu') }}</span><span class="fh-burger__close">{{ $icon('close') }}</span>
            </button>
        </div>
    </div>

    <div class="fh-search" id="fh-search" hidden>
        <div class="fh-wrap">
            <label class="fh-sr" for="fh-search-input">Cari halaman</label>
            <div class="fh-search__box">
                {{ $icon('search') }}
                <input id="fh-search-input" type="search" placeholder="Cari halaman, mis. donasi, relawan, program" autocomplete="off" data-fh-search-input>
            </div>
            <ul class="fh-search__list" data-fh-search-list>
                @foreach ($cfg['search_index'] as $s)
                    <li data-text="{{ \Illuminate\Support\Str::lower($s['label'].' '.$s['hint']) }}"><a href="{{ $url($s['slug']) }}">{{ $s['label'] }}{{ $icon('arrow') }}</a></li>
                @endforeach
            </ul>
            <p class="fh-search__empty" data-fh-search-empty hidden>Halaman tidak ditemukan. Coba kata kunci lain.</p>
        </div>
    </div>
</header>
