{{-- Pencarian cepat (command palette). Diletakkan di level body agar selalu di atas konten. --}}
<div class="hr-search" data-search hidden role="dialog" aria-modal="true" aria-label="Pencarian situs">
    <div class="hr-search__box">
        <form class="hr-search__field" data-search-form role="search">
            {{ $i('search') }}
            <input type="search" data-search-input placeholder="Cari layanan, paket, proyek, area…" autocomplete="off" spellcheck="false" aria-label="Kata kunci pencarian" aria-controls="hrSearchResults">
            <button type="button" class="hr-search__clear" data-search-clear aria-label="Hapus kata kunci" hidden>{{ $i('close') }}</button>
            <button type="button" class="hr-search__esc" data-search-close aria-label="Tutup pencarian"><kbd>Esc</kbd></button>
        </form>
        <div class="hr-search__chips" data-search-chips>
            <span>Populer:</span>
            <button type="button" data-search-q="paket">Paket</button>
            <button type="button" data-search-q="survei">Survei</button>
            <button type="button" data-search-q="garansi">Garansi</button>
            <button type="button" data-search-q="area">Area</button>
            <button type="button" data-search-q="interior">Interior</button>
        </div>
        <div class="hr-search__body" id="hrSearchResults" data-search-results role="listbox" aria-label="Hasil pencarian"></div>
        <div class="hr-search__foot">
            <span><kbd>↑</kbd><kbd>↓</kbd> pilih</span>
            <span><kbd>Enter</kbd> buka</span>
            <span class="hr-search__tip">{{ $i('sparkle') }} Tidak ketemu? Tanya AI Chatbot</span>
        </div>
    </div>
</div>
