{{-- Bar filter bersama. Variabel opsional: $withStatus, $withSort (default true), $placeholder --}}
@php $withSort = $withSort ?? true; $withStatus = $withStatus ?? false; @endphp
<div class="fbar">
    <label class="fbar__search">
        <i class="bi bi-search" aria-hidden="true"></i>
        <input type="search" data-q placeholder="{{ $placeholder ?? 'Cari produk...' }}" aria-label="Cari produk">
    </label>
    @if ($withSort)
        <label class="fbar__sort">
            <span class="sr-only">Urutkan</span>
            <select data-sort aria-label="Urutkan produk">
                <option value="default">Urutan default</option>
                <option value="price-asc">Harga terendah</option>
                <option value="price-desc">Harga tertinggi</option>
                <option value="rating">Rating tertinggi</option>
            </select>
        </label>
    @endif
</div>
<div class="fchips" role="group" aria-label="Filter kategori">
    <button type="button" class="fchip is-active" data-cat-filter="all" aria-pressed="true">Semua</button>
    @foreach ($cfg['categories'] as $cat)
        <button type="button" class="fchip" data-cat-filter="{{ $cat['slug'] }}" aria-pressed="false">{{ $cat['name'] }}</button>
    @endforeach
</div>
@if ($withStatus)
    <div class="fchips fchips--status" role="group" aria-label="Filter status stok">
        <button type="button" class="fchip is-active" data-status-filter="all" aria-pressed="true">Semua stok</button>
        <button type="button" class="fchip" data-status-filter="in" aria-pressed="false">Tersedia</button>
        <button type="button" class="fchip" data-status-filter="low" aria-pressed="false">Menipis</button>
        <button type="button" class="fchip" data-status-filter="out" aria-pressed="false">Habis</button>
    </div>
@endif
<p class="fcount"><span data-count></span></p>
