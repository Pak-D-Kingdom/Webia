{{-- FURNITURE CATALOG. Preview menghasilkan 2 sel grid (katalog + gaya); halaman = filter + kartu --}}
@php $preview = $preview ?? false; $k = $cfg['catalog']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--catalog fm-card" data-fm-reveal>
        <div class="fm-pv__lead">
            <p class="fm-eyebrow">{{ $k['eyebrow'] }}</p>
            <h2 class="fm-h3">{{ $k['title'] }}</h2>
            <p class="fm-pv__text">{{ $k['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('catalog') }}">{{ $k['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <ul class="fm-pv__cats">
            @foreach ($k['items'] as $it)
                <li>
                    <a class="fm-minicat" href="{{ $route('catalog') }}?cat={{ $it['slug'] }}">
                        <span class="fm-minicat__img"><img src="{{ $img($it['image']) }}" alt="{{ $it['name'] }}" loading="lazy" decoding="async"></span>
                        <strong>{{ $it['name'] }}</strong>
                        <small>Lihat Koleksi <svg class="fm-i fm-i--xs" aria-hidden="true"><use href="#i-arrow"/></svg></small>
                    </a>
                </li>
            @endforeach
        </ul>
    </article>

    <aside class="fm-pv fm-pv--styles" data-fm-reveal aria-label="Gaya furniture">
        <img class="fm-pv__styleimg" src="{{ $img($k['style_image']) }}" alt="Ruang makan kayu dengan kursi rotan" loading="lazy" decoding="async">
        <ul class="fm-pv__stylelist">
            @foreach ($k['styles'] as $st)
                <li><a href="{{ $route('catalog') }}?style={{ $st }}">{{ $st }}</a></li>
            @endforeach
        </ul>
    </aside>
@else
    <section class="fm-section" data-fm-catalog>
        <div class="fm-container">
            <div class="fm-toolbar">
                <label class="fm-field fm-field--search">
                    <svg class="fm-i" aria-hidden="true"><use href="#i-search"/></svg>
                    <span class="fm-sr">Cari furniture</span>
                    <input type="search" data-fm-cat-q placeholder="Cari sofa, meja, rak, ranjang..." autocomplete="off">
                </label>
                <div class="fm-chips" role="group" aria-label="Filter gaya">
                    <button type="button" class="fm-chip is-active" data-fm-cat-style="" aria-pressed="true">Semua Gaya</button>
                    @foreach ($k['styles'] as $st)
                        <button type="button" class="fm-chip" data-fm-cat-style="{{ $st }}" aria-pressed="false">{{ $st }}</button>
                    @endforeach
                </div>
            </div>
            <p class="fm-count" data-fm-cat-count role="status" aria-live="polite"></p>

            <div class="fm-catgrid" data-fm-cat-grid>
                @foreach ($k['items'] as $it)
                    <article class="fm-catcard" data-fm-reveal data-slug="{{ $it['slug'] }}" data-styles="{{ implode(',', $it['styles']) }}"
                             data-search="{{ \Illuminate\Support\Str::lower($it['name'].' '.$it['text'].' '.implode(' ', $it['types']).' '.implode(' ', $it['materials']).' '.implode(' ', $it['styles'])) }}">
                        <div class="fm-catcard__media">
                            <img src="{{ $img($it['image']) }}" alt="{{ $it['name'] }} WoodenLane" loading="lazy" decoding="async">
                            <button type="button" class="fm-heart" data-fm-heart="{{ $it['slug'] }}" aria-pressed="false" aria-label="Simpan {{ $it['name'] }} ke favorit">
                                <svg class="fm-i" aria-hidden="true"><use href="#i-heart"/></svg>
                            </button>
                        </div>
                        <div class="fm-catcard__body">
                            <h3 class="fm-catcard__title">{{ $it['name'] }}</h3>
                            <p class="fm-catcard__text">{{ $it['text'] }}</p>
                            <ul class="fm-tags" aria-label="Gaya tersedia">
                                @foreach ($it['styles'] as $st)<li>{{ $st }}</li>@endforeach
                            </ul>
                            <ul class="fm-catcard__types">
                                @foreach ($it['types'] as $ty)<li>{{ $ty }}</li>@endforeach
                            </ul>
                            <div class="fm-catcard__actions">
                                <button type="button" class="fm-btn fm-btn--outline fm-btn--sm" data-fm-quick="{{ $it['slug'] }}">Lihat Detail</button>
                                <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('quotation') }}?items={{ $it['slug'] }}">Minta Penawaran</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <p class="fm-empty" data-fm-cat-empty hidden>Tidak ada furniture yang cocok dengan pencarian Anda. Coba kata kunci atau gaya lain.</p>
        </div>

        {{-- Quick view --}}
        <div class="fm-modal" data-fm-quick-modal hidden>
            <div class="fm-modal__backdrop" data-fm-modal-close></div>
            <div class="fm-modal__box" role="dialog" aria-modal="true" aria-labelledby="fm-quick-title">
                <button type="button" class="fm-iconbtn fm-modal__x" data-fm-modal-close aria-label="Tutup detail"><svg class="fm-i" aria-hidden="true"><use href="#i-x"/></svg></button>
                <div class="fm-quick" data-fm-quick-body></div>
            </div>
        </div>
    </section>
    @include($ns.'.partials.cta-band')
@endif
