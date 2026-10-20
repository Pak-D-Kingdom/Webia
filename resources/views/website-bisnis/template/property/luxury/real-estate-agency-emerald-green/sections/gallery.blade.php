{{-- ---------- GALLERY ---------- --}}
<section class="rea-gallery" id="gallery" aria-labelledby="gallery-title" data-gallery>
    <header class="rea-section-head">
        <h2 id="gallery-title">Property Gallery</h2>
        <p>Explore the beauty and elegance of this property</p>
    </header>

    <div class="rea-gallery__grid">
        <figure class="rea-gallery__main">
            <img src="{{ $property['gallery'][0]['src'] }}" alt="{{ $property['gallery'][0]['alt'] }}" data-gallery-main>
            <button class="rea-gallery__expand" type="button" aria-label="Open photo viewer" data-gallery-open="0">{{ $icon('expand') }}</button>
            <button class="rea-gallery__more" type="button" data-gallery-open="0">+{{ $property['more_photos'] }} More Photos</button>
        </figure>

        <ul class="rea-gallery__thumbs">
            @foreach (array_slice($property['gallery'], 1) as $i => $photo)
                <li>
                    <button class="rea-gallery__thumb" type="button" aria-label="Show photo: {{ $photo['alt'] }}"
                            data-gallery-thumb="{{ $i + 1 }}" data-src="{{ $photo['src'] }}" data-alt="{{ $photo['alt'] }}">
                        <img src="{{ $photo['src'] }}" alt="" loading="lazy">
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Lightbox --}}
    <dialog class="rea-lightbox" aria-label="Photo viewer" data-lightbox>
        <button class="rea-lightbox__close rea-roundbtn" type="button" aria-label="Close photo viewer" data-lightbox-close>{{ $icon('x') }}</button>
        <button class="rea-lightbox__nav rea-lightbox__nav--prev rea-roundbtn" type="button" aria-label="Previous photo" data-lightbox-prev>{{ $icon('chev-l') }}</button>
        <figure class="rea-lightbox__figure">
            <img src="" alt="" data-lightbox-img>
            <figcaption><span data-lightbox-caption></span> <span class="rea-lightbox__count" data-lightbox-count></span></figcaption>
        </figure>
        <button class="rea-lightbox__nav rea-lightbox__nav--next rea-roundbtn" type="button" aria-label="Next photo" data-lightbox-next>{{ $icon('chev-r') }}</button>
        <script type="application/json" data-lightbox-data>@json($property['gallery'])</script>
    </dialog>
</section>
