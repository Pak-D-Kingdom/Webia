@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Jangkauan Distribusi - ' . $data['brand']['name'])
@section('page_key', 'distribusi')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'distribusi',
        'bannerTitle' => $data['distribution']['title'],
        'bannerText'  => $data['distribution']['text'],
    ])

    <section class="inner">
        <div class="inner__wrap">
            <div class="split split--map">
                <figure class="card map-card">
                    <img src="{{ $img }}/map-indonesia.png" alt="Peta persebaran distribusi di Indonesia dan Asia">
                    <figcaption>
                        <span class="title-icon"><svg class="ico"><use href="#i-globe"></use></svg></span>
                        <strong>{{ $data['distribution']['label'] }}</strong>
                    </figcaption>
                </figure>
                <article class="card">
                    <h2>Jaringan Pengiriman</h2>
                    <p>Pengiriman darat, laut, dan ekspor dengan konsolidasi muatan untuk menekan biaya logistik Anda.</p>
                    <dl class="kv kv--stack">
                        <div><dt>Basis gudang</dt><dd>Jawa Timur</dd></div>
                        <div><dt>Cakupan domestik</dt><dd>Seluruh wilayah Indonesia</dd></div>
                        <div><dt>Cakupan ekspor</dt><dd>Asia Tenggara, Timur &amp; Selatan</dd></div>
                        <div><dt>Moda</dt><dd>Darat, laut, kontainer</dd></div>
                    </dl>
                    <a class="btn btn--primary btn--sm" href="{{ $u['penawaran'] }}">Minta Penawaran Pengiriman <svg class="ico"><use href="#i-arrow"></use></svg></a>
                </article>
            </div>

            <header class="inner__head inner__head--spaced">
                <h2>Wilayah Layanan</h2>
                <p>{{ $data['distribution']['note'] }}</p>
            </header>

            <div class="chips" role="group" aria-label="Filter wilayah" data-filter-group="#regionGrid">
                <button type="button" class="chip is-active" data-filter="semua" aria-pressed="true">Semua</button>
                <button type="button" class="chip" data-filter="domestik" aria-pressed="false">Domestik</button>
                <button type="button" class="chip" data-filter="ekspor" aria-pressed="false">Ekspor</button>
            </div>

            <ul class="feature-grid feature-grid--4" id="regionGrid">
                @foreach ($data['distribution']['regions'] as $r)
                    <li class="feature-card reveal" data-category="{{ $r['type'] }}">
                        <span class="feature-card__tag feature-card__tag--{{ $r['type'] }}">{{ ucfirst($r['type']) }}</span>
                        <h3>{{ $r['name'] }}</h3>
                        <p>{{ $r['text'] }}</p>
                        <p class="feature-card__meta"><svg class="ico"><use href="#i-truck"></use></svg>{{ $r['lead'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    @include($v . '.partials.explore', ['exploreKeys' => ['sertifikasi', 'penawaran', 'chatbot']])
@endsection
