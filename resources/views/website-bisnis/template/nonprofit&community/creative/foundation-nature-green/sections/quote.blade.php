{{-- Kartu kutipan (sesuai desain) --}}
<article class="fh-card fh-card--quote fh-reveal">
    <img class="fh-card__art fh-card__art--quote" src="{{ $img('quote-globe.png') }}" alt="" aria-hidden="true" width="340" height="290" loading="lazy">
    <blockquote class="fh-quote">
        <span class="fh-quote__mark" aria-hidden="true">&ldquo;</span>
        <p class="fh-script">{{ $cfg['quote']['text'] }}</p>
        {{ $icon('heart', 'fh-ic fh-quote__heart') }}
    </blockquote>
</article>
