@php
    $st  = $p['stock'] <= 0 ? 'out' : ($p['stock'] <= 10 ? 'low' : 'in');
    $pct = $p['stock'] <= 0 ? 0 : min(100, max(6, round($p['stock'] / 50 * 100)));
    $wa  = 'https://wa.me/' . $skin['whatsapp'] . '?text=' . rawurlencode('Halo ' . $skin['name'] . ', ' . ($st === 'out' ? 'tolong kabari saya jika ' . $p['name'] . ' sudah tersedia kembali.' : 'apakah ' . $p['name'] . ' masih tersedia?'));
@endphp
<article class="scard" data-item data-id="{{ $p['id'] }}" data-name="{{ $p['name'] }}" data-category="{{ $p['category'] }}" data-price="{{ $p['price'] }}"
         data-stock="{{ $p['stock'] }}" data-status="{{ $st }}" data-order="{{ $p['id'] }}" data-rating="{{ $p['rating'] }}"
         data-search="{{ strtolower($p['name'] . ' ' . $p['desc'] . ' ' . $p['category']) }}">
    <img class="scard__img" src="{{ asset($skin['img'] . '/' . $p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" width="96" height="96">
    <div class="scard__body">
        <h3>{{ $p['name'] }}</h3>
        <small>{{ $p['size'] }} · Rp {{ number_format($p['price'], 0, ',', '.') }}</small>
        @include($ns . '.partials.stock-badge', ['stock' => $p['stock']])
        <div class="bar bar--{{ $st }}" role="img" aria-label="Level stok {{ $pct }} persen"><i style="width: {{ $pct }}%"></i></div>
        <p class="scard__qty">{{ $p['stock'] > 0 ? 'Sisa ' . $p['stock'] . ' unit' : 'Sedang kosong' }}</p>
        <div class="scard__act">
            @if ($st !== 'out')
                <button type="button" class="btn btn--sm" data-add-cart><i class="bi bi-plus-lg"></i> Keranjang</button>
                <a class="btn btn--sm btn--ghost" href="{{ $wa }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> Cek stok</a>
            @else
                <a class="btn btn--sm" href="{{ $wa }}" target="_blank" rel="noopener"><i class="bi bi-bell"></i> Kabari saya</a>
            @endif
        </div>
    </div>
</article>
