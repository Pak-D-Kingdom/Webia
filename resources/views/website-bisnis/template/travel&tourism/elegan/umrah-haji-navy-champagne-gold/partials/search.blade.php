<div class="uh-search" id="uh-search" role="dialog" aria-modal="true" aria-label="Pencarian" hidden>
    <div class="uh-search__box">
        <form class="uh-search__form" role="search" onsubmit="return false">
            <svg class="uh-ico" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" id="uh-search-input" placeholder="Cari paket, jadwal, harga, persyaratan..." autocomplete="off" aria-label="Kata kunci pencarian" aria-controls="uh-search-body">
            <button type="button" class="uh-search__esc" data-search-close aria-label="Tutup pencarian">Esc</button>
        </form>
        <div class="uh-search__body" id="uh-search-body"></div>
        <footer class="uh-search__foot" aria-hidden="true">
            <span><kbd>&uarr;</kbd><kbd>&darr;</kbd> pilih</span>
            <span><kbd>Enter</kbd> buka</span>
            <span><kbd>Esc</kbd> tutup</span>
        </footer>
    </div>
</div>
