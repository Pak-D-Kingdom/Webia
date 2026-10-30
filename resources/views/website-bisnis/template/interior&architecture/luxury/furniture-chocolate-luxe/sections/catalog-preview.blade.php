@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $c = $f['catalog'];
@endphp
<article class="lf-card lf-card--dark lf-panel-catalog">
    <svg class="lf-panel-catalog__leaf" viewBox="0 0 80 100" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.1"><path d="M10 96C16 62 36 30 70 6"/><path d="M18 74c-10-3-14-12-12-22 11 2 16 10 12 22zM28 54c-8-7-9-17-4-26 10 6 12 16 4 26zM40 38c-5-9-4-19 3-26 8 8 7 18-3 26zM26 62c10-2 19 1 24 9-10 5-19 3-24-9zM38 44c9-3 18 0 23 6-9 6-18 5-23-6z"/></svg>
    <div class="lf-panel-catalog__copy">
        <h2 class="lf-card__title lf-serif">{{ $c['title'] }}</h2>
        <p class="lf-card__text">{{ $c['text'] }}</p>
        <a class="lf-btn lf-btn--outline lf-btn--sm" href="{{ $r('catalog') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
    </div>
    <div class="lf-panel-catalog__img" style="background-image:url('{{ $a($c['side_image']) }}')" aria-hidden="true"></div>
</article>
