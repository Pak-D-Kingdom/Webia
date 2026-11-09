@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Al Hijrah Travel — Umrah & Haji Bersama Pembimbing Berpengalaman')

@section('content')
@php $h = $d['hero']; @endphp

<div class="uh-stage">
    {{-- ============ HERO BANNER ============ --}}
    <section class="uh-hero" id="beranda">
        <div class="uh-hero__bg"><img src="{{ $img('hero.svg') }}" alt="Ka'bah di Masjidil Haram saat senja" fetchpriority="high"></div>
        <div class="uh-sparks" data-sparks aria-hidden="true"></div>
        <div class="uh-container uh-hero__in">
            <div class="uh-hero__content">
                <p class="uh-eyebrow uh-anim" style="--d:.05s">{{ $h['eyebrow'] }}</p>
                <h1 class="uh-hero__title uh-anim" style="--d:.15s">
                    <span>{{ $h['title_1'] }} <em>&amp;</em> {{ $h['title_2'] }}</span>
                    <span>{{ $h['title_3'] }}</span>
                </h1>
                <p class="uh-hero__desc uh-anim" style="--d:.3s">{{ $h['desc'] }}</p>
                <ul class="uh-hero__features uh-anim" style="--d:.45s">
                    @foreach ($h['features'] as $f)
                        <li>
                            <span class="uh-hero__ficon"><svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $f[0] }}"/></svg></span>
                            <span>{{ $f[1] }}<br>{{ $f[2] }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="uh-hero__actions uh-anim" style="--d:.6s">
                    <a class="uh-btn uh-btn--gold uh-btn--lg" href="{{ $r('paket') }}">Lihat Paket Kami <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    <a class="uh-btn uh-btn--outline uh-btn--lg" href="{{ $wa($d['contact']['wa_text']) }}" target="_blank" rel="noopener">Konsultasi Gratis</a>
                </div>
            </div>

            <div class="uh-hero__quote uh-anim" style="--d:.7s" aria-hidden="true">
                <div class="uh-calli" lang="ar" dir="rtl">لَبَّيْكَ اللّٰهُمَّ لَبَّيْكَ</div>
                <p>"{{ $h['quote'] }}"</p>
                <i class="uh-orn"></i>
            </div>
        </div>
        <div class="uh-hero__curve"></div>
    </section>

    @include($v . '.partials.ai-panel')

    {{-- ============ BARIS 1: Paket · Jadwal · Harga ============ --}}
    <div class="uh-container uh-row1-wrap">
        <div class="uh-row uh-row1">

            {{-- Paket Umrah & Haji --}}
            <section class="uh-card uh-card--packages" data-tabs data-reveal>
                <header class="uh-card__head">
                    <div>
                        <h2 class="uh-card__title">Paket Umrah &amp; Haji</h2>
                        <p class="uh-card__sub">Pilih paket terbaik sesuai kebutuhan dan nyaman untuk perjalanan ibadah Anda.</p>
                    </div>
                    <a class="uh-link" href="{{ $r('paket') }}">Lihat Semua Paket <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </header>
                <div class="uh-tabs" role="tablist" aria-label="Jenis paket">
                    <button type="button" role="tab" class="is-active" aria-selected="true" data-tab="umrah">Umrah</button>
                    <button type="button" role="tab" aria-selected="false" data-tab="haji">Haji</button>
                </div>
                <div class="uh-minis">
                    @foreach ($d['packages'] as $p)
                        <a class="uh-mini" href="{{ $r('paket') }}#{{ $p['id'] }}" data-types="{{ $p['types'] }}">
                            <span class="uh-mini__img"><img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy"></span>
                            <strong>{{ $p['name'] }}</strong>
                            <span class="uh-mini__sub">{{ $p['sub'] }}</span>
                            <small>Mulai dari</small>
                            <b>{{ $rp($p['price']) }}</b>
                            <span class="uh-mini__more">Detail Paket <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></span>
                        </a>
                    @endforeach
                </div>
            </section>

            {{-- Jadwal Keberangkatan --}}
            <section class="uh-card uh-card--sched" data-reveal style="--d:.08s">
                <header class="uh-card__head">
                    <div>
                        <h2 class="uh-card__title">Jadwal Keberangkatan</h2>
                        <p class="uh-card__sub">Cek jadwal keberangkatan terbaru dan pilih tanggal yang sesuai.</p>
                    </div>
                    <a class="uh-link" href="{{ $r('jadwal') }}">Lihat Semua Jadwal <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </header>
                <div class="uh-sched" role="table" aria-label="Jadwal keberangkatan">
                    <div class="uh-sched__row uh-sched__row--head" role="row">
                        <span role="columnheader">Keberangkatan</span><span role="columnheader">Durasi</span><span role="columnheader" class="uh-hide-sm">Maskapai</span><span role="columnheader">Status</span>
                    </div>
                    @foreach (array_slice($d['schedules'], 0, 4) as $s)
                        <div class="uh-sched__row" role="row">
                            <span role="cell" class="uh-sched__main"><b>{{ $s['date'] }}</b><small>{{ $s['pkg'] }}</small></span>
                            <span role="cell">{{ $s['days'] }}</span>
                            <span role="cell" class="uh-sched__air uh-hide-sm"><svg class="uh-ico" aria-hidden="true"><use href="#i-plane"/></svg>{{ $s['airline'] }}</span>
                            <span role="cell"><em class="uh-pill uh-pill--{{ $s['status'] === 'Tersedia' ? 'ok' : ($s['status'] === 'Penuh' ? 'full' : 'low') }}">{{ $s['status'] }}</em></span>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Harga Paket --}}
            <section class="uh-card uh-card--price" data-reveal style="--d:.16s">
                <header class="uh-card__head">
                    <div>
                        <h2 class="uh-card__title">Harga Paket</h2>
                        <p class="uh-card__sub">Harga terbaik dengan fasilitas lengkap untuk kenyamanan ibadah Anda.</p>
                    </div>
                    <a class="uh-link" href="{{ $r('harga') }}">Lihat Semua Harga <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </header>
                <div class="uh-pricebox">
                    <img src="{{ $img('price-tower.svg') }}" alt="" loading="lazy">
                    <div class="uh-pricebox__in">
                        <span>Mulai dari</span>
                        <strong>{{ $rp($d['packages'][0]['price']) }}</strong>
                        <small>/ pax</small>
                        <a class="uh-btn uh-btn--gold" href="{{ $r('harga') }}">Cek Harga Lengkap <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

