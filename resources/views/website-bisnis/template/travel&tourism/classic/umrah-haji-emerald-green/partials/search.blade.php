<div class="uh-search" data-uh-search hidden>
    <div class="uh-search__backdrop" data-uh-search-close></div>
    <div class="uh-search__dialog" role="dialog" aria-modal="true" aria-label="Cari di situs">
        <form class="uh-search__form" role="search" data-uh-search-form>
            <svg class="uh-i uh-search__lens" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" class="uh-search__input" data-uh-search-input placeholder="Cari paket, jadwal, harga, hotel, persyaratan…" autocomplete="off" aria-label="Kata kunci pencarian" aria-controls="uh-search-results">
            <kbd class="uh-search__kbd" aria-hidden="true">Esc</kbd>
            <button type="button" class="uh-search__close" data-uh-search-close aria-label="Tutup pencarian">
                <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </form>
        <div class="uh-search__popular" data-uh-search-popular>
            <span class="uh-search__plabel">Pencarian populer</span>
            @foreach ($uh['search_popular'] as $pop)
                <button type="button" class="uh-chip uh-chip--sm" data-uh-search-term="{{ $pop[1] }}">{{ $pop[0] }}</button>
            @endforeach
        </div>
        <ul class="uh-search__results" id="uh-search-results" data-uh-search-results role="listbox" aria-label="Hasil pencarian"></ul>
        <p class="uh-search__hint"><span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span></p>
    </div>
</div>
