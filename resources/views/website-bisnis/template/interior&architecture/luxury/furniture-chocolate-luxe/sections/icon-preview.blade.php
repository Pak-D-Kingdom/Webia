{{-- Kartu ikon: $iconName, $iconTitle, $iconText, $iconRoute, $iconCta --}}
@php
    $f = $furniture;
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<article class="lf-card lf-card--light lf-iconcard lf-iconcard--{{ $iconRoute }}">
    <span class="lf-iconcard__icon"><svg class="ic"><use href="#i-{{ $iconName }}"/></svg></span>
    <h3 class="lf-iconcard__title">{{ $iconTitle }}</h3>
    <p class="lf-iconcard__text">{{ $iconText }}</p>
    <a class="lf-btn lf-btn--brown lf-btn--xs" href="{{ $r($iconRoute) }}">{{ $iconCta }} <svg class="ic"><use href="#i-arrow"/></svg></a>
</article>