{{-- ============ BARIS 2: Hotel & Pesawat · Itinerary · Tim ============ --}}
<div class="uh-container">
    <div class="uh-row uh-row2">

        {{-- Hotel & Tiket Pesawat --}}
        <section class="uh-card uh-card--dark uh-card--hotel" data-reveal>
            <img class="uh-card__bg" src="{{ $img('hotel-flight.svg') }}" alt="" loading="lazy">
            <div class="uh-card--hotel__in">
                <h2 class="uh-card__title">Hotel &amp; Tiket Pesawat</h2>
                <p class="uh-card__sub">Hotel bintang terbaik dan maskapai pilihan untuk perjalanan yang lebih nyaman.</p>
                <a class="uh-btn uh-btn--gold" href="{{ $r('hotel') }}">Lihat Detail <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <ul class="uh-facil">
                    @foreach ($d['facilities'] as $f)
                        <li>
                            <span class="uh-facil__ico"><svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $f[0] }}"/></svg></span>
                            <span><b>{{ $f[1] }}</b><small>{{ $f[2] }}</small></span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        {{-- Itinerary Perjalanan --}}
        <section class="uh-card uh-card--itin" data-reveal style="--d:.08s">
            <img class="uh-card__bg" src="{{ $img('itinerary-skyline.svg') }}" alt="" loading="lazy">
            <div class="uh-card--itin__in">
                <h2 class="uh-card__title">Itinerary Perjalanan</h2>
                <p class="uh-card__sub">Rangkaian perjalanan yang terstruktur dan nyaman dari keberangkatan hingga kembali.</p>
                <a class="uh-btn uh-btn--dark uh-btn--sm" href="{{ $r('itinerary') }}"><svg class="uh-ico" aria-hidden="true"><use href="#i-moon"/></svg>Lihat Itinerary Lengkap</a>
                <ol class="uh-mtl">
                    @foreach (array_slice($d['itinerary'], 0, 4) as $i => $day)
                        <li><b>Hari {{ $i + 1 }}</b><span>{{ $day[0] }}</span></li>
                    @endforeach
                </ol>
            </div>
        </section>

        {{-- Tim Pembimbing --}}
        <section class="uh-card uh-card--team" data-reveal style="--d:.16s">
            <div class="uh-card--team__txt">
                <h2 class="uh-card__title">Tim Pembimbing</h2>
                <p class="uh-card__sub">Didampingi oleh muthawwif berpengalaman dan profesional di bidangnya.</p>
                <a class="uh-btn uh-btn--dark uh-btn--sm" href="{{ $r('tim') }}">Lihat Tim Kami <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <ul class="uh-people">
                @foreach (array_slice($d['team'], 0, 3) as $t)
                    <li>
                        <span class="uh-people__img"><img src="{{ $img($t['image']) }}" alt="{{ $t['name'] }}" loading="lazy"></span>
                        <b>{{ $t['name'] }}</b>
                        <small>{{ $t['role'] }}</small>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</div>

