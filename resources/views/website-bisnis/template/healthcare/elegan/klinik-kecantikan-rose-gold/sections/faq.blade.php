{{-- FAQ. $full=false: 3 pertanyaan di beranda | $full=true: halaman FAQ --}}
@php
    $full = $full ?? false;
    $items = $full ? $c['faq'] : array_slice($c['faq'], 0, 3);
    $cats = collect($c['faq'])->pluck('cat')->unique()->values();
@endphp

@if (! $full)
<section class="rg-card rg-faq" id="faq" aria-labelledby="rgFaqTitle">
    <div class="rg-faq__head">
        <span class="rg-roundicon"><i class="bi bi-patch-question" aria-hidden="true"></i></span>
        <div>
            <h2 id="rgFaqTitle" class="rg-h4">Pertanyaan yang Sering Diajukan</h2>
            <p>Temukan jawaban untuk pertanyaan seputar perawatan, layanan, dan lainnya.</p>
        </div>
    </div>
    <a class="rg-btn rg-btn--outline rg-btn--sm" href="{{ route($rp . 'faq') }}">Lihat Semua FAQ <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
    <div class="rg-acc">
        @foreach ($items as $i => $f)
            @include($tpl . '.partials.faq-item', ['f' => $f, 'n' => 'p' . $i])
        @endforeach
    </div>
</section>
@else
<section class="rg-section" aria-labelledby="rgFaqPageTitle">
    <div class="rg-container rg-narrow">
        <h2 id="rgFaqPageTitle" class="rg-sr">Daftar pertanyaan</h2>
        <div class="rg-toolbar">
            <div class="rg-chips" role="group" aria-label="Filter kategori" data-rg-filter="#rgFaqList">
                <button type="button" class="rg-chip is-active" data-filter="*">Semua</button>
                @foreach ($cats as $cat)
                    <button type="button" class="rg-chip" data-filter="{{ \Illuminate\Support\Str::slug($cat) }}">{{ $cat }}</button>
                @endforeach
            </div>
            <label class="rg-searchbox">
                <i class="bi bi-search" aria-hidden="true"></i>
                <span class="rg-sr">Cari pertanyaan</span>
                <input type="search" placeholder="Cari pertanyaan..." data-rg-search="#rgFaqList">
            </label>
        </div>
        <div class="rg-card rg-acc rg-acc--full" id="rgFaqList">
            @foreach ($items as $i => $f)
                @include($tpl . '.partials.faq-item', ['f' => $f, 'n' => 'f' . $i, 'filter' => true])
            @endforeach
        </div>
        <p class="rg-empty" data-filter-empty hidden><i class="bi bi-search-heart" aria-hidden="true"></i> Pertanyaan tidak ditemukan. Tanyakan lewat WhatsApp atau Beauty Assistant.</p>
    </div>
</section>
@endif
