@php($p = $cafe['promo'])
<aside class="lm-promo" id="promo" aria-labelledby="promo-title">
    <img class="lm-promo__img" src="{{ $img($p['image']) }}" alt="" loading="lazy">
    <span class="lm-promo__badge" aria-hidden="true"><b>{{ $p['badge'][0] }}</b><b>{{ $p['badge'][1] }}</b></span>

    <div class="lm-promo__body">
        <p class="lm-eyebrow lm-eyebrow--gold">{{ $p['eyebrow'] }}</p>
        <h2 id="promo-title">{{ $p['title'] }}</h2>
        <p class="lm-promo__sub">{{ $p['subtitle'] }}</p>
        <p class="lm-promo__date">{{ $p['period'] }}</p>
        <a class="lm-btn lm-btn--ghost lm-btn--sm" href="{{ $p['url'] }}">{{ $p['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
</aside>
