{{-- ---------- SPECIFICATION + LOCATION ---------- --}}
<section class="rea-details" id="specification" aria-labelledby="details-title">
    <header class="rea-section-head">
        <h2 id="details-title">Property Details</h2>
        <p>Modern design, premium location, and complete facilities.</p>
    </header>

    <div class="rea-details__grid">
        <div class="rea-details__specs">
            <dl class="rea-specs">
                @foreach ($property['specs'] as $spec)
                    <div class="rea-specs__row">
                        <dt>{{ $icon($spec['icon']) }}<span>{{ $spec['label'] }}</span></dt>
                        <dd>{{ $spec['value'] }}</dd>
                    </div>
                @endforeach
            </dl>

            <div class="rea-location" id="location">
                <span class="rea-location__icon">{{ $icon('pin') }}</span>
                <div>
                    <h3>Location</h3>
                    <address>{{ $property['address'] }}</address>
                    <a class="rea-location__link" href="{{ $property['maps_url'] }}" target="_blank" rel="noopener">{{ $icon('nav') }}View on Map</a>
                </div>
            </div>
        </div>

        <div class="rea-map">
            <img class="rea-map__img" src="{{ $img('map-bali.jpg') }}" alt="Map showing {{ $property['place_name'] }}, {{ $property['place_city'] }}" loading="lazy">
            <div class="rea-map__card">
                <img src="{{ $img('gallery-1.jpg') }}" alt="" loading="lazy">
                <p><strong>{{ $property['place_name'] }}</strong><span>{{ $property['place_city'] }}</span></p>
            </div>
            <svg class="rea-map__pin" aria-hidden="true" focusable="false"><use href="#i-pin-solid"></use></svg>
            <a class="rea-map__btn" href="{{ $property['maps_url'] }}" target="_blank" rel="noopener">Open in Google Maps {{ $icon('external') }}</a>
        </div>
    </div>
</section>
