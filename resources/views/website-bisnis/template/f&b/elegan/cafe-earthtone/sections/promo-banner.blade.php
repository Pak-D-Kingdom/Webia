@php($b = $cafe['banner'])
<article class="lm-banner" aria-labelledby="banner-title">
    <div class="lm-banner__visual">
        <p class="lm-banner__script" aria-hidden="true">{!! implode('<br>', array_map('e', $b['script'])) !!}</p>
        <figure class="lm-banner__plate lm-media"><img src="{{ $img($b['image']) }}" alt="" loading="lazy"></figure>
    </div>
    <div class="lm-banner__body">
        <p class="lm-eyebrow lm-eyebrow--gold">{{ $b['eyebrow'] }}</p>
        <h2 id="banner-title">{{ $b['title'] }}</h2>
        <p>{{ $b['text'] }}</p>
        <a class="lm-btn lm-btn--ghost lm-btn--xs" href="{{ $b['url'] }}">{{ $b['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
</article>
