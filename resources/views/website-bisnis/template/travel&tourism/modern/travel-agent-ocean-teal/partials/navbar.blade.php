@php $navActive = $active === 'itinerary' ? 'paket-tour' : $active; @endphp
<header class="ta-header" data-ta-header>
    <div class="ta-container ta-nav">
        <a class="ta-logo" href="{{ $routes['index'] }}" aria-label="{{ $ta['brand']['name'] }} – Beranda">
            @include($ns . '.partials.logo')
        </a>

        <nav class="ta-menu" id="ta-menu" aria-label="Menu utama" data-ta-menu>
            <ul class="ta-menu__list">
                @foreach ($ta['nav'] as $key => $label)
                    <li>
                        <a href="{{ $routes[$key] }}" @class(['ta-menu__link', 'is-active' => $navActive === $key]) @if ($navActive === $key) aria-current="page" @endif>{{ $label }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="ta-btn ta-btn--primary ta-menu__cta" href="{{ $routes['inquiry'] }}">Pesan Sekarang</a>
        </nav>

        <div class="ta-nav__actions">
            <a class="ta-iconbtn" href="{{ $routes['paket-tour'] }}#cari" aria-label="Cari paket tour">{{ $icon('search') }}</a>
            <a class="ta-btn ta-btn--primary ta-hide-lg" href="{{ $routes['inquiry'] }}">Pesan Sekarang</a>
            <button class="ta-burger" type="button" aria-expanded="false" aria-controls="ta-menu" aria-label="Buka menu" data-ta-burger>
                {{ $icon('menu', 'ta-burger__open') }}{{ $icon('close', 'ta-burger__close') }}
            </button>
        </div>
    </div>
</header>
<div class="ta-scrim" data-ta-scrim hidden></div>
