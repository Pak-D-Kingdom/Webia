@php $h = $cafe['hero']; @endphp
<section class="kl-hero" id="beranda" aria-labelledby="kl-hero-title">
    <div class="kl-hero__paper">
        <img class="kl-hero__sketch" src="{{ $img('house-sketch.png') }}" alt="" aria-hidden="true" width="344" height="536">
        <img class="kl-hero__stamp" src="{{ $img('stamp.png') }}" alt="" aria-hidden="true" width="212" height="220">

        <div class="kl-hero__content">
            <p class="kl-hero__greeting">{{ $h['greeting'] }}</p>
            <h1 class="kl-hero__title" id="kl-hero-title">{{ $h['title'] }}</h1>
            <p class="kl-hero__subtitle">{{ $h['subtitle'] }}</p>
            <p class="kl-hero__text">{{ $h['text'] }}</p>

            <div class="kl-hero__actions">
                <a class="kl-btn kl-btn--red" href="{{ route($cafe['routes'][$h['cta_primary']['route']]) }}">
                    <span>{{ $h['cta_primary']['label'] }}</span>
                    <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-{{ $h['cta_primary']['icon'] }}"/></svg>
                </a>
                <a class="kl-btn kl-btn--outline" href="{{ route($cafe['routes'][$h['cta_secondary']['route']]) }}">
                    <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-{{ $h['cta_secondary']['icon'] }}"/></svg>
                    <span>{{ $h['cta_secondary']['label'] }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="kl-hero__photo">
        <img class="kl-hero__img" src="{{ $img('hero.jpg') }}" alt="{{ $h['image_alt'] }}" width="655" height="270" fetchpriority="high">
        <p class="kl-hero__script" aria-hidden="true">{{ $h['script'] }}</p>
        <img class="kl-hero__corner" src="{{ $img('hero-corner.png') }}" alt="" aria-hidden="true" width="176" height="234">
    </div>
</section>
