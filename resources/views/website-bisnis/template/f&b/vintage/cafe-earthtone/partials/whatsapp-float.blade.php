@php
    $w = $cafe['whatsapp'];
    $waUrl = 'https://wa.me/' . $cafe['contact']['wa_number'] . '?text=' . rawurlencode($w['message']);
@endphp
<a class="kl-wafloat" href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="{{ $w['cta'] }}">
    <span class="kl-wafloat__label" aria-hidden="true">{{ $w['cta'] }}</span>
    <span class="kl-wafloat__btn">
        <svg class="kl-icon kl-icon--fill" aria-hidden="true"><use href="#kl-i-whatsapp-solid"/></svg>
    </span>
</a>
