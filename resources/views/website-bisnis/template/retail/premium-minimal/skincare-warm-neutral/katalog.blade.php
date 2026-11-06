@extends($ns . '.layouts.app')

@section('title', 'Katalog Produk — ' . $skin['name'])
@section('description', 'Jelajahi katalog skincare, makeup, hair care, body care, dan fragrance GlowEra.')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Katalog Produk', 'text' => 'Temukan skincare dan beauty products berkualitas untuk kulit sehat dan glowing.'])

    <section class="section section--pt0">
        <div class="container cat-layout" data-filter-scope>
            <aside class="filters panel" aria-label="Filter produk">
                <h2 class="panel__title panel__title--sm">Kategori</h2>
                <div class="chips chips--col" role="group" aria-label="Kategori">
                    @foreach ($skin['categories'] as $c)
                        <button type="button" class="chip" data-filter-cat data-value="{{ $c['slug'] }}">
                            <i class="bi {{ $c['icon'] }}"></i><span>{{ $c['label'] }}</span>
                        </button>
                    @endforeach
                </div>
                <h2 class="panel__title panel__title--sm">Ketersediaan</h2>
                <label class="check"><input type="checkbox" data-filter-stock> <span>Hanya yang tersedia</span></label>
                <button type="button" class="btn btn--ghost btn--block btn--sm" data-filter-reset><i class="bi bi-arrow-counterclockwise"></i> Reset filter</button>
            </aside>

            <div class="cat-main">
                <div class="toolbar">
                    <label class="searchbox"><i class="bi bi-search"></i>
                        <input type="search" data-filter-q placeholder="Cari produk skincare, makeup, dll..." aria-label="Cari produk">
                    </label>
                    <select class="select" data-filter-sort aria-label="Urutkan produk">
                        <option value="order">Terbaru</option>
                        <option value="price-asc">Harga terendah</option>
                        <option value="price-desc">Harga tertinggi</option>
                        <option value="rating">Rating tertinggi</option>
                    </select>
                </div>
                <p class="count" aria-live="polite">Menampilkan <b data-filter-count>{{ count($skin['products']) }}</b> produk</p>

                <div class="pgrid pgrid--cat" data-filter-list>
                    @foreach ($skin['products'] as $p)
                        @include($ns . '.partials.product-card', ['p' => $p])
                    @endforeach
                </div>

                <div class="empty" data-filter-empty hidden>
                    <i class="bi bi-search-heart"></i>
                    <h3>Produk tidak ditemukan</h3>
                    <p>Coba kata kunci atau kategori lain, atau tanyakan langsung ke admin kami.</p>
                    <a class="btn btn--sm" href="{{ route('skincare-warm-neutral.inquiry') }}">Tanya Admin</a>
                </div>
            </div>
        </div>
    </section>
@endsection
