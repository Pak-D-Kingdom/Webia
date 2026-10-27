@php
    $l    = $cafe['location'];
    $c    = $cafe['contact'];
    $dirs = 'https://www.google.com/maps/dir/?api=1&destination=' . urlencode($c['address']);
@endphp
<article class="kl-panel kl-location" id="lokasi" aria-labelledby="kl-loc-title">
    <div class="kl-location__inner">
        <div class="kl-location__info">
            <h2 class="kl-panel__title kl-panel__title--icon" id="kl-loc-title">
                <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-pin"/></svg>
                <span>{{ $l['title'] }}</span>
            </h2>

            <address class="kl-location__addr">{{ $c['address'] }}</address>

            <ul class="kl-location__meta">
                <li><svg class="kl-icon" aria-hidden="true"><use href="#kl-i-phone"/></svg><a href="tel:+{{ preg_replace('/\D/', '', $c['phone']) }}">{{ $c['phone'] }}</a></li>
                <li><svg class="kl-icon" aria-hidden="true"><use href="#kl-i-clock"/></svg><span>{{ $cafe['topbar']['hours'] }}</span></li>
            </ul>

            <div class="kl-location__actions">
                <a class="kl-btn kl-btn--red kl-btn--sm" href="{{ $c['maps_url'] }}" target="_blank" rel="noopener">
                    <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-pin"/></svg>
                    <span>{{ $l['cta'] }}</span>
                </a>
                <a class="kl-btn kl-btn--outline kl-btn--sm" href="{{ $dirs }}" target="_blank" rel="noopener">{{ $l['cta_directions'] }}</a>
            </div>

            <img class="kl-panel__art kl-panel__art--lamp" src="{{ $img('lamp.png') }}" alt="" aria-hidden="true" width="90" height="321" loading="lazy">
        </div>

        <div class="kl-location__map">
            @if (! empty($l['embed']))
                <iframe src="{{ $l['embed'] }}" title="{{ $l['map_alt'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
            @else
                <a href="{{ $c['maps_url'] }}" target="_blank" rel="noopener" aria-label="{{ $l['cta'] }}">
                    <img src="{{ $img($l['map_image']) }}" alt="{{ $l['map_alt'] }}" width="408" height="135" loading="lazy">
                </a>
            @endif
        </div>
    </div>
</article>
