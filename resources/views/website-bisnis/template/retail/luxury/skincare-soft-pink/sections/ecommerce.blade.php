@php
    $full  = $full ?? false;
    $items = $cfg['products'];
@endphp
<section id="shop" class="panel {{ $full ? 'panel--full' : 'panel--preview' }}" @if ($full) data-filter-scope @endif>
    <div class="sec-head">
        <div>
            <h2>{{ $full ? 'Toko Online' : 'Belanja Online' }}</h2>
            <p>{{ $full ? 'Pilih produk, masukkan ke keranjang, lalu checkout langsung lewat WhatsApp.' : 'Belanja praktis, pesanan dikonfirmasi lewat WhatsApp.' }}</p>
        </div>
        @unless ($full)
            <a class="more" href="{{ route($rp . 'shop') }}">Buka Toko <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        @endunless
    </div>

    @if ($full)
        <div class="shop">
            <div class="shop__main">
                @include($ns . '.partials.filter-bar', ['placeholder' => 'Cari produk untuk dibeli...'])
                <div class="pgrid pgrid--shop" data-grid>
                    @foreach ($items as $p)
                        @include($ns . '.partials.product-card', ['p' => $p])
                    @endforeach
                </div>
                <div class="empty" data-empty hidden>
                    <i class="bi bi-search-heart" aria-hidden="true"></i>
                    <p>Produk tidak ditemukan. Coba kata kunci atau kategori lain.</p>
                    <button class="btn btn--ghost btn--sm" type="button" data-reset>Reset filter</button>
                </div>
            </div>
            <aside class="shop__cart" aria-label="Keranjang belanja">
                <h3>Keranjang Belanja</h3>
                @include($ns . '.partials.cart-panel')
            </aside>
        </div>
        <button class="shopbar" type="button" data-cart-open>
            <span><i class="bi bi-bag-heart" aria-hidden="true"></i> Keranjang (<span data-cart-qty>0</span>)</span>
            <strong data-cart-total-text>Rp 0</strong>
        </button>
    @else
        @include($ns . '.sections.promos')
    @endif
</section>
