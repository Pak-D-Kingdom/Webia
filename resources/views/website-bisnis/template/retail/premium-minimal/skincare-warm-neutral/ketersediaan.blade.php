@extends($ns . '.layouts.app')

@section('title', 'Ketersediaan Stok — ' . $skin['name'])
@section('description', 'Cek ketersediaan stok produk GlowEra sebelum memesan.')

@section('content')
    @php
        $prods = collect($skin['products']);
        $cIn   = $prods->filter(fn ($p) => $p['stock'] > 10)->count();
        $cLow  = $prods->filter(fn ($p) => $p['stock'] > 0 && $p['stock'] <= 10)->count();
        $cOut  = $prods->filter(fn ($p) => $p['stock'] <= 0)->count();
    @endphp

    @include($ns . '.partials.page-header', ['title' => 'Ketersediaan', 'text' => 'Pantau stok produk favoritmu. Ketersediaan dapat berubah sewaktu-waktu.'])

    <section class="section section--pt0">
        <div class="container" data-filter-scope>
            <div class="sumcards">
                <div class="sumcard sumcard--in"><i class="bi bi-check-circle"></i><span>Tersedia<b>{{ $cIn }} produk</b></span></div>
                <div class="sumcard sumcard--low"><i class="bi bi-exclamation-circle"></i><span>Terbatas<b>{{ $cLow }} produk</b></span></div>
                <div class="sumcard sumcard--out"><i class="bi bi-x-circle"></i><span>Habis<b>{{ $cOut }} produk</b></span></div>
            </div>

            <div class="toolbar">
                <label class="searchbox"><i class="bi bi-search"></i>
                    <input type="search" data-filter-q placeholder="Cari produk untuk cek stok..." aria-label="Cari produk">
                </label>
                <div class="chips chips--row" role="group" aria-label="Status stok">
                    <button type="button" class="chip is-active" data-filter-status data-value="all">Semua</button>
                    <button type="button" class="chip" data-filter-status data-value="in">Tersedia</button>
                    <button type="button" class="chip" data-filter-status data-value="low">Terbatas</button>
                    <button type="button" class="chip" data-filter-status data-value="out">Habis</button>
                </div>
            </div>
            <p class="count" aria-live="polite">Menampilkan <b data-filter-count>{{ count($skin['products']) }}</b> produk</p>

            <div class="sgrid sgrid--page" data-filter-list>
                @foreach ($skin['products'] as $p)
                    @include($ns . '.partials.stock-card', ['p' => $p])
                @endforeach
            </div>

            <div class="empty" data-filter-empty hidden><i class="bi bi-search-heart"></i><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau status stok lain.</p></div>
        </div>
    </section>
@endsection
