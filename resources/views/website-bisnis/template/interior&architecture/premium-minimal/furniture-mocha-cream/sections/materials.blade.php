{{-- MATERIALS & FINISHES --}}
@php $preview = $preview ?? false; $m = $cfg['materials']; $first = $m['items'][0]; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--material fm-card" data-fm-reveal>
        <div class="fm-pv__lead">
            <p class="fm-eyebrow">{{ $m['eyebrow'] }}</p>
            <h2 class="fm-h3">{{ $m['title'] }}</h2>
            <p class="fm-pv__text">{{ $m['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('materials') }}">{{ $m['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <img class="fm-pv__art fm-pv__art--material" src="{{ $img($m['image']) }}" alt="Sampel papan kayu berbagai tone" loading="lazy" decoding="async">
    </article>
@else
    <section class="fm-section" data-fm-materials>
        <div class="fm-container">
            <header class="fm-sechead"><p class="fm-eyebrow">MATERIAL</p><h2 class="fm-h2">Pilihan material rangka &amp; permukaan</h2></header>
            <div class="fm-matlayout">
                <ul class="fm-matlist" role="list">
                    @foreach ($m['items'] as $i => $it)
                        <li>
                            <button type="button" class="fm-mat {{ $i === 0 ? 'is-active' : '' }}" data-fm-mat="{{ $it['key'] }}" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}">
                                <span class="fm-mat__sw" style="--a: {{ $it['tone'][0] }}; --b: {{ $it['tone'][1] }}"></span>
                                <span class="fm-mat__t"><strong>{{ $it['name'] }}</strong><small>{{ $it['grain'] }}</small></span>
                            </button>
                        </li>
                    @endforeach
                </ul>

                <article class="fm-matdetail fm-card" data-fm-mat-detail aria-live="polite">
                    <div class="fm-matdetail__sw" data-fm-md="sw" style="--a: {{ $first['tone'][0] }}; --b: {{ $first['tone'][1] }}"></div>
                    <div class="fm-matdetail__body">
                        <h3 data-fm-md="name">{{ $first['name'] }}</h3>
                        <p data-fm-md="text">{{ $first['text'] }}</p>
                        <dl class="fm-specs">
                            <div><dt>Karakter serat</dt><dd data-fm-md="grain">{{ $first['grain'] }}</dd></div>
                            <div><dt>Cocok untuk</dt><dd data-fm-md="best">{{ $first['best'] }}</dd></div>
                            <div><dt>Ketahanan</dt>
                                <dd><span class="fm-rating" data-fm-md="rating" data-v="{{ $first['durability'] }}" role="img" aria-label="{{ $first['durability'] }} dari 5">
                                    @for ($r = 1; $r <= 5; $r++)<i class="{{ $r <= $first['durability'] ? 'on' : '' }}"></i>@endfor
                                </span></dd></div>
                        </dl>
                        <a class="fm-btn fm-btn--dark fm-btn--sm" data-fm-md="go" href="{{ $route('custom-order') }}?material={{ rawurlencode($first['name']) }}">Gunakan di Custom Order
                            <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="fm-section fm-section--tint">
        <div class="fm-container">
            <header class="fm-sechead"><p class="fm-eyebrow">FINISHING</p><h2 class="fm-h2">Finishing premium yang tahan lama</h2></header>
            <ul class="fm-finishes">
                @foreach ($m['finishes'] as $f)
                    <li class="fm-card fm-finish" data-fm-reveal>
                        <span class="fm-finish__sw" style="--sw: {{ $f['tone'] }}"></span>
                        <h3>{{ $f['name'] }}</h3>
                        <p>{{ $f['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @include($ns.'.partials.cta-band')
@endif
