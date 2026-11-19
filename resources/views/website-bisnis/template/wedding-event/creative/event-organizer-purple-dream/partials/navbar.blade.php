<header class="eo-nav" data-eo-nav>
    <div class="eo-container eo-nav__inner">
        <a class="eo-brand" href="{{ url($eo['base']) }}" aria-label="{{ $eo['brand']['name'] }} - Beranda">
            <img class="eo-brand__mark" src="{{ asset($eo['assets']['img']) }}/logo-mark.svg" alt="" width="42" height="42">
            <span class="eo-brand__text"><strong>{{ $eo['brand']['name'] }}</strong><small>{{ $eo['brand']['tagline'] }}</small></span>
        </a>

        <nav class="eo-nav__menu" id="eo-menu" aria-label="Navigasi utama">
            <ul class="eo-nav__list">
                @foreach($eo['nav'] as $item)
                <li class="eo-nav__item">
                    <a class="eo-nav__link @if($page === $item['key'] || ($page === 'home' && $item['key'] === 'layanan')) is-active @endif" href="{{ url($eo['base'].$item['path']) }}">{{ $item['label'] }}</a>
                </li>
                @endforeach
            </ul>
            <a class="eo-btn eo-btn--nav eo-nav__cta-mobile" href="{{ url($eo['base'].'/penawaran') }}">Konsultasi Event <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="eo-nav__actions">
            <button class="eo-icon-btn" type="button" data-eo-search-open aria-label="Cari di situs"><svg class="eo-i" aria-hidden="true"><use href="#i-search"/></svg></button>
            <a class="eo-btn eo-btn--nav eo-nav__cta" href="{{ url($eo['base'].'/penawaran') }}">Konsultasi Event <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button class="eo-nav__toggle" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="eo-menu"><span></span><span></span><span></span></button>
        </div>
    </div>
    <span class="eo-nav__progress" data-eo-progress aria-hidden="true"></span>
</header>
