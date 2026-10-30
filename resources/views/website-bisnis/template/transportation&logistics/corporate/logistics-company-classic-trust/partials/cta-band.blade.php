{{-- Pita ajakan. Parameter: $ctaTitle, $ctaText --}}
<section class="cta-band">
    <div class="container cta-band__in">
        <div class="cta-band__copy">
            <h2>{{ $ctaTitle }}</h2>
            <p>{{ $ctaText }}</p>
        </div>
        <div class="cta-band__act">
            <a class="btn btn--orange btn--lg" href="{{ $route('penawaran') }}">Minta Penawaran
                <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
            <a class="btn btn--white btn--lg" href="https://wa.me/{{ $c['contact']['whatsapp'] }}?text={{ rawurlencode($c['contact']['whatsapp_text']) }}" target="_blank" rel="noopener">
                <svg class="ic ic--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg>WhatsApp
            </a>
        </div>
    </div>
</section>
