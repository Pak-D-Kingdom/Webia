@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-catalog">
            @foreach ($f['catalog']['categories'] as $cat)
                <article class="lf-prod" id="{{ $cat['key'] }}">
                    <div class="lf-prod__img"><img src="{{ $a($cat['image']) }}" alt="{{ $cat['name'] }} - {{ $cat['room'] }}" loading="lazy"></div>
                    <div class="lf-prod__body">
                        <p class="lf-tag">{{ $cat['room'] }}</p>
                        <h2 class="lf-prod__name lf-serif">{{ $cat['name'] }}</h2>
                        <p class="lf-prod__text">{{ $cat['text'] }}</p>
                        <ul class="lf-chips">
                            @foreach ($cat['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <div class="lf-prod__actions">
                            <a class="lf-btn lf-btn--brown lf-btn--sm" href="{{ $r('quotation') }}?produk={{ urlencode($cat['name']) }}">Minta Penawaran <svg class="ic"><use href="#i-arrow"/></svg></a>
                            <a class="lf-btn lf-btn--outline-dark lf-btn--sm" href="{{ $r('order') }}?jenis={{ urlencode($cat['name']) }}">Pesan Custom</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
