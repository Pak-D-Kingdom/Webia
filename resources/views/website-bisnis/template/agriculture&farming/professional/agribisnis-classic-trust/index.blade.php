@extends($v . '.layout')

@section('title', 'AgroTrade — Quality Harvests, Global Markets')

@section('content')
@php
    $img = fn ($f) => asset($agro['img_path'] . '/' . $f);
    $h = $agro['hero'];
@endphp

{{-- ================= HERO ================= --}}
<section class="hero" aria-labelledby="heroTitle">
    <div class="hero__bg" aria-hidden="true"></div>
    <div class="container hero__in">
        <div class="hero__copy">
            <p class="hero__eyebrow">{{ $h['eyebrow'] }}</p>
            <h1 class="hero__title" id="heroTitle">
                <span>{{ $h['title_a'] }}</span>
                <span class="hero__gold">{{ $h['title_b'] }}</span>
            </h1>
            <p class="hero__text">{{ $h['text'] }}</p>
            <div class="hero__cta">
                <a class="btn btn--amber btn--lg" href="{{ route('agribisnis-classic-trust.komoditas') }}">
                    {{ $h['cta1'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg>
                </a>
                <a class="btn btn--outline-light btn--lg" href="{{ route('agribisnis-classic-trust.penawaran') }}">{{ $h['cta2'] }}</a>
            </div>
        </div>

        <p class="hero__script" aria-hidden="true">
            @foreach ($h['script'] as $line)<span>{{ $line }}</span>@endforeach
        </p>

        <aside class="commit" aria-label="{{ $h['commitment_title'] }}">
            <div class="commit__head">
                <img src="{{ $img('logo-agrotrade.svg') }}" width="34" height="30" alt="">
                <h2>{{ $h['commitment_title'] }}</h2>
            </div>
            <ul class="commit__list">
                @foreach ($h['commitments'] as $c)
                    <li><span class="tick"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg></span>{{ $c }}</li>
                @endforeach
            </ul>
        </aside>
    </div>
</section>

<div class="container home">

    {{-- ================= KATALOG KOMODITAS (preview) ================= --}}
    <section class="home-catalog" aria-labelledby="hCatalog">
        <div class="card card--leaf catalog-intro">
            <h2 id="hCatalog">Katalog Komoditas</h2>
            <p>Pilihan komoditas unggulan berkualitas ekspor.</p>
            <a class="link-amber" href="{{ route('agribisnis-classic-trust.komoditas') }}">Lihat Semua Komoditas <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <ul class="tiles">
            @foreach ($agro['commodities'] as $c)
                <li>
                    <a class="tile" href="{{ route('agribisnis-classic-trust.komoditas') }}#{{ $c['slug'] }}">
                        <span class="tile__img"><img src="{{ $img($c['img']) }}" alt="{{ $c['name'] }}" loading="lazy" width="440" height="232"></span>
                        <span class="tile__name">{{ $c['name'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

    {{-- ================= BARIS 2: PANEN · SPESIFIKASI · MOQ · KAPASITAS ================= --}}
    <section class="home-info">
        <article class="card panen" aria-labelledby="hPanen">
            <div class="panen__top">
                <h2 id="hPanen">Informasi Tanaman &amp; Panen</h2>
                <p>Data terkini seputar musim tanam, panen, dan potensi hasil.</p>
                <a class="link-light" href="{{ route('agribisnis-classic-trust.panen') }}">Lihat Detail <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <ul class="panen__items">
                @foreach ($agro['home_harvest'] as $it)
                    <li>
                        <span class="panen__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $it['icon'] }}"/></svg></span>
                        <span class="panen__txt">
                            <b>{{ $it['name'] }}</b>
                            <em>{{ $it['range'] }}</em>
                            <small>{{ $it['label'] }}</small>
                        </span>
                    </li>
                @endforeach
            </ul>
        </article>

        <article class="card spec" aria-labelledby="hSpec">
            <div class="spec__head">
                <h2 id="hSpec">Spesifikasi Produk</h2>
                <a class="link-amber link-amber--sm" href="{{ route('agribisnis-classic-trust.spesifikasi') }}">Lihat Detail <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <p class="spec__sub">Detail kualitas dan standar produk komoditas.</p>
            <ul class="spec__list">
                @foreach ($agro['spec_preview'] as $s)
                    <li>
                        <span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <span class="spec__label">{{ $s['label'] }}</span>
                        <span class="spec__value">{{ $s['value'] }}</span>
                    </li>
                @endforeach
            </ul>
        </article>

        <a class="beantile" href="{{ route('agribisnis-classic-trust.spesifikasi') }}#kopi" aria-label="Spesifikasi kopi">
            <img src="{{ $img('spesifikasi-kopi.jpg') }}" alt="Biji kopi pilihan" loading="lazy" width="260" height="708">
        </a>

        <article class="card card--leaf moq" aria-labelledby="hMoq">
            <h2 id="hMoq">Jumlah Pesanan Minimum</h2>
            <p>{{ $agro['moq']['text'] }}</p>
            <div class="moq__body">
                <span class="bigico"><svg class="i" aria-hidden="true"><use href="#i-box"/></svg></span>
                <div class="moq__num">
                    <small>{{ $agro['moq']['prefix'] }}</small>
                    <strong>{{ $agro['moq']['headline'] }}</strong>
                </div>
            </div>
            <a class="link-amber link-amber--sm" href="{{ route('agribisnis-classic-trust.minimum') }}">Lihat Detail <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>

        <article class="card card--leaf cap" aria-labelledby="hCap">
            <h2 id="hCap">Kapasitas Pasokan</h2>
            <p>{{ $agro['capacity']['text'] }}</p>
            <div class="cap__body">
                <span class="bigico bigico--leaf"><svg class="i" aria-hidden="true"><use href="#i-sprout"/></svg></span>
                <div class="cap__num">
                    <strong>&gt; <span data-count="{{ $agro['capacity']['number'] }}">{{ $agro['capacity']['number_fmt'] }}</span> Ton</strong>
                    <span>{{ $agro['capacity']['unit'] }}</span>
                </div>
            </div>
            <a class="link-amber link-amber--sm" href="{{ route('agribisnis-classic-trust.kapasitas') }}">Lihat Kapasitas <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>
    </section>

    {{-- ================= BARIS 3: DISTRIBUSI · SERTIFIKASI · PROSES · B2B/QUOTATION ================= --}}
    <section class="home-mid">
        <article class="card dist" aria-labelledby="hDist">
            <h2 id="hDist">Jangkauan Distribusi</h2>
            <p>{{ $agro['distribution']['text'] }}</p>
            <div class="dist__map" role="img" aria-label="Peta jangkauan distribusi Indonesia dan dunia"></div>
            <a class="link-dark" href="{{ route('agribisnis-classic-trust.distribusi') }}">Lihat Peta <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>

        <article class="card cert" aria-labelledby="hCert">
            <h2 id="hCert">Sertifikasi</h2>
            <p>Terjamin kualitas dan keamanannya.</p>
            <ul class="cert__logos">
                @foreach ($agro['certifications'] as $c)
                    <li><img src="{{ $img($c['img']) }}" alt="{{ $c['name'] }}" loading="lazy" width="64" height="64"></li>
                @endforeach
            </ul>
            <a class="link-dark" href="{{ route('agribisnis-classic-trust.sertifikasi') }}">Lihat Sertifikasi <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>

        <article class="card proc" aria-labelledby="hProc">
            <div class="proc__top">
                <h2 id="hProc">{{ $agro['process']['title'] }}</h2>
                <p>{{ $agro['process']['text'] }}</p>
                <a class="link-light" href="{{ route('agribisnis-classic-trust.distribusi') }}#rantai-pasok">Lihat Detail <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <ol class="proc__steps">
                @foreach ($agro['process']['steps'] as $st)
                    <li style="--i: {{ $loop->index }}">
                        <span class="proc__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $st[1] }}"/></svg></span>
                        <span class="proc__lbl">{{ $st[0] }}</span>
                    </li>
                @endforeach
            </ol>
        </article>

        <div class="mid-stack">
            <article class="card mini" aria-labelledby="hB2b">
                <span class="mini__ico"><svg class="i" aria-hidden="true"><use href="#i-handshake"/></svg></span>
                <div class="mini__body">
                    <h2 id="hB2b">{{ $agro['b2b']['title'] }}</h2>
                    <p>{{ $agro['b2b']['text'] }}</p>
                    <a class="btn btn--green btn--sm" href="{{ route('agribisnis-classic-trust.b2b') }}">{{ $agro['b2b']['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>
            <article class="card mini" aria-labelledby="hQuo">
                <span class="mini__ico"><svg class="i" aria-hidden="true"><use href="#i-docs"/></svg></span>
                <div class="mini__body">
                    <h2 id="hQuo">{{ $agro['quotation']['title'] }}</h2>
                    <p>{{ $agro['quotation']['text'] }}</p>
                    <a class="btn btn--green btn--sm" href="{{ route('agribisnis-classic-trust.penawaran') }}">{{ $agro['quotation']['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>
        </div>
    </section>

    {{-- ================= BARIS 4: AI ASSISTANT ================= --}}
    <section class="ai-band" aria-labelledby="hAi">
        <div class="ai-band__left">
            <img class="ai-band__farmer" src="{{ $img('petani-maskot.jpg') }}" alt="" width="648" height="440" loading="lazy">
            <div class="ai-band__bubble">
                <p>{{ $agro['ai']['bubble'] }}</p>
                <button type="button" class="btn btn--amber btn--sm" data-chat-open>{{ $agro['ai']['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            </div>
        </div>

        <div class="ai-band__mid">
            <h2 id="hAi">{{ $agro['ai']['title'] }}</h2>
            <p>{{ $agro['ai']['text'] }}</p>
        </div>

        <ul class="ai-band__chips">
            @foreach ($agro['ai']['chips'] as $chip)
                <li>
                    <button type="button" data-chat-ask="{{ $chip }}">
                        <span class="qdot"><svg class="i i--sm" aria-hidden="true"><use href="#i-chat"/></svg></span>{{ $chip }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="ai-band__bot">
            <div class="ai-band__backdrop" aria-hidden="true"></div>
            <div class="ai-band__speech">
                <strong>{{ $agro['ai']['robot_bubble'][0] }}</strong>
                <span>{{ $agro['ai']['robot_bubble'][1] }}</span>
            </div>
            <img class="ai-band__robot" src="{{ $img('agrobot.svg') }}" alt="AgroBot, asisten AI AgroTrade" width="96" height="115" loading="lazy">
        </div>
    </section>
</div>
@endsection
