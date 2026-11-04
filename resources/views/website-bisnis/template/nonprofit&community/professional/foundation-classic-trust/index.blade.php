@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Harapan Untuk Negeri Foundation — Membangun Masa Depan yang Lebih Baik')

@section('content')
{{-- ===== HERO BANNER ===== --}}
<section class="fd-hero" aria-labelledby="fd-hero-title">
    <span class="fd-hero__blob fd-hero__blob--a"></span><span class="fd-hero__blob fd-hero__blob--b"></span>
    <div class="fd-wrap fd-hero__in">
        <div class="fd-hero__img" aria-hidden="false"><img src="{{ $i('hero.jpg') }}" alt="Relawan Harapan Untuk Negeri Foundation bersama anak-anak di depan gedung yayasan" width="1356" height="540" fetchpriority="high"></div>
        <div class="fd-hero__text">
            <span class="fd-badge"><svg class="fd-ico"><use href="#fd-i-heart"/></svg>{{ $fd['brand']['tagline'] }}</span>
            <h1 id="fd-hero-title">Membangun Masa Depan <span>yang Lebih Baik</span></h1>
            <p>Melalui kepedulian dan aksi nyata, kami berkomitmen untuk menciptakan kehidupan yang lebih sejahtera bagi semua.</p>
            <div class="fd-hero__cta">
                <a class="fd-btn fd-btn--navy" href="{{ $r('mission') }}">Kenali Kami <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                <a class="fd-btn fd-btn--outline" href="{{ $r('programs') }}">Lihat Program <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </div>
    </div>
</section>

