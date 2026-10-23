{{-- ===================== LOCATION ===================== --}}
<section class="rea-section" id="location" aria-labelledby="location-title">
    <div class="rea-container rea-locsec">
        <div class="rea-locsec__info">
            <div class="rea-section-head">
                <p class="rea-eyebrow rea-eyebrow--dark">FIND US</p>
                <h2 id="location-title">Property Location</h2>
                <p>{{ $features[0]['text'] }}</p>
            </div>

            <div class="rea-location">
                <span class="rea-location__icon">{{ $icon('pin') }}</span>
                <div>
                    <h3>{{ $property['place_name'] }}</h3>
                    <address>{{ $property['address'] }}</address>
                    <a class="rea-location__link" href="{{ $property['maps_url'] }}" target="_blank" rel="noopener">{{ $icon('nav') }}View on Map</a>
                </div>
            </div>
        </div>

        <div class="rea-map">
            <img class="rea-map__img" src="{{ $img($property['map_image']) }}" alt="Map showing {{ $property['place_name'] }}, {{ $property['place_city'] }}" loading="lazy">
            <div class="rea-map__card">
                <img src="{{ $img('gallery-1.jpg') }}" alt="" loading="lazy">
                <p><strong>{{ $property['place_name'] }}</strong><span>{{ $property['place_city'] }}</span></p>
            </div>
            <svg class="rea-map__pin" aria-hidden="true" focusable="false"><use href="#i-pin-solid"></use></svg>
            <a class="rea-map__btn" href="{{ $property['maps_url'] }}" target="_blank" rel="noopener">Open in Google Maps {{ $icon('external') }}</a>
        </div>
    </div>
</section>
