@php($r = $e['route'])
@php($full = $full ?? false)
@php($pr = $e['pricing'])
<section @class(['nl-sec nl-sec--pricing', 'nl-card' => ! $full]) id="pricing" aria-labelledby="pricing-title" data-pricing>
    <div class="nl-head">
        <div>
            @if(! $full)<h2 id="pricing-title">{{ $pr['title'] }}</h2>@else<h2 class="nl-sr" id="pricing-title">{{ $pr['title'] }}</h2>@endif
            <p>{{ $pr['text'] }}</p>
        </div>
        <div class="nl-seg" role="group" aria-label="Periode tagihan">
            <button type="button" class="is-on" data-billing="monthly" aria-pressed="true">Bulanan</button>
            <button type="button" data-billing="yearly" aria-pressed="false">Tahunan <span class="nl-save">{{ $pr['saving'] }}</span></button>
        </div>
    </div>

    <div @class(['nl-plans', 'nl-plans--full' => $full])>
        @foreach($pr['plans'] as $p)
            <article @class(['nl-plan', 'is-popular' => $p['popular']])>
                @if($p['popular'])<span class="nl-plan__badge">Populer</span>@endif
                <h3>{{ $p['name'] }}</h3>
                <p class="nl-plan__desc">{{ $p['desc'] }}</p>
                <p class="nl-plan__price">Rp <span data-monthly="{{ number_format($p['monthly'], 0, ',', '.') }}" data-yearly="{{ number_format($p['yearly'], 0, ',', '.') }}">{{ number_format($p['monthly'], 0, ',', '.') }}</span><small>/bulan</small></p>
                @if($full)
                    <ul class="nl-plan__list">
                        @foreach($p['features'] as $f)<li><svg class="ic"><use href="#i-check"/></svg>{{ $f }}</li>@endforeach
                    </ul>
                @endif
                <a class="nl-btn nl-btn--block {{ $p['popular'] ? 'nl-btn--violet' : 'nl-btn--primary' }}" href="{{ route($r.'registration', ['plan' => $p['slug']]) }}">Pilih Paket</a>
            </article>
        @endforeach
    </div>
</section>
