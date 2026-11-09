<article class="hf-card hf-volunteer" data-reveal>
    <img class="hf-volunteer__img" src="{{ asset($img.'/volunteer-hands.jpg') }}" width="680" height="496" alt="Tangan-tangan relawan bertumpuk menandakan kebersamaan" loading="lazy">
    <header class="hf-card__head">
        <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-people"/></svg>
        <h2 class="hf-card__title">{{ $f['volunteer']['title'] }}</h2>
    </header>
    <p class="hf-volunteer__text">{{ $f['volunteer']['summary'] }}</p>
    <a class="hf-btn hf-btn--dark hf-btn--sm" href="{{ route($rp.'volunteer') }}">{{ $f['volunteer']['button'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
