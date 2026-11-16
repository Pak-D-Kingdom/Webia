<div class="uh-search" data-uh-search hidden>
    <div class="uh-search__backdrop" data-uh-search-close></div>
    <div class="uh-search__dialog" role="dialog" aria-modal="true" aria-label="Cari di situs">
        <div class="uh-search__top">
            <span class="uh-search__crest" aria-hidden="true"><svg class="uh-i"><use href="#i-kaaba"/></svg></span>
            <div>
                <strong class="uh-search__title">Cari di {{ $uh['brand']['name'] }}</strong>
                <span class="uh-search__sub">Paket, jadwal, harga, hotel, dan persyaratan</span>
            </div>
            <button type="button" class="uh-search__close" data-uh-search-close aria-label="Tutup pencarian">
                <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>

        <form class="uh-search__form" role="search" data-uh-search-form>
            <svg class="uh-i uh-search__lens" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" class="uh-search__input" data-uh-search-input placeholder="Ketik kata kunci, misalnya “umrah vip”…" autocomplete="off" aria-label="Kata kunci pencarian" aria-controls="uh-search-results">
            <button type="button" class="uh-search__clear" data-uh-search-clear aria-label="Hapus kata kunci" hidden>
                <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
            <kbd class="uh-search__kbd" aria-hidden="true">Esc</kbd>
        </form>

        <div class="uh-search__tabs" role="tablist" aria-label="Saring hasil" data-uh-search-tabs hidden>
            <button type="button" role="tab" class="is-active" aria-selected="true" data-uh-search-tab="all">Semua</button>
            <button type="button" role="tab" aria-selected="false" data-uh-search-tab="Halaman">Halaman</button>
            <button type="button" role="tab" aria-selected="false" data-uh-search-tab="Paket">Paket</button>
        </div>

        <div class="uh-search__body">
            <div class="uh-search__home" data-uh-search-home>
                <p class="uh-search__label">Akses cepat</p>
                <div class="uh-search__quick">
                    @foreach ($uh['search_quick'] as $q)
                        <a class="uh-search__tile" href="{{ $url($q[1]) }}">
                            <span class="uh-search__tico"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $q[2] }}"/></svg></span>
                            <span>{{ $q[0] }}</span>
                        </a>
                    @endforeach
                    <button type="button" class="uh-search__tile uh-search__tile--ai" data-uh-chat-open data-uh-search-close>
                        <span class="uh-search__tico"><svg class="uh-i" aria-hidden="true"><use href="#i-message"/></svg></span>
                        <span>Tanya AI</span>
                    </button>
                </div>

                <p class="uh-search__label">Pencarian populer</p>
                <div class="uh-search__popular">
                    @foreach ($uh['search_popular'] as $pop)
                        <button type="button" class="uh-chip uh-chip--sm" data-uh-search-term="{{ $pop[1] }}">{{ $pop[0] }}</button>
                    @endforeach
                </div>

                <div data-uh-search-recent-wrap hidden>
                    <p class="uh-search__label">Terakhir dibuka <button type="button" class="uh-search__wipe" data-uh-search-wipe>Hapus riwayat</button></p>
                    <ul class="uh-search__recent" data-uh-search-recent></ul>
                </div>
            </div>

            <ul class="uh-search__results" id="uh-search-results" data-uh-search-results role="listbox" aria-label="Hasil pencarian" hidden></ul>
        </div>

        <p class="uh-search__hint"><span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>/</kbd> cari</span><span><kbd>Esc</kbd> tutup</span></p>
    </div>
</div>
