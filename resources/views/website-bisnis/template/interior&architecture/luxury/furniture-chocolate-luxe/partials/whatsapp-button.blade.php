@php
    $f = $furniture;
    $wa = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode('Halo ' . $f['brand']['name'] . ', saya ingin bertanya tentang furniture.');
@endphp
<a class="lf-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $f['brand']['name'] }}">
    <span class="lf-wa__icon" aria-hidden="true">
        <svg class="ic"><use href="#i-whatsapp"/></svg>
    </span>
    <span class="lf-wa__text">
        <strong>Chat WhatsApp</strong>
        <small><i aria-hidden="true"></i> Online &middot; balas cepat</small>
    </span>
</a>
