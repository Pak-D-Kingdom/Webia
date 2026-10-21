<section class="panel" id="location" aria-labelledby="h-location">
    <header class="panel__head">
        <div>
            <h2 id="h-location" class="panel__title">Lokasi</h2>
            <p class="panel__sub">Lokasi strategis dengan akses mudah</p>
        </div>
    </header>

    <a class="map" href="{{ $t['contact']['maps_url'] }}" target="_blank" rel="noopener" aria-label="Buka peta lokasi di Google Maps">
        <svg viewBox="0 0 320 160" preserveAspectRatio="xMidYMid slice" role="img" aria-label="Ilustrasi peta lokasi">
            <rect width="320" height="160" fill="#eef0e6"/>
            <path d="M0 118c40-18 70 8 120-6s70-30 120-18 56 10 80 4V160H0Z" fill="#dfe8d3"/>
            <path d="M232 20c20 6 40-2 88 6V0H232Z" fill="#dfe8d3"/>
            <path d="M0 40h320M0 100h320M70 0v160M170 0v160" stroke="#fff" stroke-width="3" fill="none"/>
            <path d="M0 68C60 60 90 82 150 74S260 60 320 80" stroke="#cfe2ea" stroke-width="9" fill="none"/>
            <path d="M214 0c10 30-4 52 14 80s26 52 22 80" fill="none" stroke="#f1b36a" stroke-width="4"/>
            <ellipse cx="128" cy="80" rx="10" ry="3" fill="#1b392b" opacity=".25"/>
            <g class="map__pin" transform="translate(112 34)"><path d="M16 0C7 0 0 7 0 16c0 12 16 28 16 28s16-16 16-28C32 7 25 0 16 0Z" fill="#245640"/><circle cx="16" cy="16" r="6" fill="#fff"/></g>
        </svg>
    </a>

    <p class="loc__addr"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $t['contact']['address'] }}</p>
    <a class="link-all link-all--foot" href="{{ $t['contact']['maps_url'] }}" target="_blank" rel="noopener">Lihat di Google Maps <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</section>
