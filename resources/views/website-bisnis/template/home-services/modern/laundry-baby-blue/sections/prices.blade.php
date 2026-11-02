@php
    $mode = $mode ?? 'preview';
    $uid  = 'pr' . \Illuminate\Support\Str::lower(\Illuminate\Support\Str::random(4));
@endphp
<article class="lb-card lb-price {{ $mode === 'full' ? 'lb-card--lg' : '' }}" data-lb-tabs @if ($mode === 'preview') aria-labelledby="{{ $uid }}-title" @endif>
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-tag"/></svg></span>
        <div><h2 class="lb-card__title" id="{{ $uid }}-title">Daftar Harga Laundry</h2><p class="lb-card__sub">Harga transparan, hasil premium!</p></div>
    </header>

    <div class="lb-tabs" role="tablist" aria-label="Tampilan harga">
        <button type="button" role="tab" class="lb-tab is-active" id="{{ $uid }}-t1" aria-controls="{{ $uid }}-p1" aria-selected="true" data-lb-tab>Berdasarkan Item</button>
        <button type="button" role="tab" class="lb-tab" id="{{ $uid }}-t2" aria-controls="{{ $uid }}-p2" aria-selected="false" tabindex="-1" data-lb-tab>Berdasarkan Kg</button>
    </div>

    <div role="tabpanel" id="{{ $uid }}-p1" aria-labelledby="{{ $uid }}-t1" class="lb-tabpanel">
        @if ($mode === 'preview')
            <ul class="lb-pricelist">
                @foreach ($laundry['price_items'] as $g)
                    @foreach ($g['rows'] as $r)
                        @continue(empty($r['preview']))
                        <li class="lb-pricelist__row">
                            <svg class="lb-i lb-pricelist__ico" aria-hidden="true"><use href="#i-{{ $r['icon'] }}"/></svg>
                            <span class="lb-pricelist__name">{{ $r['name'] }}</span>
                            <span class="lb-pricelist__price">{{ $r['price'] }} / {{ $r['unit'] }}</span>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        @else
            <div class="lb-price-groups">
                @foreach ($laundry['price_items'] as $g)
                    <section class="lb-price-group" aria-label="{{ $g['group'] }}">
                        <h3>{{ $g['group'] }}</h3>
                        <ul class="lb-pricelist lb-pricelist--lg">
                            @foreach ($g['rows'] as $r)
                                <li class="lb-pricelist__row">
                                    <svg class="lb-i lb-pricelist__ico" aria-hidden="true"><use href="#i-{{ $r['icon'] }}"/></svg>
                                    <span class="lb-pricelist__name">{{ $r['name'] }}</span>
                                    <span class="lb-pricelist__price">{{ $r['price'] }} / {{ $r['unit'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                @endforeach
            </div>
        @endif
    </div>

    <div role="tabpanel" id="{{ $uid }}-p2" aria-labelledby="{{ $uid }}-t2" class="lb-tabpanel" hidden>
        <ul class="lb-pricelist {{ $mode === 'full' ? 'lb-pricelist--lg' : '' }}">
            @foreach ($laundry['price_kg'] as $r)
                <li class="lb-pricelist__row">
                    <svg class="lb-i lb-pricelist__ico" aria-hidden="true"><use href="#i-washer"/></svg>
                    <span class="lb-pricelist__name">{{ $r['name'] }} @if ($mode === 'full')<small>{{ $r['note'] }}</small>@endif</span>
                    <span class="lb-pricelist__price">{{ $r['price'] }} / kg</span>
                </li>
            @endforeach
        </ul>
    </div>

    @if ($mode === 'preview')
        <a class="lb-btn lb-btn--ghost lb-btn--sm lb-card__link" href="{{ route('webia.laundry-baby-blue.harga') }}">Lihat Harga Lengkap <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    @else
        <ul class="lb-notes">
            @foreach ($laundry['price_notes'] as $n)<li>{{ $n }}</li>@endforeach
        </ul>
    @endif
</article>
