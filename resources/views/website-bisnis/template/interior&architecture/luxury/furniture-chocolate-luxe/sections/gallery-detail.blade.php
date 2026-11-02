@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $g = $f['gallery'];
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-filters" role="group" aria-label="Filter project" data-gallery-filters>
            @foreach ($g['filters'] as $key => $label)
                <button type="button" data-filter="{{ $key }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $label }}</button>
            @endforeach
        </div>

        <ul class="lf-gallery" data-gallery>
            @foreach ($g['items'] as $i => $item)
                <li class="lf-gallery__item" data-type="{{ $item['type'] }}">
                    <button type="button" data-lightbox="{{ $i }}" aria-label="Perbesar foto {{ $item['title'] }}">
                        <img src="{{ $a($item['image']) }}" alt="{{ $item['title'] }}, {{ $item['place'] }}" loading="lazy">
                        <span class="lf-gallery__cap"><strong>{{ $item['title'] }}</strong><small>{{ $item['place'] }}</small></span>
                        <span class="lf-gallery__zoom"><svg class="ic"><use href="#i-zoom"/></svg></span>
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="lf-actions lf-actions--center">
            <a class="lf-btn lf-btn--brown" href="{{ $r('order') }}">Wujudkan Proyek Anda <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    </div>
</section>

<div class="lf-lightbox" data-lightbox-modal role="dialog" aria-modal="true" aria-label="Pratinjau foto project" hidden>
    <button class="lf-lightbox__close" type="button" data-lb-close aria-label="Tutup"><svg class="ic"><use href="#i-close"/></svg></button>
    <button class="lf-lightbox__nav lf-lightbox__nav--prev" type="button" data-lb-prev aria-label="Foto sebelumnya"><svg class="ic"><use href="#i-left"/></svg></button>
    <figure class="lf-lightbox__fig">
        <img src="" alt="" data-lb-img>
        <figcaption data-lb-cap></figcaption>
    </figure>
    <button class="lf-lightbox__nav lf-lightbox__nav--next" type="button" data-lb-next aria-label="Foto berikutnya"><svg class="ic"><use href="#i-right"/></svg></button>
</div>
