@php($w = $cafe['whatsapp'])
<article class="lm-card lm-wa" id="kontak">
    <p class="lm-eyebrow">{{ $w['eyebrow'] }}</p>
    <h2 class="lm-card__title">{{ $w['title'] }}</h2>
    <p>{{ $w['text'] }}</p>
    <a class="lm-btn lm-btn--wa" href="{{ $wa($cafe['contact']['chat_message']) }}" target="_blank" rel="noopener">
        <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg> {{ $w['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
    </a>
</article>
