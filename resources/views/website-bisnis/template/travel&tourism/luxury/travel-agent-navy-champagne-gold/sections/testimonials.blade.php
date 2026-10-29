{{-- Testimonials. $mode: 'preview' (slider) | 'full' (ringkasan + grid) --}}
@php
    $full  = ($mode ?? 'preview') === 'full';
    $stars = function ($n) use ($icon) {
        $out = '';
        for ($i = 1; $i <= 5; $i++) {
            $out .= '<span class="ga-star' . ($i <= $n ? ' is-on' : '') . '">' . $icon('star') . '</span>';
        }
        return $out;
    };
    $initials = fn ($name) => mb_strtoupper(mb_substr($name, 0, 1) . mb_substr(strrchr(' ' . $name, ' '), 1, 1));
    $avg = round(array_sum(array_column($t['testimonials'], 'rating')) / max(1, count($t['testimonials'])), 1);
@endphp

@if (! $full)
    <section class="ga-card ga-card--dark ga-pv ga-tes" aria-labelledby="ga-tes-title" data-slider>
        <header class="ga-card__head">
            <span class="ga-emblem ga-emblem--dark ga-emblem--sm">{!! $icon('crown') !!}</span>
            <div>
                <h2 id="ga-tes-title">Testimoni Pelanggan</h2>
                <p>Kepuasan pelanggan adalah prioritas kami.</p>
            </div>
        </header>

        <div class="ga-tes__slides">
            @foreach ($t['testimonials'] as $tm)
                <figure class="ga-tslide {{ $loop->first ? 'is-active' : '' }}" data-slide>
                    <p class="ga-stars-row" aria-label="Rating {{ $tm['rating'] }} dari 5">{!! $stars($tm['rating']) !!}</p>
                    <blockquote>“{{ $tm['quote'] }}”</blockquote>
                    <figcaption class="ga-tslide__who">
                        @if ($tm['avatar'])
                            <img class="ga-avatar" src="{{ $img($tm['avatar']) }}" alt="" width="56" height="56" loading="lazy">
                        @else
                            <span class="ga-avatar ga-avatar--ini" aria-hidden="true">{{ $initials($tm['name']) }}</span>
                        @endif
                        <span><strong>{{ $tm['name'] }}</strong><small>{{ $tm['trip'] }}</small></span>
                    </figcaption>
                </figure>
            @endforeach
        </div>

        <div class="ga-tes__ctrl">
            <div class="ga-dots" role="group" aria-label="Pilih testimoni">
                @foreach ($t['testimonials'] as $tm)
                    <button type="button" class="{{ $loop->first ? 'is-active' : '' }}" aria-label="Testimoni {{ $loop->iteration }}" data-dot></button>
                @endforeach
            </div>
            <div class="ga-tes__nav">
                <button class="ga-arrow" type="button" aria-label="Testimoni sebelumnya" data-slider-prev>{!! $icon('left') !!}</button>
                <button class="ga-arrow" type="button" aria-label="Testimoni berikutnya" data-slider-next>{!! $icon('right') !!}</button>
            </div>
        </div>
        <div class="ga-pv__foot"><a class="ga-link ga-link--light" href="{{ $url('testimoni') }}">Lihat Semua Testimoni {!! $icon('arrow') !!}</a></div>
    </section>
@else
    <section class="ga-block" aria-label="Testimoni pelanggan">
        <div class="ga-container">
            <div class="ga-card ga-rating">
                <p class="ga-rating__num">{{ number_format($avg, 1, ',', '.') }}</p>
                <div>
                    <p class="ga-stars-row" aria-label="Rata-rata {{ $avg }} dari 5">{!! $stars((int) round($avg)) !!}</p>
                    <p class="ga-muted">Rata-rata dari {{ count($t['testimonials']) }} ulasan pelanggan</p>
                </div>
            </div>

            <ul class="ga-tgrid">
                @foreach ($t['testimonials'] as $tm)
                    <li>
                        <figure class="ga-card ga-tcard">
                            <p class="ga-stars-row" aria-label="Rating {{ $tm['rating'] }} dari 5">{!! $stars($tm['rating']) !!}</p>
                            <blockquote>“{{ $tm['quote'] }}”</blockquote>
                            <figcaption>
                                @if ($tm['avatar'])
                                    <img class="ga-avatar" src="{{ $img($tm['avatar']) }}" alt="" width="48" height="48" loading="lazy">
                                @else
                                    <span class="ga-avatar ga-avatar--ini" aria-hidden="true">{{ $initials($tm['name']) }}</span>
                                @endif
                                <span><strong>{{ $tm['name'] }}</strong><small>{{ $tm['trip'] }}</small></span>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
