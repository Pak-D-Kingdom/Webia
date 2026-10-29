{{-- Photo gallery. $mode: 'preview' (carousel) | 'full' (grid + lightbox) --}}
@php
    $full    = ($mode ?? 'preview') === 'full';
    $regions = array_values(array_unique(array_column($t['gallery'], 'region')));
@endphp

@if (! $full)
    <section class="ga-card ga-card--dark ga-pv ga-gal" aria-labelledby="ga-gal-title">
        <header class="ga-card__head">
            <span class="ga-emblem ga-emblem--dark ga-emblem--sm">{!! $icon('camera') !!}</span>
            <div>
                <h2 id="ga-gal-title">Galeri Foto</h2>
                <p>Momen indah dari perjalanan Anda.</p>
            </div>
        </header>
        <ul class="ga-gal__grid">
            @foreach (array_slice($t['gallery'], 0, 6) as $g)
                <li><a href="{{ $url('galeri') }}" aria-label="Lihat galeri: {{ $g['caption'] }}"><img src="{{ $img($g['image']) }}" alt="{{ $g['caption'] }}" loading="lazy" decoding="async"></a></li>
            @endforeach
        </ul>
        <div class="ga-pv__foot"><a class="ga-link ga-link--light" href="{{ $url('galeri') }}">Lihat Semua Foto {!! $icon('arrow') !!}</a></div>
    </section>
@else
    <section class="ga-block" aria-label="Galeri foto">
        <div class="ga-container">
            <div class="ga-filter" role="group" aria-label="Filter wilayah" data-filter-group>
                <button type="button" class="is-active" data-filter="all">Semua</button>
                @foreach ($regions as $r)
                    <button type="button" data-filter="{{ $r }}">{{ $r }}</button>
                @endforeach
            </div>

            <ul class="ga-ggrid">
                @foreach ($t['gallery'] as $g)
                    <li data-filter-item data-value="{{ $g['region'] }}">
                        <button class="ga-gitem" type="button" data-lightbox data-src="{{ $img($g['image']) }}" data-caption="{{ $g['caption'] }}">
                            <img src="{{ $img($g['image']) }}" alt="{{ $g['caption'] }}" loading="lazy" decoding="async">
                            <span class="ga-gitem__cap">{{ $g['caption'] }}</span>
                            <span class="ga-gitem__zoom">{!! $icon('zoom') !!}</span>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="ga-lightbox" role="dialog" aria-modal="true" aria-label="Pratinjau foto" hidden data-lightbox-modal>
            <button class="ga-lightbox__btn ga-lightbox__close" type="button" aria-label="Tutup" data-lightbox-close>{!! $icon('close') !!}</button>
            <button class="ga-lightbox__btn ga-lightbox__prev" type="button" aria-label="Foto sebelumnya" data-lightbox-prev>{!! $icon('left') !!}</button>
            <figure>
                <img src="" alt="" data-lightbox-img>
                <figcaption data-lightbox-cap></figcaption>
            </figure>
            <button class="ga-lightbox__btn ga-lightbox__next" type="button" aria-label="Foto berikutnya" data-lightbox-next>{!! $icon('right') !!}</button>
        </div>
    </section>
@endif
