@php($l = $cafe['location'])
<article class="lm-card lm-loc" id="lokasi">
    <p class="lm-eyebrow">{{ $l['eyebrow'] }}</p>
    <h2 class="lm-card__title">{{ $l['title'] }}</h2>
    <address>{{ $cafe['contact']['address_full'] }}</address>

    <a class="lm-map" href="{{ $cafe['contact']['maps_url'] }}" target="_blank" rel="noopener" aria-label="{{ $l['cta'] }}">
        <img src="{{ $img($l['map_image']) }}" alt="Peta lokasi {{ $cafe['brand']['title'] }}" loading="lazy">
    </a>

    <a class="lm-btn lm-btn--line lm-btn--xs" href="{{ $cafe['contact']['maps_url'] }}" target="_blank" rel="noopener">
        {{ $l['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
    </a>
</article>
