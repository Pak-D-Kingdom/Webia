@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $c = $f['custom_design'];
@endphp
<article class="lf-card lf-card--dark lf-card-custom">
    <div class="lf-card-custom__copy">
        <h2 class="lf-card__title lf-serif">{{ $c['title'] }}</h2>
        <p class="lf-card__text">{{ $c['text'] }}</p>
        <a class="lf-btn lf-btn--gold lf-btn--sm" href="{{ $r('custom-design') }}">Mulai Desain Custom <svg class="ic"><use href="#i-arrow"/></svg></a>
    </div>
    <div class="lf-card-custom__img" style="background-image:url('{{ $a($c['image']) }}')" aria-hidden="true"></div>
</article>
