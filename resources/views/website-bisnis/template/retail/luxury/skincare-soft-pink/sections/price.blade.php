@php
    $full  = $full ?? false;
    $items = $full ? $cfg['products'] : array_slice($cfg['products'], 0, 5);
@endphp
<section id="price" class="panel {{ $full ? 'panel--full' : 'panel--preview' }}" @if ($full) data-filter-scope @endif>
    <div class="sec-head">
        <div>
            <h2>Daftar Harga</h2>
            <p>Harga resmi Belleza, sudah termasuk PPN. Gratis ongkir min. Rp {{ number_format($cfg['free_shipping_min'], 0, ',', '.') }}.</p>
        </div>
        @unless ($full)
            <a class="more" href="{{ route($rp . 'price') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        @endunless
    </div>

    @if ($full)
        @include($ns . '.partials.filter-bar', ['placeholder' => 'Cari nama produk...'])
    @endif

    <div class="table-wrap">
        <table class="ptable">
            <thead>
                <tr>
                    <th scope="col">Produk</th>
                    <th scope="col" class="col-cat">Kategori</th>
                    <th scope="col" class="col-old">Harga Normal</th>
                    <th scope="col">Harga Belleza</th>
                    <th scope="col">Hemat</th>
                    <th scope="col">Stok</th>
                    <th scope="col"><span class="sr-only">Aksi</span></th>
                </tr>
            </thead>
            <tbody @if ($full) data-grid @endif>
                @foreach ($items as $p)
                    <tr data-item data-id="{{ $p['id'] }}" data-name="{{ mb_strtolower($p['name']) }}" data-cat="{{ $p['category'] }}" data-status="{{ $p['status'] }}" data-price="{{ $p['price'] }}" data-rating="{{ $p['rating'] }}">
                        <td data-label="Produk">
                            <div class="pcell">
                                <img src="{{ $img }}/{{ $p['image'] }}" alt="" width="56" height="56" loading="lazy">
                                <span><strong>{{ $p['name'] }}</strong><small>{{ $p['size'] }}</small></span>
                            </div>
                        </td>
                        <td data-label="Kategori" class="col-cat">{{ $p['category_name'] }}</td>
                        <td data-label="Harga Normal" class="col-old"><s>{{ $p['old_fmt'] }}</s></td>
                        <td data-label="Harga Belleza"><strong class="price-now">{{ $p['price_fmt'] }}</strong></td>
                        <td data-label="Hemat">@if ($p['discount'])<span class="save">-{{ $p['discount'] }}%</span>@else - @endif</td>
                        <td data-label="Stok"><span class="stock stock--{{ $p['status'] }}"><i class="bi bi-circle-fill" aria-hidden="true"></i> {{ $p['status_label'] }}</span></td>
                        <td class="ptable__act">
                            @include($ns . '.partials.add-control', ['p' => $p, 'mode' => 'sm'])
                            <a class="btn btn--ghost btn--sm" href="{{ route($rp . 'inquiry', ['topic' => 'harga', 'product' => $p['slug']]) }}" aria-label="Tanya harga {{ $p['name'] }}"><i class="bi bi-chat-heart" aria-hidden="true"></i> Tanya</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($full)
        <div class="empty" data-empty hidden>
            <i class="bi bi-search-heart" aria-hidden="true"></i>
            <p>Harga produk tidak ditemukan. Coba kata kunci atau kategori lain.</p>
            <button class="btn btn--ghost btn--sm" type="button" data-reset>Reset filter</button>
        </div>
    @endif
</section>