<div class="fd-wrap fd-stage">
    {{-- ===== PREVIEW AI CHATBOT (FAQ program & donasi) ===== --}}
    <aside class="fd-chatpreview" aria-label="Preview HarapanBot">
        <div class="fd-chatpreview__top">
            <img class="fd-chatpreview__robot" src="{{ $i('robot.png') }}" alt="Maskot HarapanBot" width="92" height="110">
            <div class="fd-bubble"><b>Halo! Saya HarapanBot!</b>Saya siap membantu Anda seputar program kami dan donasi.</div>
        </div>
        <div class="fd-chatpreview__list">
            @foreach ($fd['faq']['quick'] as $q)
                <button type="button" class="fd-qbtn" data-fd-chat-ask="{{ $q }}"><svg class="fd-ico"><use href="#fd-i-help"/></svg>{{ $q }}</button>
            @endforeach
        </div>
        <form data-fd-chat-form autocomplete="off">
            <input type="text" placeholder="Tulis pertanyaan Anda..." aria-label="Tulis pertanyaan Anda" maxlength="200">
            <button type="submit" class="fd-sendbtn" aria-label="Kirim pertanyaan"><svg class="fd-ico"><use href="#fd-i-send"/></svg></button>
        </form>
    </aside>

    <div class="fd-bento">
        {{-- ===== ROW A: Mission & Vision · Programs · Impact ===== --}}
        <div class="fd-row fd-row--a">
            <article class="fd-card fd-c-mission fd-reveal">
                <div class="fd-card__bg" aria-hidden="true"><img src="{{ $i('mission-seed.jpg') }}" alt="" loading="lazy"></div>
                <div class="fd-card__pad">
                    <h2 class="fd-mission__title"><img src="{{ $i('mission-target.png') }}" alt="" width="46" height="42"><span class="fd-card__title">Misi &amp; Visi Kami</span></h2>
                    <p class="fd-mission__text">{{ $fd['mission']['summary'] }}</p>
                    <a class="fd-btn fd-btn--navy fd-btn--sm" href="{{ $r('mission') }}">Selengkapnya <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                </div>
            </article>

            <article class="fd-card fd-c-programs fd-reveal">
                <div class="fd-card__pad">
                    <div class="fd-card__head">
                        <span class="fd-card__ico"><svg class="fd-ico"><use href="#fd-i-grid"/></svg></span>
                        <h2 class="fd-card__title" style="font-size:16px">Program Kami</h2>
                        <a class="fd-card__more" href="{{ $r('programs') }}">Lihat Semua Program <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                    </div>
                    <p class="fd-card__sub">Berbagai program untuk mewujudkan dampak nyata.</p>
                    <div class="fd-proggrid">
                        @foreach ($fd['programs'] as $p)
                            <a class="fd-progitem" href="{{ $r('programs') }}#{{ $p['slug'] }}">
                                <img src="{{ $i($p['image']) }}" alt="" loading="lazy" width="105" height="72">
                                <span>{{ $p['short'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </article>

            <article class="fd-card fd-c-impact fd-reveal">
                <div class="fd-card__pad">
                    <h2 class="fd-card__title"><a class="fd-stretch" href="{{ $r('impact') }}">Dampak Kami</a></h2>
                    <p class="fd-card__sub">Bersama, kita telah memberikan manfaat untuk banyak orang.</p>
                </div>
                <div class="fd-impact__stats">
                    @foreach ($fd['impact']['stats'] as $s)
                        <div class="fd-stat">
                            <img src="{{ $i($s['icon']) }}" alt="" width="38" height="38">
                            <div><strong><span data-fd-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}">{{ number_format($s['value'], 0, ',', '.') }}{{ $s['suffix'] }}</span></strong><small>{{ $s['label'] }}</small></div>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>

        {{-- ===== ROW B: Donation · Financial · Partners ===== --}}
        <div class="fd-row fd-row--b">
            <article class="fd-card fd-c-donate fd-reveal">
                <div class="fd-card__pad">
                    <div class="fd-card__head">
                        <span class="fd-card__ico"><svg class="fd-ico"><use href="#fd-i-heart"/></svg></span>
                        <h2 class="fd-card__title" style="font-size:16px">Pilihan Donasi</h2>
                    </div>
                    <p class="fd-card__sub">Pilih cara terbaik untuk berbagi kebaikan.</p>
                    <div class="fd-donategrid">
                        @foreach ($fd['donation']['options'] as $o)
                            <a class="fd-donateitem" href="{{ route('foundation-classic-trust.donation', ['jenis' => $o['key']]) }}">
                                <img src="{{ $i($o['icon']) }}" alt="" width="30" height="30" loading="lazy">
                                <b>{{ $o['title'] }}</b><small>({{ $o['sub'] }})</small>
                            </a>
                        @endforeach
                    </div>
                    <div class="fd-center"><a class="fd-btn fd-btn--navy fd-btn--sm" href="{{ $r('donation') }}">Donasi Sekarang <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a></div>
                </div>
            </article>

            <article class="fd-card fd-c-fin fd-reveal">
                <div class="fd-card__bg" aria-hidden="true"><img src="{{ $i('report.jpg') }}" alt="" loading="lazy"></div>
                <div class="fd-card__pad">
                    <div class="fd-card__head">
                        <span class="fd-card__ico"><svg class="fd-ico"><use href="#fd-i-doc"/></svg></span>
                        <h2 class="fd-card__title" style="font-size:16px">Laporan Transparansi Keuangan</h2>
                    </div>
                    <p>{{ $fd['financial']['summary'] }}</p>
                    <a class="fd-btn fd-btn--navy fd-btn--sm" href="{{ $r('financial') }}">Lihat Laporan <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                </div>
            </article>

            <article class="fd-card fd-c-partners fd-reveal">
                <div class="fd-card__pad">
                    <div class="fd-card__head">
                        <span class="fd-card__ico"><svg class="fd-ico"><use href="#fd-i-users"/></svg></span>
                        <h2 class="fd-card__title" style="font-size:16px">Mitra &amp; Sponsor</h2>
                    </div>
                    <p class="fd-card__sub">Bersama dengan berbagai pihak terpercaya.</p>
                    <div class="fd-logos">
                        @foreach ($fd['partners'] as $p)
                            <img src="{{ $i($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" width="72" height="48">
                        @endforeach
                    </div>
                    <div class="fd-center"><a class="fd-btn fd-btn--outline fd-btn--sm" href="{{ $r('partners') }}">Lihat Semua Mitra <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a></div>
                </div>
            </article>
        </div>

        {{-- ===== ROW C: Volunteer · News & Events · Quote ===== --}}
        <div class="fd-row fd-row--c">
            <article class="fd-card fd-c-volunteer fd-reveal">
                <div class="fd-card__bg" aria-hidden="true"><img src="{{ $i('volunteer.jpg') }}" alt="" loading="lazy"></div>
                <div class="fd-card__pad">
                    <h2 style="font-size:21px;font-weight:800;margin-bottom:4px">Jadilah Relawan!</h2>
                    <p>Bersama kita bisa memberikan lebih banyak manfaat.</p>
                    <a class="fd-btn fd-btn--gold fd-btn--sm" href="{{ $r('volunteer') }}">Daftar Sekarang <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                </div>
            </article>

            <article class="fd-card fd-c-news fd-reveal">
                <div class="fd-card__pad">
                    <div class="fd-card__head">
                        <span class="fd-card__ico"><svg class="fd-ico"><use href="#fd-i-news"/></svg></span>
                        <h2 class="fd-card__title" style="font-size:16px">Berita &amp; Acara Terbaru</h2>
                        <a class="fd-card__more" href="{{ $r('news') }}">Lihat Semua <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                    </div>
                    <p class="fd-card__sub">Ikuti kabar terbaru dan kegiatan kami.</p>
                    <div class="fd-newsgrid">
                        @foreach (array_slice($fd['news'], 0, 3) as $n)
                            <a class="fd-newsitem" href="{{ $r('news') }}#{{ $n['slug'] }}">
                                <img src="{{ $i($n['image']) }}" alt="" loading="lazy" width="168" height="38">
                                <div><b>{{ $n['title'] }}</b><small><svg class="fd-ico"><use href="#fd-i-calendar"/></svg>{{ $n['date'] }}</small></div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </article>

            <article class="fd-card fd-c-quote fd-reveal">
                <img src="{{ $i('quote.jpg') }}" alt="Kebaikan kecil, bisa membawa perubahan besar." loading="lazy" width="730" height="272">
            </article>
        </div>
    </div>
</div>
@endsection
