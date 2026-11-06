{{-- Lokasi Klinik (preview beranda, anchor #lokasi). Tombol membuka modal peta. --}}
<div class="gl-panel gl-location" id="lokasi">
    <div class="gl-panel__intro">
        <span class="gl-panel__icon"><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-map-pin"/></svg></span>
        <h2 class="gl-panel__title">Lokasi Klinik</h2>
        <p class="gl-panel__text">Kunjungi klinik kami yang strategis dan mudah diakses dari berbagai lokasi.</p>
        <button type="button" class="gl-btn gl-btn--outline gl-btn--sm" data-gl-modal-open="map" aria-haspopup="dialog">
            Lihat Lokasi
            <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-arrow-right"/></svg>
        </button>
        <ul class="gl-location__info">
            <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-map-pin"/></svg><span>{{ $clinic['contact']['address'] }}</span></li>
            <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-clock"/></svg><span>{{ $clinic['contact']['hours'] }}</span></li>
        </ul>
    </div>

    <div class="gl-location__visual">
        <img src="{{ $img('clinic-building.jpg') }}" alt="Gedung klinik {{ $clinic['brand']['name'] }}" width="390" height="351" loading="lazy" decoding="async">
        <span class="gl-location__pin" aria-hidden="true"><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-map-pin"/></svg></span>
    </div>
</div>

@push('modals')
    <div class="gl-modal" id="gl-map-modal" data-gl-modal="map" role="dialog" aria-modal="true" aria-labelledby="gl-map-title" hidden>
        <div class="gl-modal__backdrop" data-gl-modal-close></div>
        <div class="gl-modal__dialog">
            <header class="gl-modal__head">
                <div>
                    <h2 id="gl-map-title">Lokasi {{ $clinic['brand']['name'] }}</h2>
                    <p>{{ $clinic['contact']['address'] }}</p>
                </div>
                <button type="button" class="gl-iconbtn" data-gl-modal-close aria-label="Tutup peta">
                    <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-x"/></svg>
                </button>
            </header>
            <div class="gl-modal__map">
                <iframe title="Peta lokasi {{ $clinic['brand']['name'] }}" data-src="{{ $clinic['contact']['maps_embed'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
            </div>
            <footer class="gl-modal__foot">
                <a class="gl-btn gl-btn--primary gl-btn--sm" href="{{ $clinic['contact']['maps_link'] }}" target="_blank" rel="noopener noreferrer">
                    Buka di Google Maps
                    <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-external"/></svg>
                </a>
            </footer>
        </div>
    </div>
@endpush
