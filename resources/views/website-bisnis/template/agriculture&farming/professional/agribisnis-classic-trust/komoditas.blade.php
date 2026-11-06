@extends($v . '.layout')

@section('title', 'Katalog Komoditas — AgroTrade')
@section('description', 'Katalog komoditas AgroTrade: padi, jagung, kopi, kakao, kelapa sawit, karet, lada, teh, sayuran, dan buah-buahan berkualitas ekspor.')

@section('content')
@php
    $img = fn ($f) => asset($agro['img_path'] . '/' . $f);
    $groups = ['Serealia', 'Perkebunan', 'Hortikultura'];
@endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Katalog Komoditas',
    'ph_lead'  => 'Pilihan komoditas unggulan berkualitas ekspor, langsung dari sentra produksi mitra petani kami.',
    'ph_icon'  => 'wheat',
])

<section class="container section">
    <div class="toolbar">
        <label class="search-field" for="cmSearch">
            <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
            <input type="search" id="cmSearch" placeholder="Cari komoditas…" autocomplete="off">
            <button type="button" class="search-field__clear" id="cmClear" aria-label="Hapus pencarian" hidden>
                <svg class="i" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </label>
        <div class="chips" role="group" aria-label="Filter kategori">
            <button type="button" class="chip is-active" data-filter="all" aria-pressed="true">Semua</button>
            @foreach ($groups as $g)
                <button type="button" class="chip" data-filter="{{ $g }}" aria-pressed="false">{{ $g }}</button>
            @endforeach
        </div>
    </div>

    <p class="result-count" id="cmCount" aria-live="polite"></p>

    <div class="cm-grid" id="cmGrid">
        @foreach ($agro['commodities'] as $c)
            <article class="cm-card" id="{{ $c['slug'] }}" data-group="{{ $c['group'] }}" data-name="{{ strtolower($c['name'] . ' ' . $c['tagline'] . ' ' . $c['group']) }}">
                <figure class="cm-card__img">
                    <img src="{{ $img($c['img']) }}" alt="{{ $c['name'] }}" loading="lazy" width="440" height="232">
                    <figcaption><span class="badge">{{ $c['group'] }}</span></figcaption>
                </figure>
                <div class="cm-card__body">
                    <h2><span class="cm-card__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg></span>{{ $c['name'] }}</h2>
                    <p class="cm-card__tag">{{ $c['tagline'] }}</p>
                    <p class="cm-card__desc">{{ $c['desc'] }}</p>
                    <dl class="meta">
                        <div><dt>Asal</dt><dd>{{ $c['origin'] }}</dd></div>
                        <div><dt>Panen</dt><dd>{{ $c['harvest'] }}</dd></div>
                        <div><dt>Min. order</dt><dd>{{ $c['moq'] }}</dd></div>
                        <div><dt>Kapasitas</dt><dd>{{ $c['capacity'] }} / tahun</dd></div>
                    </dl>
                </div>
                <div class="cm-card__foot">
                    <a class="link-amber link-amber--sm" href="{{ route('agribisnis-classic-trust.spesifikasi') }}#{{ $c['slug'] }}">Spesifikasi <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    <a class="btn btn--green btn--sm" href="{{ route('agribisnis-classic-trust.penawaran') }}?komoditas={{ $c['slug'] }}">Minta Penawaran</a>
                </div>
            </article>
        @endforeach
    </div>

    <div class="empty" id="cmEmpty" hidden>
        <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
        <p>Komoditas yang Anda cari belum tersedia di katalog. Coba kata kunci lain atau tanyakan langsung ke tim kami.</p>
        <button type="button" class="btn btn--amber btn--sm" data-chat-open>Tanya AgroBot</button>
    </div>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Tidak menemukan spesifikasi yang Anda cari?',
    'cta_text'  => 'Sampaikan kebutuhan grade, kemasan, dan volume Anda. Tim kami akan menyiapkan penawaran khusus.',
])
@endsection
