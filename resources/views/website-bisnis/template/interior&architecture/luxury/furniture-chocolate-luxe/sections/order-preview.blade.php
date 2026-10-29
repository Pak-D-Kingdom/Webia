@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $o = $f['order'];
@endphp
<article class="lf-card lf-card--dark lf-card-order">
    <div class="lf-card-order__img" style="background-image:url('{{ $a($o['image']) }}')" aria-hidden="true"></div>
    <div class="lf-card-order__copy">
        <span class="lf-card-order__icon"><svg class="ic"><use href="#i-form"/></svg></span>
        <h3 class="lf-card__title lf-serif">{{ $o['title'] }}</h3>
        <p class="lf-card__text">{{ $o['text'] }}</p>
        <a class="lf-btn lf-btn--outline lf-btn--xs" href="{{ $r('order') }}">Isi Form <svg class="ic"><use href="#i-arrow"/></svg></a>
    </div>
</article>
