{{-- Parameter: $which = 'collection' | 'care' --}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
    $b = $cfg['banners'][$which];
@endphp
@if($which === 'collection')
    <aside class="banner banner--collection" aria-label="Koleksi">
        <svg class="deco deco--banner" aria-hidden="true"><use href="#i-branch"/></svg>
        <div class="banner__copy">
            <h2>{{ $b['title'] }}</h2>
            <p>{{ $b['text'] }}</p>
            <a class="btn btn--primary btn--sm" href="{{ route($cfg['route'] . 'catalog') }}">{{ $b['cta'] }} <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
        <img class="banner__img" src="{{ $img }}/{{ $b['image'] }}" alt="Krim alami PureGlow di atas batu" width="210" height="150" loading="lazy">
    </aside>
@else
    <aside class="banner banner--care" aria-label="Promo perawatan">
        <img class="banner__img" src="{{ $img }}/{{ $b['image'] }}" alt="Wanita merawat kulit wajah" width="178" height="109" loading="lazy">
        <div class="banner__copy">
            <h2>{{ $b['title'] }}</h2>
            <p>{{ $b['text'] }}</p>
            <a class="btn btn--primary btn--sm" href="{{ route($cfg['route'] . 'shop') }}">{{ $b['cta'] }} <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
        <svg class="deco deco--banner-r" aria-hidden="true"><use href="#i-branch"/></svg>
    </aside>
@endif
