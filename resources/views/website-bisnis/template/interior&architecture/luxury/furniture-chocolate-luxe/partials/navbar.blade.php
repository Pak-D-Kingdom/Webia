@php
    $f = $furniture;
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<nav class="lf-nav" aria-label="Navigasi utama">
    <div class="lf-container lf-nav__inner">
        <a class="lf-brand" href="{{ $r('home') }}" aria-label="{{ $f['brand']['name'] }} - Beranda">
            <svg class="lf-brand__mark" aria-hidden="true"><use href="#i-logo"/></svg>
            <span class="lf-brand__text">
                <strong>{{ $f['brand']['name'] }}</strong>
                <small>{{ $f['brand']['tagline'] }}</small>
            </span>
        </a>

        <button class="lf-nav__toggle" type="button" aria-expanded="false" aria-controls="lf-menu" data-nav-toggle>
            <svg class="ic" data-icon-open><use href="#i-menu"/></svg>
            <svg class="ic" data-icon-close hidden><use href="#i-close"/></svg>
            <span class="lf-sr">Menu</span>
        </button>

        <ul class="lf-nav__menu" id="lf-menu" data-nav-menu>
            @foreach ($f['nav'] as $item)
                <li>
                    <a href="{{ $r($item['key']) }}" @class(['is-active' => $activePage === $item['key']]) @if ($activePage === $item['key']) aria-current="page" @endif>{{ $item['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
