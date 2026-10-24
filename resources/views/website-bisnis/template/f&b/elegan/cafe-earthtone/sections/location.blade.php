@php($l = $cafe['location'])
<article class="lm-card lm-loc" id="lokasi">
    <div class="lm-loc__head">
        <div>
            <p class="lm-eyebrow">{{ $l['eyebrow'] }}</p>
            <h2 class="lm-card__title lm-loc__title">{{ $l['title'] }}</h2>
            <address>{{ $cafe['contact']['address_full'] }}</address>
        </div>
        <a class="lm-btn lm-btn--line lm-btn--sm" href="{{ $cafe['contact']['maps_url'] }}" target="_blank" rel="noopener">
            {{ $l['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
        </a>
    </div>

    {{-- Peta dikunci sampai diklik supaya tidak mengganggu scroll halaman (terutama di HP) --}}
    <div class="lm-map" data-map>
        <iframe src="{{ $l['embed_url'] }}" title="Peta lokasi {{ $cafe['brand']['title'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
        <button class="lm-map__lock" type="button"><span>Ketuk untuk menggeser &amp; memperbesar peta</span></button>
    </div>
</article>
