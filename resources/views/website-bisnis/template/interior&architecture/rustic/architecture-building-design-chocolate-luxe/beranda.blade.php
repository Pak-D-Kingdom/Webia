@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')

@section('active', 'beranda')

@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = '') => url($site['base'] . $p);
    $img = fn (string $f) => asset($site['img'] . '/' . $f);
    $thumbs = [
        ['Rumah Modern Minimalis', 'Jakarta Selatan', 'res-01.svg'],
        ['Gedung Perkantoran',     'Jakarta Pusat',   'com-01.svg'],
        ['Villa Tropis Modern',    'Bali',            'vil-01.svg'],
    ];
@endphp

{{-- ================= HERO ================= --}}
<section class="abd-hero" id="beranda">
    <div class="abd-hero__media" aria-hidden="true">
        <img class="abd-hero__img" src="{{ $img('hero-villa.svg') }}" alt="" fetchpriority="high">
        <span class="abd-hero__glow"></span>
    </div>
    <div class="abd-hero__leaves" data-leaves aria-hidden="true"></div>

    <div class="abd-container abd-hero__in">
        <div class="abd-hero__copy">
            <p class="abd-hero__eyebrow">BUILD BETTER, LIVE GREATER</p>
            <h1>
                <span class="abd-hero__l1">Solusi Desain Arsitektur</span>
                <span class="abd-hero__l2">untuk Masa Depan Anda</span>
            </h1>
            <p class="abd-hero__lead">Menghadirkan desain arsitektur yang estetis, fungsional, dan berkelanjutan untuk hunian dan bisnis Anda.</p>
            <div class="abd-hero__btns">
                <a class="abd-btn abd-btn--primary" href="{{ $u('/portofolio') }}"><span>Lihat Portofolio</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="abd-btn abd-btn--outline" href="{{ $u('/konsultasi') }}"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><span>Konsultasi Gratis</span></a>
            </div>
        </div>
        <p class="abd-hero__script">Desain Elegan,<br>Hidup Lebih Nyaman
            <svg viewBox="0 0 220 14" aria-hidden="true"><path d="M2 10 C 60 2, 140 2, 218 8" fill="none" stroke="#f0c27b" stroke-width="2.4" stroke-linecap="round"/></svg>
        </p>
    </div>
</section>

