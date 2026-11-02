{{-- ===================== 1. GALERI & MEDIA VISUAL ===================== --}}
@php $photos = $property['gallery']; $t = $detailCfg['titles']['gallery']; @endphp
<section class="rea-panel rea-panel--flush" id="gallery" aria-labelledby="gallery-title" data-gallery data-viewer>
    <header class="rea-panel__head rea-panel__head--pad">
        <div>
            <p class="rea-eyebrow rea-eyebrow--dark">PHOTOS &amp; MEDIA</p>
            <h2 id="gallery-title">{{ $t['title'] }}</h2>
            <p>{{ $t['text'] }}</p>
        </div>
        <button class="rea-link" type="button" data-gallery-open="0" data-viewer-fullscreen>View fullscreen {{ $icon('expand') }}</button>
    </header>

    <div class="rea-viewer">
        <button class="rea-viewer__stage" type="button" data-gallery-open="0" aria-label="Open photo in fullscreen">
            <img src="{{ $photos[0]['src'] }}" alt="{{ $photos[0]['alt'] }}" data-viewer-img>
            <span class="rea-viewer__count"><span data-viewer-current>1</span> / {{ count($photos) }}</span>
            <span class="rea-photo__expand">{{ $icon('expand') }}</span>
        </button>
        <button class="rea-roundbtn rea-viewer__nav rea-viewer__nav--prev" type="button" aria-label="Previous photo" data-viewer-prev>{{ $icon('chev-l') }}</button>
        <button class="rea-roundbtn rea-viewer__nav rea-viewer__nav--next" type="button" aria-label="Next photo" data-viewer-next>{{ $icon('chev-r') }}</button>
    </div>

    <ul class="rea-viewer__thumbs" aria-label="Photo thumbnails">
        @foreach ($photos as $i => $photo)
            <li>
                <button type="button" class="{{ $i === 0 ? 'is-active' : '' }}" data-viewer-thumb="{{ $i }}" aria-label="Show photo {{ $i + 1 }}: {{ $photo['alt'] }}">
                    <img src="{{ $photo['src'] }}" alt="" loading="lazy">
                </button>
            </li>
        @endforeach
    </ul>

    @if ($property['video_url'] ?? false)
        <div class="rea-viewer__video">
            <iframe src="{{ $property['video_url'] }}" title="Video tour of {{ $property['title'] }}" loading="lazy" allowfullscreen></iframe>
        </div>
    @endif

    {{-- Lightbox (fullscreen) --}}
    <dialog class="rea-lightbox" aria-label="Photo viewer" data-lightbox>
        <button class="rea-lightbox__close rea-roundbtn" type="button" aria-label="Close photo viewer" data-lightbox-close>{{ $icon('x') }}</button>
        <button class="rea-lightbox__nav rea-lightbox__nav--prev rea-roundbtn" type="button" aria-label="Previous photo" data-lightbox-prev>{{ $icon('chev-l') }}</button>
        <figure class="rea-lightbox__figure">
            <img alt="" data-lightbox-img>
            <figcaption><span data-lightbox-caption></span> <span class="rea-lightbox__count" data-lightbox-count></span></figcaption>
        </figure>
        <button class="rea-lightbox__nav rea-lightbox__nav--next rea-roundbtn" type="button" aria-label="Next photo" data-lightbox-next>{{ $icon('chev-r') }}</button>
        <script type="application/json" data-lightbox-data>@json($photos)</script>
    </dialog>
</section>
