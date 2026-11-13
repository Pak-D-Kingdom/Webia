@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Renovaku — Renovasi & Perbaikan Rumah dengan Kualitas Terbaik')

@section('content')
{{-- ================= HERO ================= --}}
<section class="hr-hero">
    @include($vp.'leaves')
    <div class="hr-container hr-hero__grid">
        <div class="hr-hero__text">
            <p class="hr-eyebrow"><span>Wujudkan Rumah Impian Anda</span></p>
            <h1 class="hr-hero__title">Renovasi &amp; Perbaikan dengan <em>Kualitas Terbaik<span class="hr-sparkle">{{ $i('sparkle') }}</span></em></h1>
            <p class="hr-hero__lead">Dari renovasi total hingga perbaikan kecil, kami hadir untuk menciptakan rumah yang lebih nyaman, indah dan bernilai lebih tinggi.</p>
            <div class="hr-hero__cta">
                <a class="hr-btn hr-btn--primary hr-btn--lg" href="{{ $go('permintaan-penawaran') }}">{{ $i('home') }}<span>Konsultasi Sekarang</span>{{ $i('arrow') }}</a>
                <a class="hr-btn hr-btn--ghost hr-btn--lg" href="{{ $go('proyek') }}">{{ $i('play') }}<span>Lihat Portofolio</span></a>
            </div>
        </div>

        <div class="hr-hero__media">
            <div class="hr-hero__glow" aria-hidden="true"></div>
            <img class="hr-hero__img" src="{{ $img('hero-house-mascot.webp') }}" alt="Maskot tukang Renovaku memegang rumah mungil di depan rumah modern yang asri" width="1340" height="616" fetchpriority="high" decoding="async">
        </div>

        <aside class="hr-assistant" aria-label="Preview AI Assistant">
            <div class="hr-assistant__head">
                <span class="hr-assistant__bot">@include($vp.'robot')</span>
                <strong>AI Assistant</strong>
                <span class="hr-assistant__spark">{{ $i('sparkle') }}</span>
            </div>
            <p class="hr-assistant__hi">Halo! Ada yang bisa kami bantu tentang layanan renovasi dan perbaikan?</p>
            <ul class="hr-assistant__list">
                <li><button type="button" data-chat-ask="Layanan Renovasi">{{ $i('home') }}<span>Layanan Renovasi</span></button></li>
                <li><button type="button" data-chat-ask="Paket Layanan">{{ $i('crown') }}<span>Paket Layanan</span></button></li>
                <li><button type="button" data-chat-ask="Estimasi Biaya">{{ $i('invoice') }}<span>Estimasi Biaya</span></button></li>
                <li><button type="button" data-chat-ask="Proyek Sebelumnya">{{ $i('folder') }}<span>Proyek Sebelumnya</span></button></li>
                <li><button type="button" data-chat-ask="FAQ Lainnya">{{ $i('consult') }}<span>FAQ Lainnya</span></button></li>
            </ul>
            <button type="button" class="hr-btn hr-btn--primary hr-btn--block" data-chat-open><span>Chat Sekarang</span>{{ $i('arrow') }}</button>
        </aside>
    </div>
</section>

