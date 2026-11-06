{{-- Katalog produk. $full = false → preview beranda (5 produk), true → halaman katalog lengkap --}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $full ??= false;
@endphp
@if($full)
    <section class="container section catalog" id="katalog" data-catalog>
        <div class="toolbar">
            <div class="chips" role="group" aria-label="Filter kategori">
                <button type="button" class="chip is-active" data-filter-category="all">Semua</button>
                @foreach($cfg['categories'] as $c)
                    <button type="button" class="chip" data-filter-category="{{ $c['key'] }}">{{ $c['label'] }}</button>
                @endforeach
            </div>
            <div class="toolbar__right">
                <div class="search search--sm" id="cari">
                    <label class="sr-only" for="catalog-search">Cari produk</label>
                    <svg class="ico" aria-hidden="true"><use href="#i-search"/></svg>
                    <input id="catalog-search" type="search" placeholder="Cari produk..." data-catalog-search>
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

        <div class="pgrid pgrid--full" data-catalog-grid>
            @foreach($cfg['products'] as $p)
                @include($cfg['view'] . 'partials.product-card', ['p' => $p, 'mode' => 'catalog'])
            @endforeach
        </div>

        <div class="empty" data-catalog-empty hidden>
            <svg class="ico"><use href="#i-leaf"/></svg>
            <p>Produk yang kamu cari belum ditemukan.</p>
            <a class="btn btn--primary" href="{{ route($cfg['route'] . 'inquiry') }}">Tanyakan ke Tim Kami</a>
        </div>
    </section>
@else
    <section class="panel catalog-preview" aria-labelledby="best-title">
        <div class="panel__head">
            <div>
                <h2 id="best-title">Produk Terlaris</h2>
                <p>Produk favorit yang paling banyak dibeli pelanggan kami.</p>
            </div>
            <a class="link-arrow" href="{{ route($cfg['route'] . 'catalog') }}">Lihat Semua <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
        <div class="pgrid pgrid--preview">
            @foreach($cfg['products'] as $p)
                @if($loop->index < 5)
                    @include($cfg['view'] . 'partials.product-card', ['p' => $p, 'mode' => 'home'])
                @endif
            @endforeach
        </div>
    </section>
@endif
