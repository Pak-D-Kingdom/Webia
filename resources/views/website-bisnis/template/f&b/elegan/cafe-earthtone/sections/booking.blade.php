@php($b = $cafe['booking'])
<article class="lm-card lm-booking" id="reservasi">
    <p class="lm-eyebrow">{{ $b['eyebrow'] }}</p>
    <h2 class="lm-card__title">{{ $b['title'] }}</h2>
    <p>{{ $b['text'] }}</p>
    <button class="lm-btn lm-btn--gold lm-btn--sm" type="button" data-modal-open>
        <svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> {{ $b['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
    </button>
</article>
