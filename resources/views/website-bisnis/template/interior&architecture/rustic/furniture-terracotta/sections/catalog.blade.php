@php
    $cats   = collect($f['categories'])->keyBy('key');
    $counts = collect($f['products'])->countBy('category');
    $total  = count($f['products']);
@endphp
<section class="rf-section" data-rf-catalog>
    <div class="rf-container">
        <div class="rf-filterbar rf-card">
            <div class="rf-filterbar__top">
                <label class="rf-search">
                    <span class="rf-sr">Cari produk</span>{!! $icon('search') !!}
                    <input type="search" placeholder="Cari sofa, meja, kursi, jati..." data-rf-search autocomplete="off">
                    <button class="rf-search__clear" type="button" data-rf-search-clear aria-label="Hapus pencarian" hidden>{!! $icon('close') !!}</button>
                </label>
                <label class="rf-select">
                    <span class="rf-sr">Urutkan produk</span>{!! $icon('sliders') !!}
                    <select data-rf-sort>
                        <option value="default">Urutan unggulan</option>
                        <option value="name">Nama A–Z</option>
                        <option value="size">Ukuran terbesar</option>
                    </select>
                    {!! $icon('chevron-down') !!}
                </label>
            </div>

            <div class="rf-filterbar__chips" role="group" aria-label="Filter kategori">
                <button class="rf-chip is-active" type="button" data-rf-filter="all" aria-pressed="true">Semua <em>{{ $total }}</em></button>
                @foreach ($f['categories'] as $c)
                    <button class="rf-chip" type="button" data-rf-filter="{{ $c['key'] }}" aria-pressed="false">{{ $c['label'] }} <em>{{ $counts[$c['key']] ?? 0 }}</em></button>
                @endforeach
                <button class="rf-chip" type="button" data-rf-filter="fav" aria-pressed="false">{!! $icon('heart') !!} Favorit <em data-rf-fav-count>0</em></button>
            </div>

            <div class="rf-filterbar__meta">
                <p class="rf-count" aria-live="polite"><b data-rf-result-count>{{ $total }}</b> produk ditemukan</p>
                <button class="rf-reset" type="button" data-rf-reset hidden>{!! $icon('close') !!} Reset filter</button>
            </div>
        </div>

        <div class="rf-grid rf-grid--products" data-rf-grid>
            @foreach ($f['products'] as $i => $p)
                <article class="rf-product rf-card" data-rf-product data-id="{{ $p['id'] }}" data-cat="{{ $p['category'] }}"
                         data-name="{{ \Illuminate\Support\Str::lower($p['name']) }}" data-order="{{ $i }}"
                         data-size="{{ $p['dims'][0] * $p['dims'][1] }}">
                    <figure class="rf-product__media">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy">
                        <button class="rf-wish" type="button" data-rf-wish="{{ $p['id'] }}" aria-pressed="false" aria-label="Simpan {{ $p['name'] }} ke favorit">{!! $icon('heart') !!}</button>
                    </figure>
                    <div class="rf-product__body">
                        <p class="rf-product__cat">{{ $cats[$p['category']]['label'] }}</p>
                        <h3>{{ $p['name'] }}</h3>
                        <p class="rf-product__sum">{{ $p['summary'] }}</p>
                        <dl class="rf-spec">
                            <div><dt>Material</dt><dd>{{ $p['material'] }}</dd></div>
                            <div><dt>Ukuran</dt><dd>{{ implode(' × ', $p['dims']) }} cm</dd></div>
                        </dl>
                        <div class="rf-product__actions">
                            <button class="rf-btn rf-btn--ghost rf-btn--sm" type="button" data-rf-detail="{{ $p['id'] }}">Detail</button>
                            <div class="rf-quote" data-rf-quote-ctl="{{ $p['id'] }}">
                                <button class="rf-btn rf-btn--solid rf-btn--sm" type="button" data-rf-quote-add="{{ $p['id'] }}">{!! $icon('plus') !!} Penawaran</button>
                                <div class="rf-stepper" role="group" aria-label="Jumlah {{ $p['name'] }} di daftar penawaran" hidden>
                                    <button type="button" data-rf-quote-dec="{{ $p['id'] }}" aria-label="Kurangi jumlah">−</button>
                                    <output aria-live="polite"><span data-rf-q-qty>1</span><small>di penawaran</small></output>
                                    <button type="button" data-rf-quote-inc="{{ $p['id'] }}" aria-label="Tambah jumlah">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="rf-empty" data-rf-empty hidden>
            <p>Belum ada produk yang cocok. Coba kata kunci lain, atau ceritakan kebutuhan Anda lewat Custom Order.</p>
            <a class="rf-btn rf-btn--solid" href="{{ $r('order-form') }}">Buat Custom Order {!! $icon('arrow-right') !!}</a>
        </div>
    </div>

    <dialog class="rf-modal rf-modal--product" id="rf-product-modal" aria-label="Detail produk">
        <button class="rf-modal__close" type="button" data-rf-modal-close aria-label="Tutup detail">{!! $icon('close') !!}</button>
        <div data-rf-product-detail></div>
    </dialog>
</section>
