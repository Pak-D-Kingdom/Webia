@php $preview = $preview ?? false; @endphp

@if ($preview)
<section class="ta-card ta-testi" aria-labelledby="testi-title">
    <header class="ta-card__head">
        <span class="ta-ico-circle ta-ico-circle--sm"><svg class="ta-i" aria-hidden="true"><use href="#i-star"/></svg></span>
        <div>
            <p class="ta-eyebrow">Testimoni</p>
            <h3 id="testi-title">Testimoni Pelanggan</h3>
            <p>Kepuasan pelanggan adalah prioritas kami.</p>
        </div>
    </header>

    <div class="ta-slider" data-ta-slider aria-roledescription="carousel" aria-label="Testimoni pelanggan">
        <div class="ta-slider__viewport">
            <ul class="ta-slider__track" data-slider-track>
                @foreach (array_slice($cfg['testimonials'], 0, 4) as $t)
                    <li class="ta-slider__slide" aria-roledescription="slide">
                        <figure class="ta-tq">
                            <span class="ta-tq__mark" aria-hidden="true">“</span>
                            <span class="ta-stars" role="img" aria-label="{{ $t['rating'] }} dari 5 bintang">@for ($s = 1; $s <= 5; $s++)<svg class="ta-i ta-i--fill {{ $s <= $t['rating'] ? 'is-on' : '' }}" aria-hidden="true"><use href="#i-star"/></svg>@endfor</span>
                            <blockquote>{{ $t['quote'] }}</blockquote>
                            <figcaption class="ta-tq__who">
                                @include($ns . '.partials.avatar', ['t' => $t])
                                <span><strong>{{ $t['name'] }}</strong><small>{{ $t['trip'] }}</small></span>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="ta-slider__ctrl">
            <button class="ta-slider__nav" type="button" data-slider-prev aria-label="Testimoni sebelumnya"><svg class="ta-i" aria-hidden="true"><use href="#i-chev-left"/></svg></button>
            <div class="ta-slider__dots" data-slider-dots></div>
            <button class="ta-slider__nav" type="button" data-slider-next aria-label="Testimoni berikutnya"><svg class="ta-i" aria-hidden="true"><use href="#i-chev-right"/></svg></button>
        </div>
    </div>
    <a class="ta-btn ta-btn--outline ta-btn--sm ta-card__cta" href="{{ $r('testimoni') }}">Lihat Semua Testimoni <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
</section>
@else
<section class="ta-section" aria-label="Testimoni pelanggan">
    <div class="ta-container">
        <ul class="ta-tgrid">
            @foreach ($cfg['testimonials'] as $t)
                <li class="ta-card ta-tcard">
                    <figure class="ta-quote">
                        <blockquote>“{{ $t['quote'] }}”</blockquote>
                        <figcaption class="ta-quote__who">
                            @include($ns . '.partials.avatar', ['t' => $t])
                            <span><strong>{{ $t['name'] }}</strong><small>{{ $t['trip'] }}</small>
                                <span class="ta-stars" role="img" aria-label="{{ $t['rating'] }} dari 5 bintang">@for ($s = 1; $s <= 5; $s++)<svg class="ta-i ta-i--fill {{ $s <= $t['rating'] ? 'is-on' : '' }}" aria-hidden="true"><use href="#i-star"/></svg>@endfor</span>
                            </span>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
