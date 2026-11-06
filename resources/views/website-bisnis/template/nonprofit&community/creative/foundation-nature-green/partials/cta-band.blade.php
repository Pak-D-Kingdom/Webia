{{-- Pita ajakan. Parameter: $ctaTitle, $ctaText, $ctaLabel, $ctaUrl, opsional $ctaLabel2, $ctaUrl2 --}}
<section class="fh-sec fh-sec--tight">
    <div class="fh-wrap">
        <div class="fh-cta fh-reveal">
            <img class="fh-cta__art" src="{{ $img('quote-globe.png') }}" alt="" aria-hidden="true" width="340" height="290" loading="lazy">
            <div class="fh-cta__copy">
                <h2>{{ $ctaTitle }}</h2>
                <p>{{ $ctaText }}</p>
            </div>
            <div class="fh-cta__actions">
                <a class="fh-btn fh-btn--lime" href="{{ $ctaUrl }}">{{ $ctaLabel }} {{ $icon('arrow') }}</a>
                @isset($ctaLabel2)
                    <a class="fh-btn fh-btn--ghost" href="{{ $ctaUrl2 }}">{{ $ctaLabel2 }}</a>
                @endisset
            </div>
        </div>
    </div>
</section>
