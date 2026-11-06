{{-- Daftar harga. $full = false → preview beranda, true → halaman harga lengkap --}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
    $full ??= false;
@endphp
<section class="container section {{ $full ? 'price price--full' : 'price price--preview' }}" id="harga" @if($full) data-catalog @endif>
    @if(! $full)
        <div class="section__head">
            <div>
                <p class="eyebrow">Harga Transparan</p>
                <h2>Daftar Harga Produk</h2>
                <p>Harga promo terbaik untuk produk pilihan PureGlow.</p>
            </div>
            <a class="link-arrow" href="{{ route($cfg['route'] . 'price') }}">Lihat Semua Harga <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
    @else
        <div class="toolbar">
            <div class="chips" role="group" aria-label="Filter kategori">
                <button type="button" class="chip is-active" data-filter-category="all">Semua</button>
                @foreach($cfg['categories'] as $c)
                    <button type="button" class="chip" data-filter-category="{{ $c['key'] }}">{{ $c['label'] }}</button>
                @endforeach
            </div>
            <div class="toolbar__right">
                <div class="search search--sm">
                    <label class="sr-only" for="price-search">Cari produk</label>
                    <svg class="ico" aria-hidden="true"><use href="#i-search"/></svg>
                    <input id="price-search" type="search" placeholder="Cari produk..." data-catalog-search>
                </div>
            </div>
        </div>
        <p class="result-count" data-catalog-count aria-live="polite">Menampilkan {{ count($cfg['products']) }} produk</p>
    @endif

    <div class="table-wrap">
        <table class="dtable dtable--price" @if($full) data-catalog-grid @endif>
            <thead>
                <tr>
                    <th scope="col">Produk</th>
                    @if($full)<th scope="col">Kategori</th>@endif
                    <th scope="col">Harga</th>
                    <th scope="col">Hemat</th>
                    <th scope="col">Stok</th>
                    @if($full)<th scope="col"><span class="sr-only">Aksi</span></th>@endif
                </tr>
            </thead>
            <tbody>
                @foreach($cfg['products'] as $p)
                    @if($full || $loop->index < 6)
                        <tr data-product-card data-slug="{{ $p['slug'] }}" data-category="{{ $p['category'] }}" data-name="{{ strtolower($p['name']) }}" data-price="{{ $p['price'] }}" data-status="{{ $p['status'] }}" data-rating="{{ $p['rating'] }}">
                            <td data-label="Produk">
                                <button type="button" class="prod" data-quickview="{{ $p['slug'] }}">
                                    <img src="{{ $img }}/{{ $p['image'] }}" alt="" width="56" height="56" loading="lazy">
                                    <span><strong>{{ $p['name'] }}</strong><small>{{ $p['size'] }}</small></span>
                                </button>
                            </td>
                            @if($full)
                                <td data-label="Kategori">
                                    @foreach($cfg['categories'] as $c)@if($c['key'] === $p['category']){{ $c['label'] }}@endif @endforeach
                                </td>
                            @endif
                            <td data-label="Harga" class="dtable__price">
                                <strong>Rp {{ number_format($p['price'], 0, ',', '.') }}</strong>
                                @if($p['old_price'])<del>Rp {{ number_format($p['old_price'], 0, ',', '.') }}</del>@endif
                            </td>
                            <td data-label="Hemat">
                                @if($p['discount'] > 0)<span class="pill pill--sale">-{{ $p['discount'] }}%</span>@else<span class="muted">—</span>@endif
                            </td>
                            <td data-label="Stok"><span class="stock stock--{{ $p['status'] }}"><i></i>{{ ucfirst($p['status']) }}</span></td>
                            @if($full)
                                <td data-label="Aksi" class="dtable__act">
                                    @if($p['status'] === 'habis')
                                        <a class="btn btn--soft btn--sm" href="https://wa.me/{{ $cfg['whatsapp']['number'] }}?text={{ rawurlencode('Halo PureGlow, saya ingin pre-order ' . $p['name'] . '.') }}" target="_blank" rel="noopener noreferrer">Pre-order</a>
                                    @else
                                        <button type="button" class="btn btn--primary btn--sm" data-add-cart="{{ $p['slug'] }}"><svg class="ico"><use href="#i-plus"/></svg> Keranjang</button>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    @if($full)
        <div class="empty" data-catalog-empty hidden>
            <svg class="ico"><use href="#i-leaf"/></svg>
            <p>Produk yang kamu cari belum ditemukan.</p>
        </div>
        <ul class="notes">
            @foreach($cfg['price_notes'] as $n)
                <li><svg class="ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $n }}</li>
            @endforeach
        </ul>
        <div class="cta-strip">
            <div>
                <h3>Butuh harga khusus reseller atau paket hemat?</h3>
                <p>Tim kami siap memberikan penawaran terbaik lewat WhatsApp.</p>
            </div>
            <a class="btn btn--primary" href="{{ route($cfg['route'] . 'inquiry') }}">Minta Penawaran <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
    @endif
</section>
