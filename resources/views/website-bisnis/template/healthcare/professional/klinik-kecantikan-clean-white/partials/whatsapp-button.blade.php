{{-- Floating WhatsApp Button: pill putih dengan ikon hijau, cincin ripple biru lembut, label muncul saat hover/fokus --}}
@php
    $waText = rawurlencode('Halo ' . $clinic['brand']['name'] . ', saya ingin bertanya tentang perawatan dan jadwal konsultasi.');
@endphp
<a class="gl-wa" href="https://wa.me/{{ $clinic['contact']['whatsapp'] }}?text={{ $waText }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp {{ $clinic['brand']['name'] }}">
    <span class="gl-wa__label">Konsultasi via WhatsApp</span>
    <span class="gl-wa__icon">
        <span class="gl-wa__ring" aria-hidden="true"></span>
        <span class="gl-wa__ring gl-wa__ring--2" aria-hidden="true"></span>
        <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-whatsapp"/></svg>
        <svg class="gl-wa__petal" aria-hidden="true"><use href="#gl-i-lotus"/></svg>
    </span>
</a>
