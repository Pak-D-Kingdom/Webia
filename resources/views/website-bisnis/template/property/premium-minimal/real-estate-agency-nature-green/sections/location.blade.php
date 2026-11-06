@php
    $loc = $loc ?? [
        'address' => $t['contact']['address'],
        'embed'   => $t['contact']['maps_embed'],
        'url'     => $t['contact']['maps_url'],
    ];
@endphp
<section class="panel" id="location" aria-labelledby="h-location">
    <header class="panel__head">
        <div>
            <h2 id="h-location" class="panel__title">Lokasi</h2>
            <p class="panel__sub">Lokasi strategis dengan akses mudah</p>
        </div>
    </header>

    <div class="map">
        {{-- Ilustrasi sebagai latar sementara peta termuat --}}
        <svg viewBox="0 0 320 160" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><rect width="320" height="160" fill="#eef0e6"/><path d="M0 118c40-18 70 8 120-6s70-30 120-18 56 10 80 4V160H0Z" fill="#dfe8d3"/><path d="M0 68C60 60 90 82 150 74S260 60 320 80" stroke="#cfe2ea" stroke-width="9" fill="none"/></svg>
        <iframe src="{{ $loc['embed'] }}" title="Peta lokasi {{ $loc['address'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
    </div>

    <p class="loc__addr"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $loc['address'] }}</p>
    <a class="link-all link-all--foot" href="{{ $loc['url'] }}" target="_blank" rel="noopener">Lihat di Google Maps <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</section>
