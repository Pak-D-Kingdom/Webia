@php
    $full  = $full ?? false;
    $all   = collect($cfg['products']);
    $items = $full ? $all : $all->sortBy('stock')->take(4);
    $count = fn (string $s) => $all->where('status', $s)->count();
@endphp
<section id="stock" class="panel {{ $full ? 'panel--full' : 'panel--preview' }}" @if ($full) data-filter-scope @endif>
    <div class="sec-head">
        <div>
            <h2>Stok &amp; Ketersediaan</h2>
            <p>Cek ketersediaan produk Belleza secara langsung sebelum memesan.</p>
        </div>
        @unless ($full)
            <a class="more" href="{{ route($rp . 'stock') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        @endunless
    </div>

    <ul class="sumbar">
        <li><strong>{{ $all->count() }}</strong><span>Total produk</span></li>
        <li class="is-in"><strong>{{ $count('in') }}</strong><span>Tersedia</span></li>
        <li class="is-low"><strong>{{ $count('low') }}</strong><span>Menipis</span></li>
        <li class="is-out"><strong>{{ $count('out') }}</strong><span>Habis</span></li>
    </ul>

    @if ($full)
        @include($ns . '.partials.filter-bar', ['withSort' => false, 'withStatus' => true, 'placeholder' => 'Cari produk untuk cek stok...'])
    @endif

    <div class="sgrid" @if ($full) data-grid @endif>
        @foreach ($items as $p)
            <article class="scard" data-item data-id="{{ $p['id'] }}" data-name="{{ mb_strtolower($p['name']) }}" data-cat="{{ $p['category'] }}" data-status="{{ $p['status'] }}" data-price="{{ $p['price'] }}" data-rating="{{ $p['rating'] }}">
                <img src="{{ $img }}/{{ $p['image'] }}" alt="{{ $p['name'] }}" width="486" height="342" loading="lazy">
                <div class="scard__body">
                    <div class="scard__top">
                        <h3>{{ $p['name'] }}</h3>
                        <span class="stock stock--{{ $p['status'] }}"><i class="bi bi-circle-fill" aria-hidden="true"></i> {{ $p['status_label'] }}</span>
                    </div>
                    <p class="scard__meta">{{ $p['size'] }} | {{ $p['category_name'] }}</p>
                    <div class="meter meter--{{ $p['status'] }}" role="img" aria-label="Sisa stok {{ $p['stock'] }} unit"><span style="width: {{ $p['stock'] > 0 ? max(6, $p['stock_pct']) : 0 }}%"></span></div>
                    <p class="scard__qty">@if ($p['stock'] > 0)<strong>{{ $p['stock'] }}</strong> unit tersisa @else Sedang kosong, restock segera @endif</p>
                    <div class="scard__act">
                        @if ($p['status'] === 'out')
                            <a class="btn btn--ghost btn--sm" href="{{ route($rp . 'inquiry', ['topic' => 'stok', 'product' => $p['slug']]) }}"><i class="bi bi-bell" aria-hidden="true"></i> Tanya restock</a>
                        @else
                            <button class="btn btn--rose btn--sm" type="button" data-add="{{ $p['id'] }}"><i class="bi bi-plus-lg" aria-hidden="true"></i> Keranjang</button>
                            <a class="btn btn--ghost btn--sm" href="{{ route($rp . 'inquiry', ['topic' => 'stok', 'product' => $p['slug']]) }}">Cek stok</a>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    @if ($full)
        <div class="empty" data-empty hidden>
            <i class="bi bi-search-heart" aria-hidden="true"></i>
            <p>Produk tidak ditemukan untuk filter ini.</p>
            <button class="btn btn--ghost btn--sm" type="button" data-reset>Reset filter</button>
        </div>
    @endif
</section>
