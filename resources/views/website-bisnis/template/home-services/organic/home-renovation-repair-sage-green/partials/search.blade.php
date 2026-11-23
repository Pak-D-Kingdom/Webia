{{-- Pencarian cepat (spotlight): kolom cari bersuara, kategori, daftar berthumbnail + pratinjau. Level body agar selalu di atas konten. --}}
<div class="hr-search" data-search hidden role="dialog" aria-modal="true" aria-label="Pencarian situs">
    <div class="hr-search__bg" aria-hidden="true"><i></i><i></i><i></i></div>
    <div class="hr-search__box">
        <header class="hr-search__top">
            <div class="hr-search__title">
                <span class="hr-search__kicker">{{ $i('sparkle') }} Pencarian cepat</span>
                <strong>Mau cari apa hari ini?</strong>
            </div>
            <button type="button" class="hr-search__esc" data-search-close aria-label="Tutup pencarian">Esc</button>
        </header>

        <form class="hr-search__field" data-search-form role="search">
            <span class="hr-search__lens">{{ $i('search') }}</span>
            <input type="search" data-search-input placeholder="Cari layanan, paket, proyek, area…" autocomplete="off" spellcheck="false" role="combobox" aria-expanded="true" aria-controls="hrSearchResults" aria-autocomplete="list" aria-label="Kata kunci pencarian">
            <button type="button" class="hr-search__mic" data-search-voice aria-label="Cari dengan suara" title="Cari dengan suara" hidden>{{ $i('mic') }}</button>
            <button type="button" class="hr-search__clear" data-search-clear aria-label="Hapus kata kunci" hidden>{{ $i('close') }}</button>
        </form>
        <p class="hr-search__voice" data-search-voice-msg role="status" aria-live="polite" hidden>Mendengarkan… ucapkan kata kunci Anda</p>

        <div class="hr-search__tabs" role="tablist" aria-label="Saring hasil" data-search-tabs>
            <button type="button" role="tab" class="is-on" data-search-tab="all" aria-selected="true">{{ $i('grid') }}<span>Semua</span></button>
            <button type="button" role="tab" data-search-tab="Halaman" aria-selected="false">{{ $i('home') }}<span>Halaman</span></button>
            <button type="button" role="tab" data-search-tab="Layanan" aria-selected="false">{{ $i('wrench') }}<span>Layanan</span></button>
            <button type="button" role="tab" data-search-tab="Paket" aria-selected="false">{{ $i('crown') }}<span>Paket</span></button>
            <button type="button" role="tab" data-search-tab="Proyek" aria-selected="false">{{ $i('folder') }}<span>Proyek</span></button>
            <button type="button" role="tab" data-search-tab="Area" aria-selected="false">{{ $i('pin') }}<span>Area</span></button>
        </div>

        <div class="hr-search__main">
            <div class="hr-search__body" id="hrSearchResults" data-search-results role="listbox" aria-label="Hasil pencarian"></div>
            <aside class="hr-search__preview" data-search-preview aria-live="polite"></aside>
        </div>

        <div class="hr-search__foot">
            <span><kbd>↑</kbd><kbd>↓</kbd> pilih</span>
            <span><kbd>Enter</kbd> buka</span>
            <span><kbd>/</kbd> atau <kbd>Ctrl</kbd>+<kbd>K</kbd> kapan saja</span>
            <span class="hr-search__tip">{{ $i('sparkle') }} Tidak ketemu? Tanya AI Chatbot</span>
        </div>
    </div>
</div>
