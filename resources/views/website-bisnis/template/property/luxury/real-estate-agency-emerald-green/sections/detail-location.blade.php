{{-- ===================== 6. LOKASI & PETA INTERAKTIF ===================== --}}
@php $t = $detailCfg['titles']['location']; @endphp
<section class="rea-panel" id="location" aria-labelledby="location-title">
    <header class="rea-panel__head">
        <div>
            <p class="rea-eyebrow rea-eyebrow--dark">FIND THE PROPERTY</p>
            <h2 id="location-title">{{ $t['title'] }}</h2>
            <p>{{ $t['text'] }}</p>
        </div>
    </header>

    <div class="rea-mapembed" style="--map-fallback: url('{{ $img($property['map_image']) }}')">
        <iframe src="{{ $property['embed_url'] }}" title="Interactive map of {{ $property['place_name'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
    </div>

    <div class="rea-locbar">
        <div class="rea-locbar__addr">
            <span class="rea-location__icon">{{ $icon('pin') }}</span>
            <div>
                <h3>{{ $property['place_name'] }}</h3>
                <address>{{ $property['address'] }}</address>
            </div>
        </div>
        <div class="rea-locbar__actions">
            <a class="rea-btn rea-btn--dark rea-btn--sm" href="{{ $property['directions_url'] }}" target="_blank" rel="noopener">{{ $icon('nav') }} Get Directions</a>
            <a class="rea-btn rea-btn--outline rea-btn--sm" href="{{ $property['maps_url'] }}" target="_blank" rel="noopener">Open in Google Maps {{ $icon('external') }}</a>
            <button class="rea-btn rea-btn--outline rea-btn--sm" type="button" data-copy="{{ $property['address'] }}" data-copy-done="Copied!">{{ $icon('file') }} <span>Copy address</span></button>
        </div>
    </div>
</section>
