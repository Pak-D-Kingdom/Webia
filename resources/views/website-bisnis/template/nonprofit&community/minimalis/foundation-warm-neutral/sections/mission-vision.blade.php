<article class="hf-card hf-mission" data-reveal>
    <header class="hf-card__head">
        <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-target"/></svg>
        <h2 class="hf-card__title">{{ $f['mission']['title'] }}</h2>
    </header>
    <p class="hf-mission__text">{{ $f['mission']['summary'] }}</p>
    <a class="hf-btn hf-btn--dark hf-btn--sm" href="{{ route($rp.'mission-vision') }}">{{ $f['mission']['button'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    <svg class="hf-deco hf-mission__heart" viewBox="0 0 40 36" aria-hidden="true"><use href="#deco-heart"/></svg>
    <img class="hf-mission__img" src="{{ asset($img.'/mission-plant.jpg') }}" width="588" height="501" alt="Dua tangan menopang tunas tanaman muda" loading="lazy">
</article>
