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
            <div class="fh-menu__foot">
                <button class="fh-menu__search" type="button" data-fh-search-toggle>{{ $icon('search') }}<span>Cari di situs ini</span></button>
                <a class="fh-btn fh-btn--dark fh-menu__donate" href="{{ $url('donasi') }}">
                    <span class="fh-btn__heart">{{ $icon('heart', 'fh-ic fh-ic--gold') }}</span>Donasi Sekarang {{ $icon('arrow') }}
                </a>
            </div>
        </nav>

        <div class="fh-nav__actions">
            <button class="fh-iconbtn fh-iconbtn--search" type="button" data-fh-search-toggle aria-haspopup="dialog" aria-controls="fh-search" aria-label="Cari di situs (Ctrl+K)" title="Cari (Ctrl+K)">{{ $icon('search') }}</button>
            <a class="fh-btn fh-btn--dark fh-nav__donate" href="{{ $url('donasi') }}">
                <span class="fh-btn__heart">{{ $icon('heart', 'fh-ic fh-ic--gold') }}</span><span class="fh-btn__label">Donasi<span class="fh-btn__more"> Sekarang</span></span>{{ $icon('arrow') }}
            </a>
            <button class="fh-burger" type="button" data-fh-menu-toggle aria-expanded="false" aria-controls="fh-menu" aria-label="Buka menu">
                <span class="fh-burger__open">{{ $icon('menu') }}</span><span class="fh-burger__close">{{ $icon('close') }}</span>
            </button>
        </div>
    </div>
    <span class="fh-progress" aria-hidden="true"><i data-fh-progress></i></span>
</header>
