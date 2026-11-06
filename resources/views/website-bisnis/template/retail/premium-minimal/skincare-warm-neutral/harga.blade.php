@extends($ns . '.layouts.app')

@section('title', 'Harga Produk — ' . $skin['name'])
@section('description', 'Daftar harga dan diskon produk skincare GlowEra.')

@section('content')
    @php
        $prods   = collect($skin['products']);
        $minP    = $prods->min('price');
        $maxSave = $prods->map(fn ($p) => ($p['old_price'] ?? 0) > $p['price'] ? round((1 - $p['price'] / $p['old_price']) * 100) : 0)->max();
    @endphp

    @include($ns . '.partials.page-header', ['title' => 'Harga', 'text' => 'Harga transparan dengan diskon hingga ' . $maxSave . '% untuk produk pilihan.'])

    <section class="section section--pt0">
        <div class="container">
            <div class="sumcards">
                <div class="sumcard"><i class="bi bi-tag"></i><span>Harga mulai dari<b>Rp {{ number_format($minP, 0, ',', '.') }}</b></span></div>
                <div class="sumcard"><i class="bi bi-percent"></i><span>Diskon hingga<b>{{ $maxSave }}%</b></span></div>
                <div class="sumcard"><i class="bi bi-truck"></i><span>Gratis ongkir di atas<b>Rp {{ number_format($skin['free_shipping_min'], 0, ',', '.') }}</b></span></div>
            </div>

            <div class="panel panel--flush" data-filter-scope>
                <div class="toolbar toolbar--pad">
                    <label class="searchbox"><i class="bi bi-search"></i>
                        <input type="search" data-filter-q placeholder="Cari produk..." aria-label="Cari produk">
                    </label>
                    <select class="select" data-filter-cat aria-label="Kategori">
                        @foreach ($skin['categories'] as $c)
                            <option value="{{ $c['slug'] }}">{{ $c['label'] }}</option>
                        @endforeach
                    </select>
                    <select class="select" data-filter-sort aria-label="Urutkan harga">
                        <option value="order">Terbaru</option>
                        <option value="price-asc">Harga terendah</option>
                        <option value="price-desc">Harga tertinggi</option>
                    </select>
                </div>
                @include($ns . '.partials.price-table', ['items' => $skin['products'], 'full' => true])
                <div class="empty" data-filter-empty hidden><i class="bi bi-search-heart"></i><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau kategori lain.</p></div>
            </div>
            <p class="note"><i class="bi bi-info-circle"></i> Harga dan promo dapat berubah sewaktu-waktu. Hubungi admin via WhatsApp untuk konfirmasi.</p>
        </div>
    </section>
@endsection
