@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Katalog Komoditas - ' . $data['brand']['name'])
@section('page_key', 'komoditas')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'komoditas',
        'bannerTitle' => 'Katalog Komoditas',
        'bannerText'  => 'Pilihan komoditas terbaik dari perkebunan dan pertanian kami, siap untuk pasar domestik maupun ekspor.',
    ])

    <section class="inner">
        <div class="inner__wrap">
            <div class="toolbar">
                <div class="field field--search">
                    <svg class="ico"><use href="#i-search"></use></svg>
                    <label class="sr-only" for="commSearch">Cari komoditas</label>
                    <input type="search" id="commSearch" placeholder="Cari komoditas..." autocomplete="off">
                </div>
                <div class="chips" role="group" aria-label="Filter kategori" data-filter-group="#commGrid">
                    @foreach ($data['categories'] as $cat)
                        <button type="button" class="chip {{ $loop->first ? 'is-active' : '' }}" data-filter="{{ $cat['key'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $cat['label'] }}</button>
                    @endforeach
                </div>
            </div>

            <ul class="comm-grid" id="commGrid">
                @foreach ($data['commodities'] as $c)
                    <li class="comm-card reveal" data-category="{{ $c['category'] }}" data-name="{{ strtolower($c['name'] . ' ' . $c['en']) }}">
                        <div class="comm-card__top">
                            <img src="{{ $img }}/{{ $c['image'] }}" alt="{{ $c['name'] }}" width="96" height="96" loading="lazy">
                            <div>
                                <h2>{{ $c['name'] }}</h2>
                                <em>{{ $c['en'] }}</em>
                            </div>
                        </div>
                        <p>{{ $c['desc'] }}</p>
                        <dl class="kv">
                            <div><dt>Bentuk</dt><dd>{{ $c['form'] }}</dd></div>
                            <div><dt>Asal</dt><dd>{{ $c['origin'] }}</dd></div>
                            <div><dt>Grade</dt><dd>{{ $c['grade'] }}</dd></div>
                            <div><dt>Pesanan min.</dt><dd>{{ $c['moq'] }}</dd></div>
                        </dl>
                        <div class="comm-card__actions">
                            <a class="link-arrow" href="{{ $u['spesifikasi'] }}#{{ $c['slug'] }}">Spesifikasi <svg class="ico"><use href="#i-arrow"></use></svg></a>
                            <a class="btn btn--primary btn--xs" href="{{ $u['penawaran'] }}?komoditas={{ $c['slug'] }}">Minta Penawaran</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <p class="empty" id="commEmpty" hidden>Komoditas tidak ditemukan. Coba kata kunci lain atau pilih kategori Semua.</p>
        </div>
    </section>

    @include($v . '.partials.explore', ['exploreKeys' => ['panen', 'spesifikasi', 'penawaran']])
@endsection
