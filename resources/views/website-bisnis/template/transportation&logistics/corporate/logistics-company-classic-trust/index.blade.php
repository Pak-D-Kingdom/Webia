@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Nusa Logistik — Connecting Indonesia Worldwide')
@section('body_class', 'page-home')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
    $hero = $c['hero'];
@endphp

{{-- ================= HERO BANNER ================= --}}
<section class="hero" aria-labelledby="hero-title">
    <picture class="hero__media">
        <source media="(max-width: 767px)" srcset="{{ $img('hero-bg-sm.jpg') }}">
        <img src="{{ $img('hero-bg.jpg') }}" alt="Truk, kapal kargo, dan pesawat Nusa Logistik di pelabuhan" width="3072" height="526" fetchpriority="high">
    </picture>
    <div class="hero__shade" aria-hidden="true"></div>
    <div class="container container--nav hero__in">
        <div class="hero__copy">
            <p class="hero__eyebrow">{{ $hero['eyebrow'] }}</p>
            <h1 class="hero__title" id="hero-title">
                @foreach ($hero['lines'] as $line)
                    <span>{{ $line }}</span>
                @endforeach
                <span class="hero__accent">{{ $hero['accent'] }}</span>
            </h1>
            <p class="hero__text">{{ $hero['text'] }}</p>
            <div class="hero__cta">
                <a class="btn btn--orange btn--lg" href="{{ $route($hero['primary']['route']) }}">{{ $hero['primary']['label'] }}
                    <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                </a>
                <a class="btn btn--white btn--lg" href="{{ $route($hero['secondary']['route']) }}">
                    <svg class="ic ic--navy" aria-hidden="true"><use href="#i-box-scan"/></svg>{{ $hero['secondary']['label'] }}
                </a>
            </div>
        </div>
    </div>
    <ul class="hero__badges">
        @foreach ($hero['badges'] as $b)
            <li class="badge">
                <span class="badge__ic"><svg class="ic" aria-hidden="true"><use href="#{{ $b['icon'] }}"/></svg></span>
                <span class="badge__tx"><strong>{{ $b['title'] }}</strong><span>{{ $b['text'] }}</span></span>
            </li>
        @endforeach
    </ul>
</section>

{{-- ================= LAYANAN LOGISTIK (preview) ================= --}}
<section class="svc-strip" aria-label="Layanan logistik">
    <div class="container">
        <ul class="svc-strip__grid">
            @foreach ($c['services'] as $s)
                <li>
                    <a class="svc-card" href="{{ $route('layanan') }}#{{ $s['slug'] }}">
                        <svg class="svc-card__ic" aria-hidden="true"><use href="#{{ $s['icon'] }}"/></svg>
                        <span class="svc-card__tx"><strong>{{ $s['title'] }}</strong><span>{{ $s['short'] }}</span></span>
                        <span class="svc-card__go" aria-hidden="true"><svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- ================= GRID UTAMA ================= --}}
