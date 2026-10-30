{{-- Kartu kecil: $miniTitle, $miniText, $miniImage, $miniRoute, $miniCta --}}
@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<article class="lf-card lf-card--light lf-mini lf-mini--{{ $miniRoute }}">
    <div class="lf-mini__img"><img src="{{ $a($miniImage) }}" alt="{{ $miniTitle }}" loading="lazy"></div>
    <h3 class="lf-mini__title">{{ $miniTitle }}</h3>
    <p class="lf-mini__text">{{ $miniText }}</p>
    <a class="lf-btn lf-btn--brown lf-btn--xs" href="{{ $r($miniRoute) }}">{{ $miniCta }} <svg class="ic"><use href="#i-arrow"/></svg></a>
</article>
