@php $full = $full ?? false; @endphp
<div class="table-wrap">
    <table class="ptable">
        <thead>
            <tr>
                <th scope="col">Produk</th>
                @if ($full)<th scope="col">Kategori</th><th scope="col">Harga Normal</th>@endif
                <th scope="col">Harga</th>
                <th scope="col">Hemat</th>
                <th scope="col">Stok</th>
                <th scope="col"><span class="sr-only">Aksi</span></th>
            </tr>
        </thead>
        <tbody data-filter-list>
            @foreach ($items as $p)
                @php
                    $cat  = collect($skin['categories'])->firstWhere('slug', $p['category'])['label'] ?? '';
                    $save = ($p['old_price'] ?? 0) > $p['price'] ? round((1 - $p['price'] / $p['old_price']) * 100) : 0;
                    $wa   = 'https://wa.me/' . $skin['whatsapp'] . '?text=' . rawurlencode('Halo ' . $skin['name'] . ', saya ingin bertanya harga ' . $p['name'] . '.');
                @endphp
                <tr data-item data-id="{{ $p['id'] }}" data-name="{{ $p['name'] }}" data-category="{{ $p['category'] }}" data-price="{{ $p['price'] }}"
                    data-rating="{{ $p['rating'] }}" data-stock="{{ $p['stock'] }}" data-order="{{ $p['id'] }}"
                    data-search="{{ strtolower($p['name'] . ' ' . $p['desc'] . ' ' . $p['category']) }}">
                    <td data-label="Produk">
                        <div class="prow">
                            <img src="{{ asset($skin['img'] . '/' . $p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" width="56" height="56">
                            <div><b>{{ $p['name'] }}</b><small>{{ $p['size'] }} · {{ $p['desc'] }}</small></div>
                        </div>
                    </td>
                    @if ($full)
                        <td data-label="Kategori">{{ $cat }}</td>
                        <td data-label="Harga Normal"><s class="muted">Rp {{ number_format($p['old_price'], 0, ',', '.') }}</s></td>
                    @endif
                    <td data-label="Harga"><strong class="ptable__price">Rp {{ number_format($p['price'], 0, ',', '.') }}</strong></td>
                    <td data-label="Hemat">@if ($save)<span class="save">-{{ $save }}%</span>@else — @endif</td>
                    <td data-label="Stok">@include($ns . '.partials.stock-badge', ['stock' => $p['stock']])</td>
                    <td data-label="Aksi" class="ptable__act">
                        @if ($p['stock'] > 0)
                            <button type="button" class="btn btn--sm" data-add-cart><i class="bi bi-plus-lg"></i> Keranjang</button>
                        @else
                            <button type="button" class="btn btn--sm" disabled>Habis</button>
                        @endif
                        <a class="icon-btn icon-btn--wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Tanya harga {{ $p['name'] }} via WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
