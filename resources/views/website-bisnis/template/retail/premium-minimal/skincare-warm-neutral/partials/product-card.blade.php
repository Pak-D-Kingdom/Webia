@php
    $bc = ['New' => 'new', 'Best Seller' => 'best', 'Sale' => 'sale'][$p['badge'] ?? ''] ?? null;
    $img = asset($skin['img'] . '/' . $p['image']);
    $wa  = 'https://wa.me/' . $skin['whatsapp'] . '?text=' . rawurlencode('Halo ' . $skin['name'] . ', saya ingin bertanya tentang ' . $p['name'] . '.');
@endphp
<article class="pcard" data-item data-id="{{ $p['id'] }}" data-name="{{ $p['name'] }}" data-category="{{ $p['category'] }}"
         data-price="{{ $p['price'] }}" data-rating="{{ $p['rating'] }}" data-stock="{{ $p['stock'] }}" data-order="{{ $p['id'] }}"
         data-search="{{ strtolower($p['name'] . ' ' . $p['desc'] . ' ' . $p['category']) }}">
    <div class="pcard__media">
        @if ($bc)<span class="badge badge--{{ $bc }}">{{ $p['badge'] }}</span>@endif
        <img src="{{ $img }}" alt="{{ $p['name'] }}" loading="lazy" width="392" height="298">
    </div>
    <div class="pcard__body">
        <h3 class="pcard__name">{{ $p['name'] }}</h3>
        <p class="pcard__desc">{{ $p['desc'] }}</p>
        <div class="price">
            <strong>Rp {{ number_format($p['price'], 0, ',', '.') }}</strong>
            @if (($p['old_price'] ?? 0) > $p['price'])<s>Rp {{ number_format($p['old_price'], 0, ',', '.') }}</s>@endif
        </div>
        <div class="pcard__rate"><i class="bi bi-star-fill"></i><b>{{ number_format($p['rating'], 1) }}</b><span>({{ $p['reviews'] }})</span></div>
        <div class="pcard__stock">@include($ns . '.partials.stock-badge', ['stock' => $p['stock']])</div>
        <div class="pcard__actions">
            @if ($p['stock'] > 0)
                <button type="button" class="btn btn--block" data-add-cart><i class="bi bi-plus-lg"></i> Keranjang</button>
            @else
                <button type="button" class="btn btn--block" disabled>Stok Habis</button>
            @endif
            <a class="icon-btn icon-btn--wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Tanya {{ $p['name'] }} via WhatsApp" title="Tanya via WhatsApp"><i class="bi bi-whatsapp"></i></a>
        </div>
    </div>
</article>
