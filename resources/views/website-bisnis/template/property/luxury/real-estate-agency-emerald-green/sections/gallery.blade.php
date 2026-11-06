{{-- ===================== GALLERY (preview di beranda & halaman Gallery) ===================== --}}
@php
    $isPreview = $preview ?? false;
    $photos    = $property['gallery'];
@endphp
<section class="rea-section {{ $isPreview ? 'rea-section--alt' : '' }}" id="gallery" aria-label="{{ $pages['gallery']['title'] }}" data-gallery>
    <div class="rea-container">
        @if ($isPreview)
            <header class="rea-sec-head">
                <div class="rea-section-head">
                    <p class="rea-eyebrow rea-eyebrow--dark">PHOTOS</p>
                    <h2>{{ $pages['gallery']['title'] }}</h2>
                    <p>{{ $pages['gallery']['subtitle'] }}</p>
                </div>
                <a class="rea-link" href="{{ $route('gallery') }}">View Full Gallery {{ $icon('arrow') }}</a>
            </header>

            <div class="rea-bento">
                @foreach ($photos as $i => $photo)
                    <button class="rea-photo {{ $i === 0 ? 'rea-photo--main' : '' }}" type="button" data-gallery-open="{{ $i }}" aria-label="Open photo: {{ $photo['alt'] }}">
                        <img src="{{ $photo['src'] }}" alt="" loading="lazy">
                        @if ($i === 0)
                            <span class="rea-photo__expand">{{ $icon('expand') }}</span>
                            @if ($property['more_photos'] > 0)
                                <span class="rea-photo__more">+{{ $property['more_photos'] }} More Photos</span>
                            @endif
                        @endif
                    </button>
                @endforeach
            </div>
        @else
            @if ($head ?? false)
                <header class="rea-sec-head">
                    <div class="rea-section-head">
                        <p class="rea-eyebrow rea-eyebrow--dark">PHOTOS</p>
                        <h2>{{ $pages['gallery']['title'] }}</h2>
                        <p>{{ $pages['gallery']['subtitle'] }}</p>
                    </div>
                </header>
            @endif
            <div class="rea-gallerygrid">
                @foreach ($photos as $i => $photo)
                    <button class="rea-photo" type="button" data-gallery-open="{{ $i }}" aria-label="Open photo: {{ $photo['alt'] }}">
                        <img src="{{ $photo['src'] }}" alt="" loading="lazy">
                        <span class="rea-photo__cap">{{ $photo['alt'] }}</span>
                    </button>
                @endforeach
            </div>
        @endif

        {{-- Lightbox --}}
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
    </div>
</section>
