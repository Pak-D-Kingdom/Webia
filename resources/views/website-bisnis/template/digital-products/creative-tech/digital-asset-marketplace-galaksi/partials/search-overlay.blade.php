<div class="overlay" id="searchOverlay" role="dialog" aria-modal="true" aria-label="Pencarian pintar">
    <div class="search-box">
        <div class="search-input">
            {{ $ic('search', 'ico-lg') }}
            <input type="search" id="searchInput" placeholder="Cari aset, kategori, atau kreator…" autocomplete="off" aria-label="Kata kunci">
            <span class="kbd hidden sm:block">ESC</span>
            <button class="icon-btn" data-close-search aria-label="Tutup">{{ $ic('close') }}</button>
        </div>
        <div class="search-res" id="searchResults"></div>
    </div>
</div>
