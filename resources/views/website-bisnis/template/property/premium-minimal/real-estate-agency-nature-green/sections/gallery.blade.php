@php
    $g = $items ?? $t['gallery']['items'];
    $isPreview = !empty($preview);
    $titled = $isPreview || !empty($titled);
@endphp
<section class="panel" id="gallery" aria-labelledby="h-gallery">
    @if ($titled)
        <header class="panel__head">
            <div>
                <h2 id="h-gallery" class="panel__title">Gallery</h2>
                <p class="panel__sub">Lihat keindahan properti lebih dekat</p>
            </div>
            @if ($isPreview)<a class="link-all" href="{{ $r('gallery') }}">Lihat Semua <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>@endif
        </header>
    @else
        <h2 id="h-gallery" class="sr-only">Galeri foto</h2>
    @endif

    @if ($isPreview)
        <div class="gal gal--preview">
            <div class="gal__cell gal__cell--main">
                @include($ns.'partials.gallery-item', ['it' => $g[0]])
                <a class="gal__more" href="{{ $r('gallery') }}">+{{ $t['gallery']['more'] }} Foto</a>
            </div>
            <div class="gal__thumbs">
                @foreach (array_slice($g, 1, 3) as $it)
                    <div class="gal__cell">@include($ns.'partials.gallery-item')</div>
                @endforeach
            </div>
        </div>
    @else
        <div class="gal gal--all">
            @foreach ($g as $it)
                <div class="gal__cell">@include($ns.'partials.gallery-item')</div>
            @endforeach
        </div>
    @endif
</section>
