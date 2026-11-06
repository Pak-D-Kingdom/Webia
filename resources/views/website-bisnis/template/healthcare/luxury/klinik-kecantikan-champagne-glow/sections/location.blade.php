{{-- Lokasi klinik (hanya preview di beranda). Isi config location.embed_url untuk peta live Google Maps. --}}
@php $loc = $c['location']; @endphp

<section id="location" class="cg-section cg-card cg-location" aria-labelledby="cg-location-title">
    <header class="cg-card__head">
        <h2 id="cg-location-title" class="cg-card__title">Lokasi Klinik</h2>
        <a class="cg-link cg-link--xs" href="{{ $loc['maps_url'] }}" target="_blank" rel="noopener">Lihat Semua</a>
    </header>
    <p class="cg-card__sub">Temukan lokasi kami yang mudah dijangkau.</p>

    <div class="cg-map">
        @if (! empty($loc['embed_url']))
            <iframe src="{{ $loc['embed_url'] }}" title="Peta lokasi {{ $loc['name'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
        @else
            <img src="{{ $img }}/map.svg" alt="Peta lokasi {{ $loc['name'] }}" width="640" height="300" loading="lazy" decoding="async">
        @endif
    </div>

    <div class="cg-map__info">
        <p class="cg-map__name"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> {{ $loc['name'] }}</p>
        <p class="cg-map__addr"><i class="bi bi-pin-map" aria-hidden="true"></i> {{ $loc['address'] }}</p>
    </div>

    <a class="cg-btn cg-btn--primary cg-btn--block cg-btn--sm" href="{{ $loc['maps_url'] }}" target="_blank" rel="noopener">
        Lihat di Google Maps <i class="bi bi-arrow-right" aria-hidden="true"></i>
    </a>
</section>
