<div class="overlay" id="searchOverlay" role="dialog" aria-modal="true" aria-label="Pencarian pintar">
    <div class="search-box">
        <div class="search-top">
            <label class="search-field big">{{ $ic('search') }}<input type="search" id="searchInput" placeholder="Cari aset, kategori, kreator, atau bantuan…" autocomplete="off" aria-label="Kata kunci"><button type="button" class="sf-clear" data-clear="#searchInput" aria-label="Hapus kata kunci">{{ $ic('close', 'ico-sm') }}</button></label>
            <button class="icon-btn" data-close-search aria-label="Tutup pencarian">{{ $ic('close') }}</button>
        </div>
        <div class="search-tabs" id="searchTabs" role="tablist">
            @foreach (['all' => 'Semua', 'asset' => 'Aset', 'cat' => 'Kategori', 'creator' => 'Kreator', 'help' => 'Bantuan'] as $k => $l)
                <button type="button" class="stab {{ $loop->first ? 'on' : '' }}" data-stab="{{ $k }}" role="tab">{{ $l }}<em></em></button>
            @endforeach
        </div>
        <div class="search-quick" id="searchQuick">
            <span class="dim tiny">Filter cepat</span>
            @foreach (['free' => 'Gratis', 'sale' => 'Diskon', 'fresh' => 'Terbaru', 'cheap' => 'Di bawah Rp 150rb'] as $k => $l)
                <button type="button" class="chip" data-sq="{{ $k }}">{{ $l }}</button>
            @endforeach
        </div>
        <div class="search-understood" id="searchUnderstood" hidden></div>
        <div class="search-res" id="searchResults"></div>
        <div class="search-foot">
            <span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span>
            <a href="{{ $u('explore-assets') }}" class="sf-all">Jelajahi semua aset {{ $ic('arrow', 'ico-sm') }}</a>
        </div>
    </div>
</div>
