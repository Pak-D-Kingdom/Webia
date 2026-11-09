{{-- Variabel: $crumb, $title, $lead, $eyebrow, $image, $alt, $cta_label, $cta_href, $chip_a_value, $chip_a_label, $chip_b_value, $chip_b_label --}}
<section class="hf-pagehead">
    <span class="hf-pagehead__blob hf-pagehead__blob--a" aria-hidden="true"></span>
    <span class="hf-pagehead__blob hf-pagehead__blob--b" aria-hidden="true"></span>
    <svg class="hf-pagehead__leaves" viewBox="0 0 140 240" aria-hidden="true"><use href="#deco-leaves"/></svg>
    <svg class="hf-pagehead__heart" viewBox="0 0 40 36" aria-hidden="true"><use href="#deco-heart"/></svg>
    <div class="hf-container hf-pagehead__grid">
        <div class="hf-pagehead__copy">
            <nav class="hf-crumb" aria-label="Breadcrumb">
                <a href="{{ route($rp.'home') }}">Beranda</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">{{ $crumb }}</span>
            </nav>
            <span class="hf-eyebrow">{{ $eyebrow }}</span>
            <h1 class="hf-pagehead__title">{{ $title }}</h1>
            <p class="hf-pagehead__lead">{{ $lead }}</p>
            @if($cta_label !== '')
                <div class="hf-pagehead__actions">
                    <a class="hf-btn hf-btn--dark hf-btn--lg" href="{{ $cta_href }}">{{ $cta_label }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            @endif
        </div>
        <div class="hf-pagehead__media">
            <div class="hf-pagehead__frame" data-parallax>
                @if($image !== '')
                    <img class="hf-pagehead__img" src="{{ asset($img.'/'.$image) }}" alt="{{ $alt }}" width="900" height="640" fetchpriority="high">
                @else
                    <div class="hf-pagehead__mascot">@include($v.'.partials.mascot', ['view' => 'full', 'cls' => ''])</div>
                @endif
            </div>
            <div class="hf-pagehead__chip hf-pagehead__chip--a"><strong>{{ $chip_a_value }}</strong><span>{{ $chip_a_label }}</span></div>
            <div class="hf-pagehead__chip hf-pagehead__chip--b"><strong>{{ $chip_b_value }}</strong><span>{{ $chip_b_label }}</span></div>
        </div>
    </div>
</section>