{{-- ============ BARIS 3: Persyaratan · Testimoni · Banner ============ --}}
<div class="uh-container">
    <div class="uh-row uh-row3">

        {{-- Persyaratan Pendaftaran --}}
        <section class="uh-card uh-card--req" data-reveal>
            <img class="uh-card--req__img" src="{{ $img('passport.svg') }}" alt="Paspor" loading="lazy">
            <div class="uh-card--req__txt">
                <h2 class="uh-card__title">Persyaratan Pendaftaran</h2>
                <p class="uh-card__sub">Siapkan dokumen yang dibutuhkan untuk kelancaran proses pendaftaran Anda.</p>
                <a class="uh-btn uh-btn--dark uh-btn--sm" href="{{ $r('persyaratan') }}">Lihat Persyaratan <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <ul class="uh-checks">
                @foreach (array_filter(array_column($d['requirements'], 3)) as $c)
                    <li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $c }}</li>
                @endforeach
            </ul>
        </section>

        {{-- Testimoni Jamaah --}}
        <section class="uh-card uh-card--testi" data-reveal style="--d:.08s" data-slider>
            <div class="uh-card--testi__txt">
                <h2 class="uh-card__title">Testimoni Jamaah</h2>
                <p class="uh-card__sub">Kisah nyata dari jamaah yang telah merasakan layanan terbaik kami.</p>
                <a class="uh-btn uh-btn--dark uh-btn--sm" href="{{ $r('testimoni') }}">Lihat Semua Testimoni <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
            <div class="uh-quote-wrap">
                @foreach (array_slice($d['testimonials'], 0, 3) as $i => $t)
                    <figure class="uh-quote {{ $i === 0 ? 'is-active' : '' }}" data-slide>
                        <span class="uh-quote__img"><img src="{{ $img($t['image']) }}" alt="{{ $t['name'] }}" loading="lazy"></span>
                        <div>
                            <span class="uh-stars" aria-label="{{ $t['rating'] }} dari 5 bintang">@for ($s = 0; $s < 5; $s++)<svg class="uh-ico {{ $s < $t['rating'] ? 'is-on' : '' }}" aria-hidden="true"><use href="#i-star"/></svg>@endfor</span>
                            <blockquote>"{{ $t['text'] }}"</blockquote>
                            <figcaption><b>{{ $t['name'] }}</b><small>Jamaah {{ str_replace('Jamaah ', '', $t['role']) }}</small></figcaption>
                        </div>
                    </figure>
                @endforeach
                <div class="uh-dots" role="tablist" aria-label="Pilih testimoni">
                    @foreach (array_slice($d['testimonials'], 0, 3) as $i => $t)
                        <button type="button" data-dot="{{ $i }}" class="{{ $i === 0 ? 'is-active' : '' }}" aria-label="Testimoni {{ $i + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Banner Baitullah --}}
        <a class="uh-banner" href="{{ $r('paket') }}" data-reveal style="--d:.16s" aria-label="Bersama Al Hijrah Travel Menuju Baitullah — Lihat paket">
            <img src="{{ $img('banner-baitullah.svg') }}" alt="" loading="lazy">
            <span class="uh-banner__txt"><i>Bersama Al Hijrah Travel</i><b>Menuju Baitullah</b></span>
        </a>
    </div>
</div>
@endsection
