@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $g = $f['gallery'];
@endphp
<article class="lf-card lf-card--dark lf-gallerybar">
    <div class="lf-gallerybar__copy">
        <h2 class="lf-card__title lf-serif">{{ $g['title'] }}</h2>
        <p class="lf-card__text">{{ $g['text'] }}</p>
        <a class="lf-btn lf-btn--outline lf-btn--sm" href="{{ $r('gallery') }}">Lihat Semua Project <svg class="ic"><use href="#i-arrow"/></svg></a>
    </div>
    <div class="lf-gallerybar__slider" data-slider>
        <button class="lf-slider-btn lf-slider-btn--prev" type="button" data-slider-prev aria-label="Project sebelumnya"><svg class="ic"><use href="#i-left"/></svg></button>
        <ul class="lf-gallerybar__track" data-slider-track tabindex="0" aria-label="Preview project">
            @foreach (array_slice($g['items'], 0, 6) as $item)
                <li><a href="{{ $r('gallery') }}"><img src="{{ $a($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy"></a></li>
            @endforeach
        </ul>
        <button class="lf-slider-btn lf-slider-btn--next" type="button" data-slider-next aria-label="Project berikutnya"><svg class="ic"><use href="#i-right"/></svg></button>
    </div>
</article>