<div class="container home-main">
    <div class="home-main__left">
        <div class="home-pair home-pair--a">

            {{-- Opsi Pengiriman (preview) --}}
            <section class="card card--freight" data-tabs aria-labelledby="t-freight">
                <header class="card__head">
                    <div>
                        <h2 class="card__title" id="t-freight">{{ $c['freight']['title'] }}</h2>
                        <p class="card__sub">{{ $c['freight']['subtitle'] }}</p>
                    </div>
                    <a class="go" href="{{ $route('opsi-pengiriman') }}" aria-label="Lihat semua opsi pengiriman"><svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                </header>
                <div class="tabs" role="tablist" aria-label="Jenis pengiriman">
                    @foreach ($c['freight']['tabs'] as $t)
                        <button type="button" role="tab" class="tab {{ $loop->first ? 'is-active' : '' }}" id="tab-{{ $t['key'] }}" data-tab="{{ $t['key'] }}" aria-controls="panel-{{ $t['key'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}">{{ $t['label'] }}</button>
                    @endforeach
                </div>
                @foreach ($c['freight']['tabs'] as $t)
                    <ul class="freight-list" role="tabpanel" id="panel-{{ $t['key'] }}" aria-labelledby="tab-{{ $t['key'] }}" @if (! $loop->first) hidden @endif>
                        @foreach ($t['items'] as $it)
                            <li>
                                <a class="freight-row" href="{{ $route('opsi-pengiriman') }}#{{ $t['key'] }}">
                                    <span class="freight-row__ic"><svg class="ic" aria-hidden="true"><use href="#{{ $it['icon'] }}"/></svg></span>
                                    <span class="freight-row__name">{{ $it['name'] }}</span>
                                    <span class="freight-row__eta">{{ $it['eta'] }}</span>
                                    <svg class="ic ic--xs freight-row__go" aria-hidden="true"><use href="#i-chevron-right"/></svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </section>

            {{-- Jangkauan Layanan (preview) --}}
            <section class="card card--coverage" aria-labelledby="t-coverage">
                <header class="card__head">
                    <div>
                        <h2 class="card__title" id="t-coverage">{{ $c['coverage']['title'] }}</h2>
                        <p class="card__sub">{{ $c['coverage']['subtitle'] }}</p>
                    </div>
                    <a class="go" href="{{ $route('jangkauan') }}" aria-label="Lihat jangkauan layanan"><svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                </header>
                <div class="map">
                    <img src="{{ $img('peta-indonesia.jpg') }}" alt="Peta jangkauan layanan Nusa Logistik di Indonesia" width="1968" height="432" loading="lazy">
                    @foreach ($c['coverage']['pins'] as $p)
                        <span class="map__pin" style="left: {{ $p['x'] }}%; top: {{ $p['y'] }}%" aria-hidden="true"></span>
                    @endforeach
                </div>
                <ul class="stats">
                    @foreach ($c['coverage']['stats'] as $st)
                        <li class="stat">
                            <svg class="ic" aria-hidden="true"><use href="#{{ $st['icon'] }}"/></svg>
                            <span><strong>{{ $st['value'] }}</strong><span>{{ $st['label'] }}</span></span>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

        <div class="home-pair home-pair--b">
            {{-- Proses Pengiriman (preview) --}}
            <section class="card card--process" aria-labelledby="t-process">
                <header class="card__head">
                    <div>
                        <h2 class="card__title" id="t-process">{{ $c['process']['title'] }}</h2>
                        <p class="card__sub">{{ $c['process']['subtitle'] }}</p>
                    </div>
                    <a class="go" href="{{ $route('proses-pengiriman') }}" aria-label="Lihat proses pengiriman"><svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                </header>
                <ol class="steps">
                    @foreach ($c['process']['steps'] as $st)
                        <li class="step">
                            <span class="step__dot"><svg class="ic" aria-hidden="true"><use href="#{{ $st['icon'] }}"/></svg></span>
                            <span class="step__num">{{ $loop->iteration }}</span>
                            <strong>{{ $st['title'] }}</strong>
                            <span>{{ $st['text'] }}</span>
                        </li>
                    @endforeach
                </ol>
            </section>

            {{-- Tracking Pengiriman (preview) --}}
            <section class="card card--tracking" aria-labelledby="t-tracking">
                <header class="card__head">
                    <div>
                        <h2 class="card__title" id="t-tracking">{{ $c['tracking']['title'] }}</h2>
                        <p class="card__sub">{{ $c['tracking']['subtitle'] }}</p>
                    </div>
                    <a class="go" href="{{ $route('tracking') }}" aria-label="Buka halaman tracking"><svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                </header>
                <form class="track-form" action="{{ $route('tracking') }}" method="get">
                    <label class="sr-only" for="resi-home">Nomor resi</label>
                    <input id="resi-home" name="resi" type="text" placeholder="{{ $c['tracking']['placeholder'] }}" autocomplete="off" required>
                    <button class="btn btn--blue" type="submit">{{ $c['tracking']['button'] }}</button>
                </form>
                <ol class="track-steps">
                    @foreach ($c['tracking']['steps'] as $ts)
                        <li class="track-step">
                            <span class="track-step__dot"><svg class="ic" aria-hidden="true"><use href="#{{ $ts['icon'] }}"/></svg></span>
                            <span>{{ $ts['label'] }}</span>
                        </li>
                    @endforeach
                </ol>
            </section>
        </div>

        {{-- Klien Korporat (preview) --}}
        <section class="card card--clients" aria-labelledby="t-clients">
            <header class="card__head">
                <div>
                    <h2 class="card__title" id="t-clients">{{ $c['clients']['title'] }}</h2>
                    <p class="card__sub">{{ $c['clients']['subtitle'] }}</p>
                </div>
            </header>
            <div class="carousel carousel--logos" data-carousel>
                <button type="button" class="carousel__nav carousel__nav--prev" data-carousel-prev aria-label="Klien sebelumnya"><svg class="ic" aria-hidden="true"><use href="#i-chevron-left"/></svg></button>
                <ul class="carousel__track" data-carousel-track>
                    @foreach ($c['clients']['items'] as $cl)
                        <li class="logo-tile">
                            <a href="{{ $route('klien') }}" aria-label="{{ $cl['name'] }}">
                                <img src="{{ $img($cl['img']) }}" alt="{{ $cl['name'] }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
                <button type="button" class="carousel__nav carousel__nav--next" data-carousel-next aria-label="Klien berikutnya"><svg class="ic" aria-hidden="true"><use href="#i-chevron-right"/></svg></button>
            </div>
        </section>
    </div>

    <div class="home-main__right">
        {{-- Armada & Gudang (preview) --}}
        <section class="card card--fleet" aria-labelledby="t-fleet">
            <header class="card__head">
                <div>
                    <h2 class="card__title" id="t-fleet">{{ $c['fleet']['title'] }}</h2>
                    <p class="card__sub">{{ $c['fleet']['subtitle'] }}</p>
                </div>
                <a class="go" href="{{ $route('armada-gudang') }}" aria-label="Lihat armada dan gudang"><svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
            </header>
            <div class="carousel carousel--fleet" data-carousel>
                <button type="button" class="carousel__nav carousel__nav--prev" data-carousel-prev aria-label="Foto sebelumnya"><svg class="ic" aria-hidden="true"><use href="#i-chevron-left"/></svg></button>
                <ul class="carousel__track" data-carousel-track>
                    @foreach ($c['fleet']['items'] as $f)
                        <li class="fleet-item">
                            <a href="{{ $route('armada-gudang') }}#{{ $f['slug'] }}">
                                <img src="{{ $img($f['img']) }}" alt="{{ $f['title'] }}" width="636" height="360" loading="lazy">
                                <strong>{{ $f['title'] }}</strong>
                                <span>{{ $f['text'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <button type="button" class="carousel__nav carousel__nav--next" data-carousel-next aria-label="Foto berikutnya"><svg class="ic" aria-hidden="true"><use href="#i-chevron-right"/></svg></button>
            </div>
        </section>

        {{-- AI Chatbot (preview) --}}
        <section class="ai-card" aria-labelledby="t-ai">
            <div class="ai-card__copy">
                <div class="ai-card__head">
                    <img class="ai-card__mini" src="{{ $img('nusa-ai-mini.png') }}" alt="" width="38" height="37">
                    <h2 id="t-ai">{{ $c['ai']['title'] }}</h2>
                </div>
                <p>{{ $c['ai']['text'] }}</p>
                <ul class="ai-chips">
                    @foreach ($c['ai']['suggestions'] as $sg)
                        <li>
                            <button type="button" class="chip" data-chat-ask="{{ $sg['text'] }}">
                                <span class="chip__ic"><svg class="ic" aria-hidden="true"><use href="#{{ $sg['icon'] }}"/></svg></span>{{ $sg['text'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <a class="btn btn--blue btn--sm ai-card__btn" href="{{ $route('ai-chatbot') }}">{{ $c['ai']['button'] }}
                    <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                </a>
            </div>
            <div class="ai-card__art">
                <div class="ai-card__frame">
                    <img src="{{ $img('nusa-ai-scene.jpg') }}" alt="Maskot Nusa AI, asisten virtual logistik" width="1128" height="720" loading="lazy">
                    <button type="button" class="ai-card__pill" data-chat-open aria-label="Mulai chat dengan Nusa AI">
                        <span class="ai-card__pill-ic"><svg class="ic" aria-hidden="true"><use href="#i-chat"/></svg></span>
                        {{ $c['ai']['button'] }}
                        <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- Minta Penawaran (preview) --}}
        <section class="quote-card" aria-labelledby="t-quote">
            <img class="quote-card__bg" src="{{ $img('quote-bg.jpg') }}" alt="" width="1872" height="344" loading="lazy">
            <div class="quote-card__body">
                <span class="quote-card__ic"><svg class="ic" aria-hidden="true"><use href="#i-clipboard"/></svg></span>
                <div class="quote-card__tx">
                    <h2 id="t-quote">{{ $c['quote_card']['title'] }}</h2>
                    <p>{{ $c['quote_card']['text'] }}</p>
                    <a class="btn btn--orange btn--sm" href="{{ $route('penawaran') }}">{{ $c['quote_card']['button'] }}
                        <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
