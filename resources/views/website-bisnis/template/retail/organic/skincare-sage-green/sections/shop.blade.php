{{-- E-commerce (opsional). $full = false → preview beranda, true → halaman belanja lengkap --}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $full ??= false;
@endphp
@if($full)
    <section class="container section shop" id="belanja" data-catalog>
        <div class="shop__layout">
            <div class="shop__main">
                <div class="toolbar">
                    <div class="chips" role="group" aria-label="Filter kategori">
                        <button type="button" class="chip is-active" data-filter-category="all">Semua</button>
                        @foreach($cfg['categories'] as $c)
                            <button type="button" class="chip" data-filter-category="{{ $c['key'] }}">{{ $c['label'] }}</button>
                        @endforeach
                    </div>
                    <div class="toolbar__right">
                        <div class="search search--sm">
                            <label class="sr-only" for="shop-search">Cari produk</label>
                            <svg class="ico" aria-hidden="true"><use href="#i-search"/></svg>
                            <input id="shop-search" type="search" placeholder="Cari produk..." data-catalog-search>
                        </div>
                        <label class="select">
                            <span class="sr-only">Urutkan</span>
                            <select data-catalog-sort>
                                <option value="default">Urutkan: Terlaris</option>
                                <option value="price-asc">Harga terendah</option>
                                <option value="price-desc">Harga tertinggi</option>
                                <option value="rating">Rating tertinggi</option>
                            </select>
                        </label>
                    </div>
                </div>
                <p class="result-count" data-catalog-count aria-live="polite">Menampilkan {{ count($cfg['products']) }} produk</p>

                <div class="pgrid pgrid--shop" data-catalog-grid>
                    @foreach($cfg['products'] as $p)
                        @include($cfg['view'] . 'partials.product-card', ['p' => $p, 'mode' => 'shop'])
                    @endforeach
                </div>
                <div class="empty" data-catalog-empty hidden>
                    <svg class="ico"><use href="#i-leaf"/></svg>
                    <p>Produk yang kamu cari belum ditemukan.</p>
                </div>
            </div>

            <aside class="summary" aria-labelledby="summary-title" data-cart-summary>
                <h2 id="summary-title">Ringkasan Belanja</h2>
                <div data-summary-body></div>
            </aside>
        </div>

        <div class="steps-wrap">
            <h2 class="steps-title">Cara Belanja</h2>
            @include($cfg['view'] . 'sections.steps')
        </div>
    </section>
@else
    <section class="container section shop-preview" id="belanja">
        <div class="section__head">
            <div>
                <p class="eyebrow">Belanja Online</p>
                <h2>Siap Masuk Keranjang</h2>
                <p>Pilih produk, masukkan ke keranjang, lalu selesaikan pesanan lewat WhatsApp.</p>
            </div>
            <a class="link-arrow" href="{{ route($cfg['route'] . 'shop') }}">Mulai Belanja <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
        <div class="pgrid pgrid--shopprev">
            @foreach($cfg['products'] as $p)
                @if($loop->index > 4 && $loop->index < 9)
                    @include($cfg['view'] . 'partials.product-card', ['p' => $p, 'mode' => 'home'])
                @endif
            @endforeach
        </div>
        @include($cfg['view'] . 'sections.steps')
    </section>
@endif
