@php $b = $z['brand']; $cta = $z['nav_cta']; @endphp
<header class="ot-nav" data-nav>
    <div class="ot-container ot-nav__inner">
        <a class="ot-brand" href="{{ $url('home') }}" aria-label="{{ $b['name'] }} - Beranda">
            <img src="{{ $img($b['logo']) }}" alt="" width="40" height="40">
            <span class="ot-brand__text"><strong>{{ strtoupper($b['name']) }}</strong><small>{{ $b['tagline'] }}</small></span>
        </a>

        <nav class="ot-nav__menu" id="ot-menu" aria-label="Menu utama" data-menu>
            <ul>
                @foreach ($z['nav'] as $n)
                    <li>
                        <a href="{{ $url($n['route'], $n['anchor']) }}"
                           @if ($n['anchor']) data-spy="{{ $n['anchor'] }}" @endif
                           @if (($active ?? 'home') === $n['key']) aria-current="page" @endif>{{ $n['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="ot-btn ot-btn--primary ot-nav__cta-mobile" href="{{ $url($cta['route'], $cta['anchor']) }}">
                {{ $cta['label'] }}<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
        </nav>

        <div class="ot-nav__actions">
            <button class="ot-icon-btn" type="button" data-open="chat" aria-label="Cari bantuan dengan AI FAQ">
                <svg class="ot-ic" aria-hidden="true"><use href="#i-search"/></svg>
            </button>
            <a class="ot-btn ot-btn--primary ot-nav__cta" href="{{ $url($cta['route'], $cta['anchor']) }}">
                {{ $cta['label'] }}<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
            <button class="ot-icon-btn ot-nav__toggle" type="button" aria-controls="ot-menu" aria-expanded="false" aria-label="Buka menu" data-menu-toggle>
                <svg class="ot-ic ot-ic--open" aria-hidden="true"><use href="#i-menu"/></svg>
                <svg class="ot-ic ot-ic--close" aria-hidden="true"><use href="#i-close"/></svg>
            </button>
        </div>
    </div>
</header>