<div class="hr-container hr-bento">
    {{-- ============ BARIS 2: Layanan · Paket · Before-After ============ --}}
    <div class="hr-row hr-row--2">
        <article class="hr-card hr-card--services" data-reveal>
            <header class="hr-card__head">
                <span class="hr-card__ico">{{ $i('home') }}</span>
                <div><h2>Layanan Renovasi &amp; Perbaikan</h2><p>Solusi lengkap untuk rumah Anda.</p></div>
            </header>
            <div class="hr-services__body">
                <ul class="hr-checklist">
                    @foreach ($cfg['services'] as $s)
                        <li><a href="{{ $go('layanan') }}#{{ $s['id'] }}">{{ $i('check-circle') }}<span>{{ $s['title'] }}</span></a></li>
                    @endforeach
                </ul>
                <img class="hr-services__img" src="{{ $img('service-living-room.jpg') }}" alt="Ruang keluarga hasil renovasi dengan sofa abu-abu dan jendela besar" width="552" height="480" loading="lazy" decoding="async">
            </div>
            <a class="hr-btn hr-btn--primary hr-btn--sm" href="{{ $go('layanan') }}"><span>Lihat Semua Layanan</span>{{ $i('arrow') }}</a>
        </article>

        <article class="hr-card hr-card--packages" data-reveal>
            <header class="hr-card__head">
                <span class="hr-card__ico hr-card__ico--gold">{{ $i('crown') }}</span>
                <div><h2>Paket Layanan</h2><p>Pilih paket terbaik sesuai kebutuhan Anda.</p></div>
            </header>
            <div class="hr-pkgs">
                @foreach ($cfg['packages'] as $p)
                    <div class="hr-pkg {{ $p['popular'] ? 'is-popular' : '' }}">
                        @if ($p['popular'])<span class="hr-pkg__badge">Paling Populer</span>@endif
                        <h3>{{ $p['name'] }}</h3>
                        <p class="hr-pkg__tag">{{ $p['tagline'] }}</p>
                        <p class="hr-pkg__price">{{ $p['price'] }}</p>
                        <ul>
                            @foreach ($p['features'] as $f)<li>{{ $i('check') }}<span>{{ $f }}</span></li>@endforeach
                        </ul>
                        <a class="hr-btn hr-btn--xs {{ $p['popular'] ? 'hr-btn--gold' : 'hr-btn--light' }}" href="{{ $go('permintaan-penawaran') }}?paket={{ $p['id'] }}"><span>Pilih Paket</span>{{ $i('arrow') }}</a>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="hr-card hr-card--gallery" data-reveal>
            <header class="hr-card__head">
                <span class="hr-card__ico">{{ $i('camera') }}</span>
                <div><h2>Before - After Gallery</h2><p>Lihat hasil nyata dari proyek kami.</p></div>
            </header>
            <a class="hr-ba" href="{{ $go('galeri') }}" aria-label="Lihat galeri before-after lengkap">
                <figure>
                    <img src="{{ $img($cfg['gallery']['before']) }}" alt="Ruangan sebelum renovasi: dinding kusam dan plafon rusak" width="630" height="345" loading="lazy" decoding="async">
                    <figcaption>{{ $i('camera') }}Sebelum</figcaption>
                </figure>
                <figure>
                    <img src="{{ $img($cfg['gallery']['after']) }}" alt="Ruangan sesudah renovasi: ruang keluarga hangat dan terang" width="639" height="345" loading="lazy" decoding="async">
                    <figcaption>{{ $i('camera') }}Sesudah</figcaption>
                </figure>
                <span class="hr-ba__go">{{ $i('chevron-right') }}</span>
            </a>
        </article>
    </div>

    {{-- ============ BARIS 3: Proyek · Area · Proses ============ --}}
    <div class="hr-row hr-row--3">
        <article class="hr-card hr-card--projects" data-reveal>
            <header class="hr-card__head">
                <span class="hr-card__ico">{{ $i('folder') }}</span>
                <div><h2>Proyek Kami</h2><p>Berbagai proyek renovasi dan perbaikan yang telah kami selesaikan.</p></div>
                <a class="hr-link" href="{{ $go('proyek') }}"><span>Lihat Semua Proyek</span>{{ $i('arrow') }}</a>
            </header>
            <div class="hr-thumbs">
                @foreach ($cfg['projects'] as $p)
                    <a href="{{ $go('proyek') }}#{{ $p['id'] }}"><img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}, {{ $p['location'] }}" width="510" height="204" loading="lazy" decoding="async"></a>
                @endforeach
            </div>
        </article>

        <article class="hr-card hr-card--coverage" data-reveal>
            <header class="hr-card__head">
                <span class="hr-card__ico">{{ $i('pin') }}</span>
                <div><h2>Area Layanan</h2><p>Kami melayani berbagai wilayah di Indonesia.</p></div>
            </header>
            <div class="hr-map">
                <img src="{{ $img('coverage-map.png') }}" alt="Peta persebaran area layanan Renovaku di Indonesia" width="1017" height="252" loading="lazy" decoding="async">
                <a class="hr-btn hr-btn--primary hr-btn--xs hr-map__btn" href="{{ $go('area-layanan') }}"><span>Cek Area Layanan</span>{{ $i('arrow') }}</a>
            </div>
        </article>

        <article class="hr-card hr-card--process" data-reveal>
            <header class="hr-card__head">
                <span class="hr-card__ico">{{ $i('gear', 'hr-spin') }}</span>
                <div><h2>Proses Kerja Kami</h2><p>Proses mudah, transparan, dan profesional.</p></div>
            </header>
            <ol class="hr-steps">
                @foreach ($cfg['steps'] as $s)
                    <li><a href="{{ $go('proses-kerja') }}#tahapan"><span class="hr-step__ico">{{ $i($s['icon']) }}</span><span class="hr-step__name">{{ $s['title'] }}</span></a></li>
                @endforeach
            </ol>
        </article>
    </div>

    {{-- ============ BARIS 4: Survei · Penawaran ============ --}}
    <div class="hr-row hr-row--4">
        <article class="hr-card hr-card--survey" data-reveal>
            <div class="hr-survey__text">
                <span class="hr-card__ico hr-card__ico--light">{{ $i('calendar') }}</span>
                <h2>Booking Survei Lokasi</h2>
                <p>Jadwalkan survei langsung ke lokasi rumah Anda.</p>
                <a class="hr-btn hr-btn--sage hr-btn--sm" href="{{ $go('booking-survei') }}"><span>Booking Sekarang</span>{{ $i('arrow') }}</a>
            </div>
            <img class="hr-survey__img" src="{{ $img('survey-tape.jpg') }}" alt="Meteran kuning di atas gambar denah rumah" width="549" height="297" loading="lazy" decoding="async">
        </article>

        <article class="hr-card hr-card--quote" data-reveal>
            <div class="hr-quote__text">
                <span class="hr-card__ico">{{ $i('file') }}</span>
                <h2>Permintaan Penawaran</h2>
                <p>Dapatkan penawaran harga terbaik sekarang juga.</p>
                <a class="hr-btn hr-btn--sage hr-btn--sm" href="{{ $go('permintaan-penawaran') }}"><span>Minta Penawaran</span>{{ $i('arrow') }}</a>
            </div>
            <img class="hr-quote__img" src="{{ $img('quotation-hand.jpg') }}" alt="Tangan menulis rincian penawaran di atas denah" width="332" height="384" loading="lazy" decoding="async">
        </article>
    </div>

    {{-- ============ BARIS 5: Testimoni · AI Chatbot ============ --}}
    <div class="hr-row hr-row--5">
        <article class="hr-card hr-card--testi" id="testimoni" data-reveal data-testi aria-roledescription="carousel" aria-label="Testimoni pelanggan">
            <header class="hr-testi__head">
                <span class="hr-testi__mark" aria-hidden="true">“</span>
                <h2>Testimoni Pelanggan</h2>
                <div class="hr-testi__nav">
                    <button type="button" data-testi-prev aria-label="Testimoni sebelumnya">{{ $i('chevron-left') }}</button>
                    <button type="button" data-testi-next aria-label="Testimoni berikutnya">{{ $i('chevron-right') }}</button>
                </div>
            </header>
            <div class="hr-testi__stage">
                @foreach ($cfg['testimonials'] as $t)
                    <figure class="hr-testi__slide {{ $loop->first ? 'is-on' : '' }}" data-testi-slide @if (! $loop->first) aria-hidden="true" @endif>
                        <span class="hr-testi__av">
                            @if ($t['photo'])
                                <img src="{{ $img($t['photo']) }}" alt="Foto {{ $t['name'] }}, pelanggan Renovaku" width="216" height="216" loading="lazy" decoding="async">
                            @else
                                <b aria-hidden="true">{{ $t['initials'] }}</b>
                            @endif
                        </span>
                        <div class="hr-testi__body">
                            <blockquote>“{{ $t['text'] }}”</blockquote>
                            <figcaption>
                                <span class="hr-stars" role="img" aria-label="Rating {{ $t['stars'] }} dari 5">@for ($n = 0; $n < $t['stars']; $n++){{ $i('star') }}@endfor</span>
                                <strong>{{ $t['name'] }}</strong>
                                <small>{{ $t['role'] }}</small>
                            </figcaption>
                        </div>
                    </figure>
                @endforeach
            </div>
            <div class="hr-testi__dots" role="tablist" aria-label="Pilih testimoni">
                @foreach ($cfg['testimonials'] as $t)
                    <button type="button" role="tab" data-testi-dot class="{{ $loop->first ? 'is-on' : '' }}" aria-label="Testimoni {{ $loop->iteration }}: {{ $t['name'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}"></button>
                @endforeach
            </div>
        </article>

        <article class="hr-card hr-card--bot" data-reveal>
            <div class="hr-bot__top">
                <span class="hr-bot__robot">@include($vp.'robot')</span>
                <div>
                    <span class="hr-bot__pill"><i></i> Online</span>
                    <h2>AI Chatbot</h2>
                    <p>Service &amp; Estimate FAQ</p>
                </div>
            </div>
            <div class="hr-bot__demo" aria-hidden="true" data-demo>
                <p class="hr-bot__q" data-demo-q>{{ $cfg['js']['demo'][0][0] }}</p>
                <p class="hr-bot__a" data-demo-a>{{ $cfg['js']['demo'][0][1] }}</p>
            </div>
            <div class="hr-bot__chips">
                <button type="button" data-chat-ask="Estimasi Biaya">{{ $i('invoice') }}Estimasi Biaya</button>
                <button type="button" data-chat-ask="Paket Layanan">{{ $i('crown') }}Paket Layanan</button>
                <button type="button" data-chat-ask="Survey lokasi">{{ $i('calendar') }}Survey Lokasi</button>
            </div>
            <button type="button" class="hr-btn hr-btn--gold hr-btn--block" data-chat-open>{{ $i('bot') }}<span>Mulai Chat</span>{{ $i('arrow') }}</button>
        </article>
    </div>
</div>
@endsection
