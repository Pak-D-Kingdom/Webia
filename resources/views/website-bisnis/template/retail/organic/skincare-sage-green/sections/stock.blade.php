{{-- Ketersediaan stok. $full = false → preview beranda, true → halaman stok lengkap --}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
    $full ??= false;
@endphp
<section class="{{ $full ? 'container section stock-page' : 'section section--tint stock-preview' }}" id="stok" @if($full) data-stock @endif>
    <div class="{{ $full ? '' : 'container' }}">
        @if(! $full)
            <div class="section__head">
                <div>
                    <p class="eyebrow">Ketersediaan</p>
                    <h2>Cek Stok Real-time</h2>
                    <p>Pastikan produk favoritmu tersedia sebelum checkout.</p>
                </div>
                <a class="link-arrow" href="{{ route($cfg['route'] . 'stock') }}">Lihat Semua Stok <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
            </div>
        @endif

        <ul class="stat-row">
            <li class="stat stat--tersedia"><span class="stat__num">{{ $cfg['stock']['summary']['tersedia'] }}</span><span class="stat__label">Produk Tersedia</span></li>
            <li class="stat stat--terbatas"><span class="stat__num">{{ $cfg['stock']['summary']['terbatas'] }}</span><span class="stat__label">Stok Terbatas</span></li>
            <li class="stat stat--habis"><span class="stat__num">{{ $cfg['stock']['summary']['habis'] }}</span><span class="stat__label">Stok Habis</span></li>
        </ul>

        @if($full)
            <div class="toolbar">
                <div class="chips" role="group" aria-label="Filter status stok">
                    <button type="button" class="chip is-active" data-filter-status="all">Semua</button>
                    <button type="button" class="chip" data-filter-status="tersedia">Tersedia</button>
                    <button type="button" class="chip" data-filter-status="terbatas">Terbatas</button>
                    <button type="button" class="chip" data-filter-status="habis">Habis</button>
                </div>
                <div class="toolbar__right">
                    <div class="search search--sm">
                        <label class="sr-only" for="stock-search">Cari produk</label>
                        <svg class="ico" aria-hidden="true"><use href="#i-search"/></svg>
                        <input id="stock-search" type="search" placeholder="Cari produk..." data-stock-search>
                    </div>
                </div>
            </div>
            <p class="result-count" data-stock-count aria-live="polite">Menampilkan {{ count($cfg['products']) }} produk</p>
        @endif

        <div class="stock-grid" @if($full) data-stock-grid @endif>
            @foreach($cfg['products'] as $p)
                @if($full || $loop->index < 4)
                    <article class="stock-card stock-card--{{ $p['status'] }}" data-stock-item data-name="{{ strtolower($p['name']) }}" data-status="{{ $p['status'] }}">
                        <img src="{{ $img }}/{{ $p['image'] }}" alt="{{ $p['name'] }}" width="72" height="72" loading="lazy">
                        <div class="stock-card__info">
                            <h3>{{ $p['name'] }}</h3>
                            <p>{{ $p['size'] }} · Rp {{ number_format($p['price'], 0, ',', '.') }}</p>
                            <div class="meter" role="img" aria-label="Sisa stok {{ $p['stock'] }} unit">
                                <span style="width: {{ min($p['stock'], 100) }}%"></span>
                            </div>
                            <p class="stock-card__line">
                                <span class="stock stock--{{ $p['status'] }}"><i></i>
                                    @if($p['status'] === 'tersedia') Tersedia @elseif($p['status'] === 'terbatas') Terbatas @else Habis @endif
                                </span>
                                <span class="muted">{{ $p['stock'] }} unit</span>
                            </p>
                            @if($full && $p['status'] === 'habis')
                                <p class="stock-card__note"><svg class="ico"><use href="#i-clock"/></svg>{{ $cfg['stock']['restock_note'] }}</p>
                            @endif
                        </div>
                        @if($full)
                            <div class="stock-card__act">
                                @if($p['status'] === 'habis')
                                    <a class="btn btn--soft btn--sm" href="https://wa.me/{{ $cfg['whatsapp']['number'] }}?text={{ rawurlencode('Halo PureGlow, tolong kabari saya jika ' . $p['name'] . ' sudah tersedia kembali.') }}" target="_blank" rel="noopener noreferrer"><svg class="ico"><use href="#i-bell"/></svg> Kabari Saya</a>
                                @else
                                    <button type="button" class="btn btn--primary btn--sm" data-add-cart="{{ $p['slug'] }}"><svg class="ico"><use href="#i-plus"/></svg> Keranjang</button>
                                @endif
                            </div>
                        @endif
                    </article>
                @endif
            @endforeach
        </div>

        @if($full)
            <div class="empty" data-stock-empty hidden>
                <svg class="ico"><use href="#i-leaf"/></svg>
                <p>Tidak ada produk dengan filter tersebut.</p>
            </div>
        @endif
    </div>
</section>
