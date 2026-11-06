@php $full = ($mode ?? 'preview') === 'full'; @endphp
<section class="{{ $full ? 'el-section ' : '' }}el-pricing {{ $full ? 'is-full' : 'el-panel' }}" id="pricing" aria-labelledby="pricingTitle" data-pricing data-discount="{{ $e['billing']['discount'] }}">
    @if ($full)<div class="el-container">@endif
    <header class="el-head el-head--sm">
        <div>
            <h2 class="el-title" id="pricingTitle">{{ $e['pages']['pricing']['title'] }}</h2>
            <p class="el-sub">{{ $e['pages']['pricing']['sub'] }}</p>
        </div>
        <div class="el-billing" role="group" aria-label="Periode tagihan">
            <button type="button" class="is-active" data-billing="monthly" aria-pressed="true">{{ $e['billing']['monthly_label'] }}</button>
            <button type="button" data-billing="yearly" aria-pressed="false">{{ $e['billing']['yearly_label'] }}</button>
            <span class="el-billing__save">-{{ $e['billing']['discount'] }}%</span>
        </div>
    </header>

    <div class="el-plans">
        @foreach ($e['plans'] as $p)
            <article class="el-plan {{ $p['featured'] ? 'is-featured' : '' }}">
                @if (!empty($p['badge']))<span class="el-plan__badge">{{ $p['badge'] }}</span>@endif
                <h3>{{ $p['name'] }}</h3>
                <p class="el-plan__price"><strong data-price="{{ $p['price'] }}">Rp {{ number_format($p['price'], 0, ',', '.') }}</strong><span>/bulan</span></p>
                <p class="el-plan__note" data-note hidden>Ditagih tahunan</p>
                <p class="el-plan__access">{{ $p['access'] }}</p>
                @if ($full)
                    <ul class="el-plan__features">
                        @foreach ($p['features'] as $f)<li><svg class="el-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $f }}</li>@endforeach
                    </ul>
                @endif
                <a class="el-btn {{ $p['featured'] ? 'el-btn--primary' : 'el-btn--soft' }} el-btn--block" href="{{ route('elearning.registration', ['plan' => $p['slug']]) }}">Pilih Paket</a>
            </article>
        @endforeach
    </div>
    @if ($full)</div>@endif
</section>
