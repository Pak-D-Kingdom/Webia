<dialog class="bca-search" id="bca-search" aria-label="Pencarian situs" data-bca-search>
    <div class="bca-search__box">
        <div class="bca-search__bar">
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'search'])
            <input type="search" id="bca-search-input" class="bca-search__input" placeholder="Cari layanan, proyek, atau artikel…" autocomplete="off" spellcheck="false" enterkeyhint="search" aria-label="Kata kunci pencarian" data-bca-search-input>
            <button type="button" class="bca-search__clear" data-bca-search-clear aria-label="Hapus kata kunci" hidden>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'close'])</button>
            <button type="button" class="bca-search__esc" data-bca-close aria-label="Tutup pencarian">Esc</button>
        </div>
        <div class="bca-search__sugg">
            <span>Coba:</span>
            @foreach($site['search_suggestions'] as $s)
                <button type="button" data-bca-search-fill="{{ $s }}">{{ $s }}</button>
            @endforeach
        </div>
        <p class="bca-search__count" aria-live="polite" data-bca-search-count></p>
        <ul class="bca-search__list" data-bca-search-list>
            @foreach($site['search'] as $e)
                <li class="bca-hit" data-bca-search-item data-type="{{ $e['type'] }}" data-q="{{ $e['title'] }} {{ $e['text'] }} {{ $e['type'] }} {{ $e['keys'] }}" data-title-q="{{ $e['title'] }}" data-keys="{{ $e['keys'] }}">
                    <a href="{{ route($site['routes'][$e['route']]) }}@if($e['deep'])#{{ $e['deep'] }}@endif">
                        <span class="bca-chip bca-sr__type" data-t="{{ $loop->index % 4 }}">{{ $e['type'] }}</span>
                        <span class="bca-sr__title" data-title>{{ $e['title'] }}</span>
                        <span class="bca-sr__text">{{ $e['text'] }}</span>
                        <span class="bca-sr__go" aria-hidden="true">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow-right'])</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="bca-search__empty" data-bca-search-empty hidden>
            <b>Tidak ada hasil.</b>
            <p>Coba kata lain, misalnya “kemasan”, “logo”, atau “website”.</p>
        </div>
        <p class="bca-search__hint" aria-hidden="true"><span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span></p>
    </div>
</dialog>
