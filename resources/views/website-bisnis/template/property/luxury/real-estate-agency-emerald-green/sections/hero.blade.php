{{-- ===================== PROPERTY LISTING (HERO) ===================== --}}
    <section class="rea-hero" id="property" aria-label="Featured property" data-hero>
        <div class="rea-hero__slides">
            @foreach ($property['slides'] as $i => $slide)
                <img class="rea-hero__slide {{ $i === 0 ? 'is-active' : '' }}" src="{{ $slide['src'] }}" alt="{{ $slide['alt'] }}"
                     @if ($i === 0) fetchpriority="high" @else loading="lazy" aria-hidden="true" @endif data-hero-slide>
            @endforeach
        </div>
        <div class="rea-hero__shade" aria-hidden="true"></div>
        <div class="rea-hero__leaves" aria-hidden="true"></div>

        <div class="rea-container rea-hero__inner">
            <div class="rea-hero__content">
                <p class="rea-hero__badge">{{ strtoupper($property['badge']) }}</p>
                <h1 class="rea-hero__title">{{ $property['title'] }}</h1>
                <p class="rea-hero__place">{{ $icon('pin') }}<span>{{ $property['place'] }}</span></p>

                <ul class="rea-hero__meta">
                    @foreach ($property['highlights'] as $h)
                        <li>{{ $icon($h['icon']) }}<span>{{ $h['label'] }}</span></li>
                    @endforeach
                </ul>

                <a class="rea-btn rea-btn--gold rea-btn--lg" href="#gallery">View Gallery {{ $icon('arrow') }}</a>
            </div>

            <div class="rea-hero__price" aria-label="Asking price">
                <p><span class="rea-hero__cur">{{ $property['price_cur'] }}</span> {{ $property['price'] }}</p>
                <small>{{ $property['price_note'] }}</small>
            </div>
        </div>

        <div class="rea-hero__controls">
            <button class="rea-roundbtn" type="button" aria-label="Previous slide" data-hero-prev>{{ $icon('chev-l') }}</button>
            <button class="rea-roundbtn" type="button" aria-label="Next slide" data-hero-next>{{ $icon('chev-r') }}</button>
            <p class="rea-hero__count" aria-live="polite"><span data-hero-current>01</span> / <span data-hero-total>{{ sprintf('%02d', count($property['slides'])) }}</span></p>
        </div>
    </section>

    
