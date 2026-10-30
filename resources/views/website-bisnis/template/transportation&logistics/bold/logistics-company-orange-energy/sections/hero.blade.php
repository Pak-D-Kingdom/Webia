@php $h = $site['hero']; @endphp
<section class="lg-hero" aria-labelledby="lg-hero-title">
    <div class="lg-hero__chev" aria-hidden="true"><i></i><i></i></div>
    <div class="lg-hero__scene">
        <img src="{{ $img($h['image']) }}" alt="Pesawat kargo, truk, dan kapal kontainer Energi Cargo" fetchpriority="high">
    </div>

    <div class="lg-wrap lg-hero__in">
        <div class="lg-hero__copy">
            <p class="lg-hero__eyebrow"><svg class="lg-ic" aria-hidden="true"><use href="#i-target"></use></svg>{{ $h['eyebrow'] }}</p>
            <h1 id="lg-hero-title">{{ $h['title'] }} <span>{{ $h['accent'] }}</span></h1>
            <p class="lg-hero__text">{{ $h['text'] }}</p>
            <div class="lg-hero__cta">
                <a class="lg-btn lg-btn--primary" href="{{ $to($h['cta']['route']) }}">{{ $h['cta']['label'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
                <a class="lg-btn lg-btn--ghost" href="{{ $to($h['cta_alt']['route']) }}">{{ $h['cta_alt']['label'] }}</a>
            </div>
        </div>
    </div>

    <ul class="lg-hero__feat">
        @foreach ($h['features'] as $f)
            <li>
                <a href="{{ $to($f['route']) }}">
                    <span class="lg-hero__feat-ic"><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"></use></svg></span>
                    <span><strong>{{ $f['title'] }}</strong><small>{{ $f['text'] }}</small></span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
