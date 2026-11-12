@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Paket Umrah &amp; Haji — Nur Rahmat Travel')
@section('description', 'Pilihan paket Umrah Reguler, Umrah Plus Turki, Umrah VIP, dan Haji Khusus dari Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'packages'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-toolbar">
                <div class="uh-filter" role="group" aria-label="Filter jenis paket" data-uh-filter="packages">
                    <button type="button" class="uh-chip is-active" data-filter="all" aria-pressed="true">Semua</button>
                    <button type="button" class="uh-chip" data-filter="umrah" aria-pressed="false">Umrah</button>
                    <button type="button" class="uh-chip" data-uh-filter-btn data-filter="haji" aria-pressed="false">Haji</button>
                </div>
            </div>

            <div class="uh-pkpage" data-uh-filter-list="packages">
                @foreach ($uh['packages'] as $pkg)
                    <article class="uh-pkcard" id="{{ $pkg['slug'] }}" data-type="{{ $pkg['type'] }}">
                        <figure class="uh-pkcard__media">
                            <img src="{{ $img($pkg['image']) }}" alt="{{ $pkg['name'] }}" width="327" height="243" loading="lazy">
                            @if ($pkg['ribbon'])
                                <span class="uh-ribbon uh-ribbon--lg">{{ $pkg['ribbon'] }}</span>
                            @endif
                            <span class="uh-tag uh-tag--float">{{ $pkg['tag'] }}</span>
                        </figure>
                        <div class="uh-pkcard__body">
                            <h2 class="uh-pkcard__title">{{ $pkg['name'] }}</h2>
                            <p class="uh-pkcard__desc">{{ $pkg['desc'] }}</p>
                            <dl class="uh-facts">
                                <div><svg class="uh-i uh-facts__ico" aria-hidden="true"><use href="#i-calendar"/></svg><dt>Durasi</dt><dd>{{ $pkg['duration'] }}</dd></div>
                                <div><svg class="uh-i uh-facts__ico" aria-hidden="true"><use href="#i-route"/></svg><dt>Rute</dt><dd>{{ $pkg['route'] }}</dd></div>
                                <div><svg class="uh-i uh-facts__ico" aria-hidden="true"><use href="#i-hotel"/></svg><dt>Hotel</dt><dd>{{ $pkg['hotel'] }}</dd></div>
                                <div><svg class="uh-i uh-facts__ico" aria-hidden="true"><use href="#i-plane"/></svg><dt>Pesawat</dt><dd>{{ $pkg['airline'] }}</dd></div>
                            </dl>
                            <details class="uh-more">
                                <summary>Fasilitas paket</summary>
                                <ul class="uh-checklist">
                                    @foreach ($pkg['facilities'] as $fac)
                                        <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg><span>{{ $fac }}</span></li>
                                    @endforeach
                                </ul>
                            </details>
                            <div class="uh-pkcard__foot">
                                <p class="uh-pkcard__priceblock">
                                    <span class="uh-pkcard__from">Mulai dari</span>
                                    <strong class="uh-pkcard__price">{{ $pkg['price'] }}</strong>
                                </p>
                                <div class="uh-pkcard__btns">
                                    <a class="uh-btn uh-btn--outline uh-btn--sm" href="{{ $url('prices') }}#{{ $pkg['slug'] }}"><span>Lihat Harga</span></a>
                                    <a class="uh-btn uh-btn--gold uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya tertarik dengan paket '.$pkg['name'].'. Mohon info lebih lanjut.') }}" target="_blank" rel="noopener noreferrer">
                                        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                                        <span>Pesan via WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <p class="uh-empty" data-uh-empty hidden>Belum ada paket untuk filter ini.</p>
        </div>
    </section>
@endsection
