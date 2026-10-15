@php($a = $cafe['about'])
<article class="lm-card lm-about" id="tentang">
    <div class="lm-about__text">
        <p class="lm-eyebrow">{{ $a['eyebrow'] }}</p>
        <h2 class="lm-card__title">{{ $a['title'] }}</h2>
        <p>{{ $a['text'] }}</p>
        <a class="lm-btn lm-btn--gold lm-btn--sm" href="{{ $a['url'] }}">{{ $a['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
    <figure class="lm-media lm-about__img">
        <img src="{{ $img($a['image']) }}" alt="Suasana interior {{ $cafe['brand']['title'] }}" loading="lazy">
    </figure>
</article>
