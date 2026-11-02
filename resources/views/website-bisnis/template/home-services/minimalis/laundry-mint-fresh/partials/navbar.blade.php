<header class="lw-nav" data-lw-nav>
    <div class="lw-container lw-nav__in">
        <a class="lw-brand" href="{{ $r('home') }}" aria-label="{{ $c['brand']['name'] }} — beranda">
            <img src="{{ $img($c['img']['logo']) }}" alt="" width="46" height="46">
            <span class="lw-brand__txt">
                <span class="lw-brand__name">{{ $c['brand']['name'] }}</span>
                <span class="lw-brand__tag">{{ $c['brand']['tagline'] }}</span>
            </span>
        </a>

        <button class="lw-nav__toggle" type="button" aria-expanded="false" aria-controls="lw-menu" data-lw-menu-toggle>
            <svg class="lw-i lw-i--open"><use href="#i-menu"/></svg>
            <svg class="lw-i lw-i--close"><use href="#i-close"/></svg>
            <span class="lw-sr">Menu</span>
        </button>

        <nav class="lw-nav__menu" id="lw-menu" aria-label="Navigasi utama">
            <ul class="lw-nav__list">
                @foreach ($c['nav'] as $item)
                    <li>
                        <a href="{{ $r($item['route']) }}" @if (request()->routeIs($c['route'] . $item['route'])) class="is-active" aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
                <li class="lw-nav__more" data-lw-more>
                    <button type="button" aria-expanded="false" aria-haspopup="true">
                        More <svg class="lw-i"><use href="#i-chevron"/></svg>
                    </button>
                    <ul class="lw-nav__sub">
                        @foreach ($c['nav_more'] as $item)
                            <li><a href="{{ $r($item['route']) }}" @if (request()->routeIs($c['route'] . $item['route'])) class="is-active" aria-current="page" @endif>{{ $item['label'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <a class="lw-btn lw-nav__cta" href="{{ $r('inquiry') }}">
                <svg class="lw-i"><use href="#i-basket"/></svg> Order Now
            </a>
        </nav>
    </div>
</header>
