@php($b = $cafe['booking'])
<section class="lm-cta" aria-labelledby="cta-title">
    <img class="lm-cta__bg" src="{{ $img($b['image']) }}" alt="" loading="lazy">
    <div class="lm-container lm-cta__in">
        <div>
            <p class="lm-eyebrow lm-eyebrow--gold">{{ $b['eyebrow'] }}</p>
            <h2 id="cta-title">{{ $b['title'] }}</h2>
            <p>{{ $b['text'] }}</p>
        </div>
        <a class="lm-btn lm-btn--gold" href="{{ $url('reservasi') }}">
            <svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> {{ $b['nav_cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
        </a>
    </div>
</section>
