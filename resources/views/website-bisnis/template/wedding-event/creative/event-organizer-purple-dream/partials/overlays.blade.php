{{-- Search --}}
<div class="eo-search" data-eo-search hidden>
    <div class="eo-search__backdrop" data-eo-search-close></div>
    <div class="eo-search__box" role="dialog" aria-modal="true" aria-label="Cari di {{ $eo['brand']['name'] }}">
        <form class="eo-search__form" data-eo-search-form>
            <svg class="eo-i" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" data-eo-search-input placeholder="Cari layanan, paket, proyek, atau FAQ..." autocomplete="off" aria-label="Kata kunci pencarian">
            <button type="button" class="eo-icon-btn" data-eo-search-close aria-label="Tutup pencarian"><svg class="eo-i" aria-hidden="true"><use href="#i-close"/></svg></button>
        </form>
        <ul class="eo-search__list" data-eo-search-list>
            @foreach($eo['search'] as $entry)
            <li data-kw="{{ $entry['title'] }} {{ $entry['desc'] }} {{ $entry['kw'] }}">
                <a href="{{ url($eo['base'].$entry['path']) }}">
                    <strong>{{ $entry['title'] }}</strong>
                    <span>{{ $entry['desc'] }}</span>
                    <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg>
                </a>
            </li>
            @endforeach
        </ul>
        <p class="eo-search__empty" data-eo-search-empty hidden>Tidak ada hasil. Coba kata kunci lain, misalnya &quot;paket&quot; atau &quot;wedding&quot;.</p>
    </div>
</div>

{{-- Legal modal --}}
<div class="eo-modal" data-eo-legal-modal hidden>
    <div class="eo-modal__backdrop" data-eo-modal-close></div>
    <div class="eo-modal__box" role="dialog" aria-modal="true" aria-labelledby="eo-legal-title">
        <button type="button" class="eo-modal__x" data-eo-modal-close aria-label="Tutup"><svg class="eo-i" aria-hidden="true"><use href="#i-close"/></svg></button>
        @foreach($eo['legal'] as $key => $doc)
        <div class="eo-legal" data-eo-legal-doc="{{ $key }}" hidden>
            <h2 class="eo-legal__title">{{ $doc['title'] }}</h2>
            <ul>
                @foreach($doc['body'] as $line)
                <li>{{ $line }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>

{{-- Lightbox & highlight --}}
<div class="eo-modal eo-modal--wide" data-eo-lightbox-modal hidden>
    <div class="eo-modal__backdrop" data-eo-modal-close></div>
    <div class="eo-modal__box eo-lightbox" role="dialog" aria-modal="true" aria-label="Detail galeri">
        <button type="button" class="eo-modal__x" data-eo-modal-close aria-label="Tutup"><svg class="eo-i" aria-hidden="true"><use href="#i-close"/></svg></button>
        <div class="eo-lightbox__stage">
            <div class="eo-lightbox__slides" data-eo-lb-slides></div>
            <button type="button" class="eo-lightbox__nav eo-lightbox__nav--prev" data-eo-lb-prev aria-label="Sebelumnya"><svg class="eo-i" aria-hidden="true"><use href="#i-chev-left"/></svg></button>
            <button type="button" class="eo-lightbox__nav eo-lightbox__nav--next" data-eo-lb-next aria-label="Berikutnya"><svg class="eo-i" aria-hidden="true"><use href="#i-chev-right"/></svg></button>
            <div class="eo-lightbox__progress" data-eo-lb-progress><i></i></div>
        </div>
        <div class="eo-lightbox__info">
            <span class="eo-tag" data-eo-lb-tag></span>
            <h2 data-eo-lb-title></h2>
            <p class="eo-lightbox__meta" data-eo-lb-meta></p>
            <p data-eo-lb-text></p>
            <a class="eo-btn eo-btn--violet eo-btn--sm" href="{{ url($eo['base'].'/penawaran') }}">Konsultasikan Acara Serupa <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
    </div>
</div>
