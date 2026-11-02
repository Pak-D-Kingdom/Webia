{{-- Photo gallery. $mode: preview | page --}}
@php $full = ($mode ?? 'preview') === 'page'; @endphp

@if (! $full)
    <article class="ta-panel ta-panel--gal" aria-labelledby="ta-gal-title">
        @include($ns . '.partials.section-head', [
            'ico' => 'camera', 'id' => 'ta-gal-title', 'title' => 'Galeri Foto',
            'sub' => 'Lihat momen indah dari perjalanan kami.',
            'href' => $routes['galeri'], 'label' => 'Lihat Semua Galeri',
        ])
        <ul class="ta-gal-grid" data-ta-lightbox>
            @foreach (array_slice($ta['gallery'], 0, 4) as $g)
                <li>
                    <a href="{{ $img($g['image']) }}" data-caption="{{ $g['caption'] }}" aria-label="Perbesar foto: {{ $g['caption'] }}">
                        <img src="{{ $img($g['image']) }}" alt="{{ $g['caption'] }}" loading="lazy">
                        <span class="ta-gal-grid__cap">{{ $g['caption'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </article>
@else
    <section class="ta-section" aria-label="Galeri foto">
        <div class="ta-container">
            <div class="ta-toolbar" data-ta-filter data-param="cat">
                <div class="ta-chips" role="group" aria-label="Filter kategori foto">
                    <button type="button" class="ta-chip is-active" data-filter="*" aria-pressed="true">Semua</button>
                    @foreach ($ta['gallery_cats'] as $k => $v)
                        <button type="button" class="ta-chip" data-filter="{{ $k }}" aria-pressed="false">{{ $v }}</button>
                    @endforeach
                </div>
                <p class="ta-count" data-ta-count aria-live="polite"></p>

                <ul class="ta-masonry" data-ta-items data-ta-lightbox>
                    @foreach ($ta['gallery'] as $g)
                        <li data-cat="{{ $g['cat'] }}">
                            <a href="{{ $img($g['image']) }}" data-caption="{{ $g['caption'] }}" aria-label="Perbesar foto: {{ $g['caption'] }}">
                                <img src="{{ $img($g['image']) }}" alt="{{ $g['caption'] }}" loading="lazy">
                                <span class="ta-masonry__cap">{{ $icon('expand') }}{{ $g['caption'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
