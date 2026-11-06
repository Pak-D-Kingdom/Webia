@php
    $promos = config('cafe.promos', []);
    $mode   = config('cafe.promo_mode', 'slider');
    $pv     = max(1, (int) config('cafe.promo_per_view', 1));
@endphp
@if (count($promos))
<section id="promo" class="panel promo-wrap" aria-labelledby="t-promo"
         data-promo data-mode="{{ $mode }}" data-per-view="{{ $pv }}" data-autoplay="{{ (int) config('cafe.promo_autoplay', 0) }}" style="--n:{{ $pv }}">
    <div class="sec-head">
        <h2 id="t-promo">Promo Spesial</h2>
        @if ($mode === 'slider')
            <div class="promo-nav">
                <button type="button" class="promo-btn" data-prev aria-label="Promo sebelumnya"><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                <button type="button" class="promo-btn" data-next aria-label="Promo berikutnya"><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            </div>
        @endif
    </div>
    <div class="promo-track{{ $mode === 'grid' ? ' promo-track--grid' : '' }}" @if ($mode === 'slider') tabindex="0" aria-label="Daftar promo" @endif>
        @foreach ($promos as $p)
            <article class="promo-card promo-card--{{ $p['tone'] ?? 'dark' }}"
                     @if (!empty($p['img'])) style="--promo-img:url('{{ asset("images/$path/" . $p['img']) }}')" @endif>
                <span class="pill">{{ $p['badge'] ?? 'PROMO' }}</span>
                <h3>{{ $p['title'] }}</h3>
                <p>{{ $p['desc'] }}</p>
                @if (!empty($p['icon'])) <span class="promo-card__emoji" aria-hidden="true">{{ $p['icon'] }}</span> @endif
            </article>
        @endforeach
    </div>
    @if ($mode === 'slider') <div class="promo-dots" aria-hidden="false"></div> @endif
</section>
@endif
