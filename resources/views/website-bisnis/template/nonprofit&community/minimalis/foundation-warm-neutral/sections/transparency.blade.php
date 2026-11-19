<article class="hf-card hf-report" data-reveal>
    <img class="hf-report__img" src="{{ asset($img.'/report-illustration.jpg') }}" width="883" height="432" alt="Buku laporan keuangan dengan grafik dan kaca pembesar" loading="lazy">
    <header class="hf-card__head">
        <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-doc"/></svg>
        <h2 class="hf-card__title">{{ $f['transparency']['title'] }}</h2>
    </header>
    <p class="hf-report__text">{{ $f['transparency']['summary'] }}</p>
    <a class="hf-btn hf-btn--dark hf-btn--sm" href="{{ route($rp.'transparency') }}">{{ $f['transparency']['button'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
