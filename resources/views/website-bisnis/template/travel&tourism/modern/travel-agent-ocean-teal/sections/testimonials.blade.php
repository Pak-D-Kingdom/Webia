{{-- Testimonials. $mode: preview | page --}}
@php $full = ($mode ?? 'preview') === 'page'; @endphp

@if (! $full)
    @php $avg = collect($ta['testimonials'])->avg('rating'); @endphp
    <article class="ta-panel ta-panel--testi" aria-labelledby="ta-testi-title" data-ta-slider>
        @include($ns . '.partials.section-head', [
            'ico' => 'star', 'id' => 'ta-testi-title', 'title' => 'Testimoni Pelanggan',
            'sub' => 'Kesan dari traveler yang sudah merasakan pengalaman bersama kami.',
            'href' => $routes['testimoni'], 'label' => 'Semua Testimoni',
        ])

        <div class="ta-slider">
            <div class="ta-slider__viewport">
                @foreach ($ta['testimonials'] as $i => $t)
                    <figure @class(['ta-slide', 'is-active' => $i === 0]) data-slide @if ($i !== 0) aria-hidden="true" @endif>
                        @include($ns . '.partials.avatar', ['t' => $t])
                        <div class="ta-slide__body">
                            <blockquote><p>“{{ $t['quote'] }}”</p></blockquote>
                            <figcaption>
                                <span class="ta-slide__who"><strong>{{ $t['name'] }}</strong><small>{{ $t['trip'] }}</small></span>
                                @include($ns . '.partials.stars', ['rating' => $t['rating']])
                            </figcaption>
                        </div>
                    </figure>
                @endforeach
            </div>
        </div>

        <div class="ta-testi__foot">
            <span class="ta-testi__score"><strong>{{ number_format($avg, 1, ',', '.') }}</strong> dari 5 · {{ count($ta['testimonials']) }} testimoni</span>
            <div class="ta-testi__ctrl">
                <button class="ta-slider__nav" type="button" data-prev aria-label="Testimoni sebelumnya">{{ $icon('left') }}</button>
                <div class="ta-dots" data-dots role="group" aria-label="Pilih testimoni"></div>
                <button class="ta-slider__nav" type="button" data-next aria-label="Testimoni berikutnya">{{ $icon('right') }}</button>
            </div>
        </div>
    </article>
@else
    <section class="ta-section" aria-label="Testimoni pelanggan">
        <div class="ta-container">
            <ul class="ta-grid ta-grid--testi">
                @foreach ($ta['testimonials'] as $t)
                    <li class="ta-tcard">
                        <div class="ta-tcard__top">
                            @include($ns . '.partials.avatar', ['t' => $t])
                            <div>
                                <strong>{{ $t['name'] }}</strong>
                                <span>{{ $t['trip'] }}</span>
                            </div>
                        </div>
                        @include($ns . '.partials.stars', ['rating' => $t['rating']])
                        <blockquote><p>“{{ $t['quote'] }}”</p></blockquote>
                    </li>
                @endforeach
            </ul>
            <div class="ta-cta-band">
                <p>Siap membuat cerita liburan Anda sendiri?</p>
                <a class="ta-btn ta-btn--primary" href="{{ $routes['inquiry'] }}">Kirim Inquiry {{ $icon('arrow') }}</a>
            </div>
        </div>
    </section>
@endif
