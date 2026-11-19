{{-- Pencarian cepat (spotlight): daftar hasil + pratinjau. Diletakkan di level body agar selalu di atas konten. --}}
<div class="hr-search" data-search hidden role="dialog" aria-modal="true" aria-label="Pencarian situs">
    <div class="hr-search__box">
        <form class="hr-search__field" data-search-form role="search">
            <span class="hr-search__lens">{{ $i('search') }}</span>
            <input type="search" data-search-input placeholder="Cari layanan, paket, proyek, area…" autocomplete="off" spellcheck="false" role="combobox" aria-expanded="true" aria-controls="hrSearchResults" aria-autocomplete="list" aria-label="Kata kunci pencarian">
            <button type="button" class="hr-search__clear" data-search-clear aria-label="Hapus kata kunci" hidden>{{ $i('close') }}</button>
            <button type="button" class="hr-search__esc" data-search-close aria-label="Tutup pencarian">Esc</button>
        </form>

        <div class="hr-search__tabs" role="tablist" aria-label="Saring hasil" data-search-tabs>
            <button type="button" role="tab" class="is-on" data-search-tab="all" aria-selected="true">Semua</button>
            <button type="button" role="tab" data-search-tab="Halaman" aria-selected="false">Halaman</button>
            <button type="button" role="tab" data-search-tab="Layanan" aria-selected="false">Layanan</button>
            <button type="button" role="tab" data-search-tab="Paket" aria-selected="false">Paket</button>
            <button type="button" role="tab" data-search-tab="Proyek" aria-selected="false">Proyek</button>
            <button type="button" role="tab" data-search-tab="Area" aria-selected="false">Area</button>
        </div>

        <div class="hr-search__main">
            <div class="hr-search__body" id="hrSearchResults" data-search-results role="listbox" aria-label="Hasil pencarian"></div>
            <aside class="hr-search__preview" data-search-preview aria-live="polite"></aside>
        </div>

        <div class="hr-search__foot">
            <span><kbd>↑</kbd><kbd>↓</kbd> pilih</span>
            <span><kbd>Enter</kbd> buka</span>
            <span><kbd>Esc</kbd> tutup</span>
            <span class="hr-search__tip">{{ $i('sparkle') }} Tidak ketemu? Tanya AI Chatbot</span>
        </div>
    </div>
</div>
