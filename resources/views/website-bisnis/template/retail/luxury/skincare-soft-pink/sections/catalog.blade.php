@php
    $full  = $full ?? false;
    $items = $full ? $cfg['products'] : array_slice($cfg['products'], 0, 5);
@endphp
<section id="catalog" class="panel {{ $full ? 'panel--full' : 'panel--preview' }}" @if ($full) data-filter-scope @endif>
    <div class="sec-head">
        <div>
            <h2>{{ $full ? 'Katalog Produk' : 'Produk Terlaris' }}</h2>
            <p>{{ $full ? 'Seluruh koleksi skincare & beauty Belleza dengan kualitas terbaik.' : 'Produk paling diminati dengan kualitas terbaik dari Belleza.' }}</p>
        </div>
        @unless ($full)
            <a class="more" href="{{ route($rp . 'catalog') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        @endunless
    </div>

    @if ($full)
        @include($ns . '.partials.filter-bar', ['placeholder' => 'Cari produk, skincare, makeup...'])
    @endif

    <div class="pgrid {{ $full ? 'pgrid--full' : 'pgrid--preview' }}" @if ($full) data-grid @endif>
        @foreach ($items as $p)
            @include($ns . '.partials.product-card', ['p' => $p])
        @endforeach
    </div>

    @if ($full)
        <div class="empty" data-empty hidden>
            <i class="bi bi-search-heart" aria-hidden="true"></i>
            <p>Produk tidak ditemukan. Coba kata kunci atau kategori lain.</p>
            <button class="btn btn--ghost btn--sm" type="button" data-reset>Reset filter</button>
        </div>
    @endif
</section>
