@php
    $fl   = $site['fleet'];
    $rp   = $site['route_prefix'];
    $img  = fn ($f) => asset($site['paths']['images'] . $f);
    $full = $full ?? false;
@endphp
<div class="lc-block lc-fleet{{ $full ? ' lc-fleet--full' : '' }}">
    @unless ($full)
        <h2 class="lc-block__title"><a href="{{ route($rp . 'fleet') }}">{{ $fl['title'] }}</a></h2>
        <p class="lc-block__sub">{{ $fl['subtitle'] }}</p>
    @endunless

    <div class="lc-slider" data-lc-slider role="group" aria-roledescription="carousel" aria-label="Foto armada dan gudang">
        <div class="lc-slider__stage">
            @foreach ($fl['slides'] as $i => $sl)
                <figure class="lc-slide lc-slide--{{ $sl['focus'] }}{{ $i === 0 ? ' is-active' : '' }}" data-lc-slide aria-hidden="{{ $i === 0 ? 'false' : 'true' }}">
                    <img src="{{ $img($fl['image']) }}" alt="{{ $sl['caption'] }}" loading="lazy" width="1392" height="243">
                </figure>
            @endforeach
        </div>
        <button class="lc-slider__nav lc-slider__nav--prev" type="button" data-lc-prev aria-label="Foto sebelumnya">
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-chev-l"></use></svg>
        </button>
        <button class="lc-slider__nav lc-slider__nav--next" type="button" data-lc-next aria-label="Foto berikutnya">
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-chev-r"></use></svg>
        </button>
        <div class="lc-slider__dots">
            @foreach ($fl['slides'] as $i => $sl)
                <button type="button" class="{{ $i === 0 ? 'is-active' : '' }}" data-lc-dot="{{ $i }}" aria-label="Foto {{ $i + 1 }}"></button>
            @endforeach
        </div>
    </div>

    <div class="lc-stats lc-stats--fleet">
        @foreach ($fl['stats'] as $st)
            <div class="lc-fstat">
                <span class="lc-fstat__ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $st['icon'] }}"></use></svg></span>
                <div>
                    <strong class="lc-stat__num" data-lc-count="{{ $st['count'] }}" data-suffix="{{ $st['suffix'] }}">{{ number_format($st['count'], 0, ',', '.') . $st['suffix'] }}</strong>
                    <span class="lc-stat__lbl">{{ $st['label'] }}</span>
                    @if ($full)<span class="lc-stat__desc">{{ $st['desc'] }}</span>@endif
                </div>
            </div>
        @endforeach
    </div>
</div>
