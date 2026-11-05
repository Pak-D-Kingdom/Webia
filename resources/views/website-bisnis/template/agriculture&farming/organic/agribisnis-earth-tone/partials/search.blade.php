<div class="search" id="searchOverlay" role="dialog" aria-modal="true" aria-label="Pencarian" hidden>
    <div class="search__box">
        <form class="search__form" id="searchForm" action="{{ $u['komoditas'] }}" method="get" role="search">
            <svg class="ico"><use href="#i-search"></use></svg>
            <input type="search" name="q" id="searchInput" placeholder="Cari komoditas atau halaman..." autocomplete="off" aria-label="Kata kunci pencarian" aria-controls="searchResults" role="combobox" aria-expanded="true" aria-autocomplete="list">
            <button class="search__esc" type="button" id="searchClose" aria-label="Tutup pencarian">Esc</button>
        </form>
        <div class="search__results" id="searchResults" role="listbox" aria-label="Hasil pencarian"></div>
        <p class="search__hint"><span><kbd>&uarr;</kbd><kbd>&darr;</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span></p>
    </div>
</div>
