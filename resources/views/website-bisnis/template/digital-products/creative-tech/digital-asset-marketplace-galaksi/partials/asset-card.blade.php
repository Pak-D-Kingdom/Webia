{{-- Kartu aset. Param: $a (aset), $rank (opsional) --}}
@php
    $c = $cat($a);
    $off = $a['old'] ? round((1 - $a['price'] / $a['old']) * 100) : 0;
@endphp
<article class="card-asset" data-tilt data-id="{{ $a['id'] }}" data-cat="{{ $a['cat'] }}" data-price="{{ $a['price'] }}" data-rating="{{ $a['rating'] }}" data-sales="{{ $a['sales'] }}" data-days="{{ $a['days'] }}" data-search="{{ strtolower($a['title'] . ' ' . implode(' ', $a['tags']) . ' ' . $c['name'] . ' ' . $cr($a)['name']) }}" data-format="{{ strtolower($a['format']) }}">
    <div class="ca-media">
        <a href="{{ $aurl($a) }}" class="block h-full" aria-label="{{ $a['title'] }}"><img src="{{ $img($a['img']) }}" alt="{{ $a['title'] }}" width="1280" height="720" loading="lazy" decoding="async"></a>
        <div class="ca-badges">
            @if ($a['days'] <= 14)<span class="badge b-new">Baru</span>@endif
            @if ($off)<span class="badge b-sale">-{{ $off }}%</span>@endif
            @if (!$a['price'])<span class="badge b-free">Gratis</span>@endif
            @if ($a['sales'] > 2000)<span class="badge b-hot">Terlaris</span>@endif
        </div>
        @isset($rank)<span class="rank">{{ $rank }}</span>@endisset
        <div class="ca-actions">
            <button type="button" class="ca-btn" data-wish="{{ $a['id'] }}" aria-label="Tambah ke wishlist">{{ $ic('heart', 'ico-sm') }}</button>
            <button type="button" class="ca-btn" data-preview="{{ $a['id'] }}" aria-label="Pratinjau {{ $a['title'] }}">{{ $ic('eye', 'ico-sm') }}</button>
        </div>
    </div>
    <div class="ca-body">
        <span class="ca-cat">{{ $c['name'] }}</span>
        <h3 class="ca-title"><a href="{{ $aurl($a) }}">{{ $a['title'] }}</a></h3>
        <div class="ca-meta">
            <span class="by"><img src="{{ $img($cr($a)['avatar']) }}" alt="" width="24" height="24" loading="lazy"><span>{{ $cr($a)['name'] }}</span></span>
            <span class="flex items-center gap-1">{{ $ic('star', 'ico-sm') }}<b style="color:var(--tx)">{{ $a['rating'] }}</b> ({{ $a['reviews'] }})</span>
        </div>
        <div class="ca-foot">
            <span class="price {{ $a['price'] ? '' : 'free' }}">{{ $rp($a['price']) }}@if ($a['old'])<s>{{ $rp($a['old']) }}</s>@endif</span>
            <button type="button" class="add-btn" data-add="{{ $a['id'] }}" aria-label="Tambah {{ $a['title'] }} ke keranjang">{{ $ic('cart', 'ico-sm') }}</button>
        </div>
    </div>
</article>