{{-- ================= PREVIEW KARTU ================= --}}
<section class="abd-home" aria-label="Ringkasan layanan">
    <div class="abd-container">
        <div class="abd-grid">

            {{-- Arsitektur Portfolio --}}
            <article class="abd-card abd-card--portfolio" data-reveal>
                <header class="abd-card__head">
                    <span class="abd-card__ico"><svg class="i" aria-hidden="true"><use href="#i-grid"/></svg></span>
                    <div class="abd-card__ttl"><h2>Arsitektur Portfolio</h2><p>Karya terbaik kami dalam menciptakan ruang yang inspiratif.</p></div>
                    <a class="abd-link" href="{{ $u('/portofolio') }}">Lihat Semua <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </header>
                <div class="abd-thumbs">
                    @foreach ($thumbs as [$t, $l, $f])
                        <a class="abd-thumb" href="{{ $u('/portofolio') }}" aria-label="{{ $t }}, {{ $l }}">
                            <img src="{{ $img($f) }}" alt="Ilustrasi {{ $t }}" loading="lazy" width="800" height="560">
                            <span class="abd-thumb__cap"><strong>{{ $t }}</strong><small>{{ $l }}</small></span>
                            <span class="abd-thumb__go" aria-hidden="true"><svg class="i"><use href="#i-arrow"/></svg></span>
                        </a>
                    @endforeach
                </div>
            </article>

            {{-- Proyek Residensial & Komersial --}}
            <article class="abd-card abd-card--proyek" data-reveal>
                <header class="abd-card__head">
                    <span class="abd-card__ico"><svg class="i" aria-hidden="true"><use href="#i-home"/></svg></span>
                    <div class="abd-card__ttl"><h2>Proyek Residensial &amp; Komersial</h2><p>Dari hunian impian hingga bangunan bisnis modern.</p></div>
                    <a class="abd-link" href="{{ $u('/proyek') }}">Lihat Semua <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </header>
                <div class="abd-tiles">
                    <a class="abd-tile" href="{{ $u('/proyek#residensial') }}">
                        <img src="{{ $img('res-03.svg') }}" alt="Ilustrasi proyek residensial" loading="lazy" width="800" height="560">
                        <span class="abd-tile__cap">Proyek Residensial</span><span class="abd-tile__go" aria-hidden="true"><svg class="i"><use href="#i-arrow"/></svg></span>
                    </a>
                    <a class="abd-tile" href="{{ $u('/proyek#komersial') }}">
                        <img src="{{ $img('com-02.svg') }}" alt="Ilustrasi proyek komersial" loading="lazy" width="800" height="560">
                        <span class="abd-tile__cap">Proyek Komersial</span><span class="abd-tile__go" aria-hidden="true"><svg class="i"><use href="#i-arrow"/></svg></span>
                    </a>
                </div>
            </article>

            {{-- Layanan Desain Kami --}}
            <article class="abd-card abd-card--dark abd-card--layanan" data-reveal>
                <img class="abd-card__bg" src="{{ $img('interior-service.svg') }}" alt="" loading="lazy" width="900" height="600">
                <div class="abd-card__in">
                    <h2>Layanan Desain Kami</h2>
                    <p>Layanan profesional untuk berbagai kebutuhan Anda.</p>
                    <ul class="abd-checks">
                        @foreach ($site['services'] as $s)
                            <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>{{ $s['title'] }}</li>
                        @endforeach
                    </ul>
                    <a class="abd-btn abd-btn--gold abd-btn--sm" href="{{ $u('/layanan') }}"><span>Pelajari Lebih Lanjut</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>

            {{-- Denah Lantai & 3D Render --}}
            <article class="abd-card abd-card--dark abd-card--denah" data-reveal>
                <img class="abd-card__bg" src="{{ $img('plan-3d-1.svg') }}" alt="" loading="lazy" width="900" height="560">
                <div class="abd-card__in">
                    <h2><svg class="i" aria-hidden="true"><use href="#i-cube"/></svg>Denah Lantai &amp; 3D Render</h2>
                    <p>Visualisasi desain dengan detail dan realistis.</p>
                    <a class="abd-btn abd-btn--cream abd-btn--sm" href="{{ $u('/denah-3d') }}"><span>Lihat Contoh</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>

            {{-- Proses Proyek Kami --}}
            <article class="abd-card abd-card--proses" data-reveal>
                <header class="abd-card__head abd-card__head--tight">
                    <span class="abd-card__ico"><svg class="i" aria-hidden="true"><use href="#i-badge"/></svg></span>
                    <div class="abd-card__ttl"><h2>Proses Proyek Kami</h2><p>Langkah demi langkah, dari ide hingga nyata.</p></div>
                </header>
                <ol class="abd-steps">
                    @foreach ($site['process'] as $s)
                        <li class="abd-step">
                            <a href="{{ $u('/proses') }}">
                                <span class="abd-step__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                                <span class="abd-step__t">{{ $s['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ol>
            </article>

            {{-- Sertifikasi & Lisensi --}}
            <article class="abd-card abd-card--sertif" data-reveal>
                <header class="abd-card__head abd-card__head--tight">
                    <span class="abd-card__ico"><svg class="i" aria-hidden="true"><use href="#i-badge"/></svg></span>
                    <div class="abd-card__ttl"><h2>Sertifikasi &amp; Lisensi</h2><p>Profesional dan terpercaya.</p></div>
                </header>
                <a class="abd-logos" href="{{ $u('/sertifikasi') }}" aria-label="Lihat sertifikasi dan lisensi">
                    @foreach ($site['certs'] as $c)
                        <img src="{{ $img($c['img']) }}" alt="{{ $c['title'] }}" loading="lazy" width="160" height="100">
                    @endforeach
                </a>
            </article>

            {{-- Booking Konsultasi --}}
            <article class="abd-card abd-card--dark abd-card--booking" data-reveal>
                <img class="abd-card__bg" src="{{ $img('konsultasi-living.svg') }}" alt="" loading="lazy" width="900" height="420">
                <div class="abd-card__in">
                    <h2><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg>Booking Konsultasi</h2>
                    <p>Atur jadwal konsultasi dengan tim ahli kami.</p>
                    <a class="abd-btn abd-btn--gold abd-btn--sm" href="{{ $u('/konsultasi') }}"><span>Booking Sekarang</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>

            {{-- Permintaan Penawaran --}}
            <article class="abd-card abd-card--dark abd-card--penawaran" data-reveal>
                <img class="abd-card__bg" src="{{ $img('blueprint-desk.svg') }}" alt="" loading="lazy" width="1000" height="420">
                <div class="abd-card__in">
                    <h2><svg class="i" aria-hidden="true"><use href="#i-doc"/></svg>Permintaan Penawaran</h2>
                    <p>Dapatkan penawaran terbaik untuk proyek Anda.</p>
                    <a class="abd-btn abd-btn--gold abd-btn--sm" href="{{ $u('/penawaran') }}"><span>Minta Penawaran</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </article>

            {{-- Preview AI Chatbot (slot sendiri, tidak menimpa kartu lain) --}}
            <aside class="abd-card abd-chatprev" data-reveal aria-label="Pratinjau ArchiBot">
                <div class="abd-chatprev__bot" aria-hidden="true"><img src="{{ $img('archibot.svg') }}" alt="" loading="lazy" width="320" height="440"></div>
                <div class="abd-chatprev__main">
                    <div class="abd-chatprev__bubble">
                        <strong>Halo! Saya ArchiBot!</strong>
                        <span>Tanyakan apa saja tentang layanan arsitektur kami, atau minta penawaran.</span>
                    </div>
                    <ul class="abd-chatprev__chips">
                        @foreach ($site['quick'] as $q)
                            <li><button type="button" data-chat-ask="{{ $q }}">{{ $q }}</button></li>
                        @endforeach
                    </ul>
                    <form class="abd-chatprev__form" data-chatprev-form autocomplete="off">
                        <input type="text" placeholder="Tulis pertanyaan Anda..." aria-label="Tulis pertanyaan Anda" maxlength="200">
                        <button type="submit" aria-label="Kirim pertanyaan"><svg class="i" aria-hidden="true"><use href="#i-send"/></svg></button>
                    </form>
                </div>
            </aside>

        </div>
    </div>
</section>
@endsection
