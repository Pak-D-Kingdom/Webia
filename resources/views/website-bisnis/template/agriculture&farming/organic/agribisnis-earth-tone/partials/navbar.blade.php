<div class="navbar" id="navbar">
    <div class="navbar__inner">
        <a class="brand" href="{{ $u['home'] }}" aria-label="{{ $data['brand']['name'] }} - Beranda">
            <img class="brand__leaf" src="{{ $img }}/logo-leaf.png" alt="" width="44" height="44">
            <span class="brand__text">
                <strong>{{ $data['brand']['name'] }}</strong>
                <small>{{ $data['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="nav" id="navMenu" aria-label="Navigasi utama">
            <ul class="nav__list">
                @foreach ($data['menu'] as $item)
                    @php
                        $href = $u[$item['key']];
                        $active = $item['key'] === $page;
                    @endphp
                    @if (array_key_exists('children', $item))
                        @php $active = in_array($page, $item['children'], true); @endphp
                        <li class="nav__item nav__item--dd" data-dd>
                            <div class="nav__split">
                                <a href="{{ $href }}" class="nav__link {{ $active ? 'is-active' : '' }}" @if($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                                <button type="button" class="nav__caret" aria-label="Buka submenu {{ $item['label'] }}" aria-haspopup="true" aria-expanded="false" data-dd-toggle><svg class="ico"><use href="#i-chev-down"></use></svg></button>
                            </div>
                            <div class="dd dd--menu" role="menu" hidden>
                                @foreach ($item['children'] as $ck)
                                    <a class="dd__item {{ $ck === $page ? 'is-current' : '' }}" role="menuitem" href="{{ $u[$ck] }}">
                                        <span class="dd__icon"><svg class="ico"><use href="#i-{{ $data['pages'][$ck]['icon'] }}"></use></svg></span>
                                        <span class="dd__txt"><strong>{{ $data['pages'][$ck]['title'] }}</strong><small>{{ $data['pages'][$ck]['desc'] }}</small></span>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav__item"><a href="{{ $href }}" class="nav__link {{ $active ? 'is-active' : '' }}" @if($active) aria-current="page" @endif>{{ $item['label'] }}</a></li>
                    @endif
                @endforeach
            </ul>
            <a class="btn btn--primary nav__cta-mobile" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener">Hubungi Kami <svg class="ico"><use href="#i-arrow"></use></svg></a>
        </nav>

        <div class="navbar__actions">
            <button class="icon-btn" type="button" id="searchToggle" aria-label="Cari komoditas atau halaman" aria-haspopup="dialog" aria-controls="searchOverlay">
                <svg class="ico"><use href="#i-search"></use></svg>
            </button>
            <a class="btn btn--primary navbar__cta" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener">Hubungi Kami <svg class="ico"><use href="#i-arrow"></use></svg></a>
            <button class="icon-btn navbar__burger" type="button" id="navToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="navMenu">
                <svg class="ico ico--open"><use href="#i-menu"></use></svg>
                <svg class="ico ico--close"><use href="#i-close"></use></svg>
            </button>
        </div>
    </div>
</div>
