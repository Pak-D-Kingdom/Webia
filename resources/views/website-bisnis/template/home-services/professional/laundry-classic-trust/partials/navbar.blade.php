<header class="nb" data-nav>
    <div class="lw-wrap nb__in">
        <a class="nb__brand" href="{{ $url('home') }}" aria-label="{{ $c['brand']['name'] }} - Beranda">
            <img src="{{ $img($c['brand']['logo']) }}" alt="" width="46" height="46">
            <span><strong>{{ $c['brand']['name'] }}</strong><small>{{ $c['brand']['tagline'] }}</small></span>
        </a>

        <nav class="nb__menu" id="menu" aria-label="Navigasi utama">
            <ul>
                @foreach ($c['nav'] as $n)
                    @php
                        $has = ! empty($n['children']);
                        $on  = $page === $n['key'] || ($has && collect($n['children'])->contains('key', $page));
                    @endphp
                    <li class="{{ $has ? 'has-sub' : '' }}">
                        <a href="{{ $url($n['key']) }}" class="{{ $on ? 'is-active' : '' }}" @if ($on) aria-current="page" @endif>{{ $n['label'] }}</a>
                        @if ($has)
                            <button type="button" class="sub-btn" aria-expanded="false" aria-label="Buka submenu {{ $n['label'] }}"><svg class="ic"><use href="#i-chev"/></svg></button>
                            <ul class="sub">
                                @foreach ($n['children'] as $ch)
                                    <li><a href="{{ $url($ch['key']) }}" class="{{ $page === $ch['key'] ? 'is-active' : '' }}">{{ $ch['label'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a class="btn btn--navy nb__cta nb__cta--m" href="{{ $url('contact') }}">Order Now <svg class="ic"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="nb__tools">
            <button type="button" class="nb__icon" data-search-open aria-label="Cari harga"><svg class="ic"><use href="#i-search"/></svg></button>
            <a class="btn btn--navy nb__cta" href="{{ $url('contact') }}">Order Now <svg class="ic"><use href="#i-arrow"/></svg></a>
            <button type="button" class="nb__icon nb__burger" data-nav-toggle aria-expanded="false" aria-controls="menu" aria-label="Buka menu"><svg class="ic"><use href="#i-menu"/></svg></button>
        </div>
    </div>

    <div class="srch" data-search hidden>
        <form class="lw-wrap srch__in" action="{{ $url('prices') }}" method="get" role="search">
            <svg class="ic"><use href="#i-search"/></svg>
            <input type="search" name="q" placeholder="Cari harga, mis. kemeja, jaket, selimut..." aria-label="Cari harga" autocomplete="off">
            <button class="btn btn--navy btn--sm" type="submit">Cari</button>
            <button class="nb__icon" type="button" data-search-close aria-label="Tutup pencarian"><svg class="ic"><use href="#i-close"/></svg></button>
        </form>
    </div>
</header>
