{{-- PROJECT GALLERY --}}
@php $preview = $preview ?? false; $g = $cfg['gallery']; $rooms = collect($g['items'])->pluck('room')->unique()->values(); @endphp

@if ($preview)
    <article class="fm-pv fm-pv--gallery fm-card" data-fm-reveal>
        <div class="fm-pv__lead">
            <p class="fm-eyebrow">{{ $g['eyebrow'] }}</p>
            <h2 class="fm-h3">{{ $g['title'] }}</h2>
            <p class="fm-pv__text">{{ $g['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('gallery') }}">{{ $g['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <div class="fm-mosaic" aria-hidden="true">
            @foreach (array_slice($g['items'], 0, 4) as $i => $it)
                <img class="fm-mosaic__i fm-mosaic__i--{{ $i + 1 }}" src="{{ $img($it['image']) }}" alt="" loading="lazy" decoding="async">
            @endforeach
        </div>
    </article>
@else
    <section class="fm-section" data-fm-gallery>
        <div class="fm-container">
            <div class="fm-toolbar">
                <div class="fm-chips" role="group" aria-label="Filter ruangan">
                    <button type="button" class="fm-chip is-active" data-fm-gal-room="" aria-pressed="true">Semua</button>
                    @foreach ($rooms as $room)
                        <button type="button" class="fm-chip" data-fm-gal-room="{{ $room }}" aria-pressed="false">{{ $room }}</button>
                    @endforeach
                </div>
            </div>
            <ul class="fm-galgrid">
                @foreach ($g['items'] as $i => $it)
                    <li class="fm-gal fm-gal--{{ $it['shape'] }}" data-fm-reveal data-room="{{ $it['room'] }}">
                        <button type="button" class="fm-gal__btn" data-fm-gal-open="{{ $i }}" aria-label="Perbesar: {{ $it['title'] }}">
                            <img src="{{ $img($it['image']) }}" alt="{{ $it['title'] }}" loading="lazy" decoding="async">
                            <span class="fm-gal__cap"><strong>{{ $it['title'] }}</strong><small>{{ $it['room'] }} · {{ $it['style'] }}</small></span>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="fm-lightbox" data-fm-lightbox hidden>
            <div class="fm-modal__backdrop" data-fm-lb-close></div>
            <figure class="fm-lightbox__fig" role="dialog" aria-modal="true" aria-label="Pratinjau proyek">
                <img data-fm-lb-img src="" alt="">
                <figcaption data-fm-lb-cap></figcaption>
            </figure>
            <button type="button" class="fm-iconbtn fm-lightbox__x" data-fm-lb-close aria-label="Tutup"><svg class="fm-i" aria-hidden="true"><use href="#i-x"/></svg></button>
            <button type="button" class="fm-iconbtn fm-lightbox__nav fm-lightbox__nav--prev" data-fm-lb-prev aria-label="Sebelumnya"><svg class="fm-i" aria-hidden="true"><use href="#i-left"/></svg></button>
            <button type="button" class="fm-iconbtn fm-lightbox__nav fm-lightbox__nav--next" data-fm-lb-next aria-label="Berikutnya"><svg class="fm-i" aria-hidden="true"><use href="#i-right"/></svg></button>
        </div>
    </section>
    <script type="application/json" id="fm-gallery-data">@json($g['items'])</script>
    @include($ns.'.partials.cta-band')
@endif
