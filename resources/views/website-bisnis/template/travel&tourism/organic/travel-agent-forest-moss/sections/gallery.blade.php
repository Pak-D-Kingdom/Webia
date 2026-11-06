@php $preview = $preview ?? false; @endphp

@if ($preview)
@php $gTotal = count($cfg['gallery']); @endphp
<section class="ta-card ta-gal" aria-labelledby="gal-title">
    <header class="ta-card__head">
        <span class="ta-ico-circle ta-ico-circle--sm"><svg class="ta-i" aria-hidden="true"><use href="#i-image"/></svg></span>
        <div>
            <p class="ta-eyebrow">Galeri</p>
            <h3 id="gal-title">Galeri Foto</h3>
            <p>Koleksi momen indah dari perjalanan kami.</p>
        </div>
    </header>
    <ul class="ta-gal__mosaic">
        @foreach (array_slice($cfg['gallery'], 0, 4) as $n => $g)
            <li>
                <a href="{{ $r('galeri') }}" aria-label="Buka galeri: {{ $g['caption'] }}">
                    <img src="{{ $img($g['file']) }}" alt="{{ $g['caption'] }}" loading="lazy">
                    <span class="ta-gal__cap">{{ $g['caption'] }}</span>
                    @if ($n === 3 && $gTotal > 4)
                        <span class="ta-gal__more"><b>+{{ $gTotal - 4 }}</b><small>foto lainnya</small></span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
    <a class="ta-btn ta-btn--outline ta-btn--sm ta-card__cta" href="{{ $r('galeri') }}">Lihat Semua Galeri <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
</section>
@else
<section class="ta-section" aria-label="Galeri foto">
    <div class="ta-container">
        <div class="ta-filter" data-ta-filter role="group" aria-label="Filter galeri">
            <button type="button" class="ta-chip is-active" data-filter="all">Semua</button>
            @foreach (collect($cfg['gallery'])->pluck('category')->unique() as $cat)
                <button type="button" class="ta-chip" data-filter="{{ $cat }}">{{ $cat }}</button>
            @endforeach
        </div>

        <ul class="ta-masonry" data-ta-filter-list data-ta-lightbox>
            @foreach ($cfg['gallery'] as $g)
                <li class="ta-masonry__item {{ !empty($g['wide']) ? 'is-wide' : '' }}" data-cat="{{ $g['category'] }}">
                    <button type="button" class="ta-masonry__btn" data-lb-src="{{ $img($g['file']) }}" data-lb-caption="{{ $g['caption'] }}" aria-label="Perbesar foto: {{ $g['caption'] }}">
                        <img src="{{ $img($g['file']) }}" alt="{{ $g['caption'] }}" loading="lazy">
                        <span class="ta-masonry__cap"><svg class="ta-i" aria-hidden="true"><use href="#i-zoom"/></svg>{{ $g['caption'] }}</span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
