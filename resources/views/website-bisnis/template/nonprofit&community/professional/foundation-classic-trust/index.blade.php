@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Harapan Untuk Negeri Foundation — Membangun Masa Depan yang Lebih Baik')

@section('content')
{{-- ===== HERO BANNER + PREVIEW AI CHATBOT ===== --}}
<section class="fd-hero" aria-labelledby="fd-hero-title">
    <div class="fd-hero__bg" aria-hidden="true">
        <i class="fd-hero__orb fd-hero__orb--1"></i><i class="fd-hero__orb fd-hero__orb--2"></i>
        @foreach ([8, 22, 36, 52, 66, 80] as $k => $x)
            <span class="fd-fheart" style="--x:{{ $x }}%;--d:{{ $k * -1.7 }}s;--s:{{ 0.7 + ($k % 3) * 0.25 }}"></span>
        @endforeach
    </div>
    <div class="fd-wrap fd-hero__in">
        <div class="fd-hero__img"><img src="{{ $i('hero.jpg') }}" alt="Relawan Harapan Untuk Negeri Foundation bersama anak-anak di depan gedung yayasan" width="2034" height="810" fetchpriority="high"></div>

        <div class="fd-hero__text">
            <span class="fd-badge"><svg class="fd-ico fd-ico--fill"><use href="#fd-i-heart"/></svg>{{ $fd['brand']['tagline'] }}</span>
            <h1 id="fd-hero-title">Membangun Masa Depan <span>yang Lebih Baik</span></h1>
            <p>Melalui kepedulian dan aksi nyata, kami berkomitmen untuk menciptakan kehidupan yang lebih sejahtera bagi semua.</p>
            <div class="fd-hero__cta">
                <a class="fd-btn fd-btn--navy fd-btn--lg" href="{{ $r('mission') }}">Kenali Kami <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                <a class="fd-btn fd-btn--outline fd-btn--lg" href="{{ $r('programs') }}">Lihat Program <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </div>

        <aside class="fd-botcard" aria-label="Preview HarapanBot, asisten FAQ program dan donasi">
            <div class="fd-botcard__in">
                <div class="fd-botcard__top">
                    <img class="fd-botcard__robot" src="{{ $i('bot.svg') }}" alt="Maskot HarapanBot" width="96" height="114">
                    <div class="fd-bubble">
                        <b>Halo! Saya HarapanBot!</b>
                        <span>Saya siap membantu Anda seputar program kami dan donasi.</span>
                        <em><i></i>Online sekarang</em>
                    </div>
                </div>
                <div class="fd-botcard__list">
                    @foreach ($fd['faq']['quick'] as $k => $q)
                        <button type="button" class="fd-qbtn" data-fd-chat-ask="{{ $q }}">
                            <span class="fd-qbtn__ico"><svg class="fd-ico"><use href="#fd-i-{{ $fd['faq']['quick_icons'][$k] }}"/></svg></span>
                            <span class="fd-qbtn__txt">{{ $q }}</span>
                            <svg class="fd-ico fd-qbtn__go"><use href="#fd-i-arrow"/></svg>
                        </button>
                    @endforeach
                </div>
                <form class="fd-botcard__form" data-fd-chat-form autocomplete="off">
                    <input type="text" placeholder="Tulis pertanyaan Anda..." aria-label="Tulis pertanyaan Anda" maxlength="200">
                    <button type="submit" class="fd-sendbtn" aria-label="Kirim pertanyaan"><svg class="fd-ico"><use href="#fd-i-send"/></svg></button>
                </form>
            </div>
        </aside>
    </div>
</section>

<div class="fd-wrap fd-home">
    {{-- ===== BARIS A: Misi & Visi · Program · Dampak ===== --}}
    <div class="fd-row fd-row--a">
        <article class="fd-card fd-c-mission fd-reveal">
            <div class="fd-c-mission__img" aria-hidden="true"><img src="{{ $i('mission-seed.jpg') }}" alt="" loading="lazy" width="780" height="736"></div>
            <div class="fd-card__body">
                <div class="fd-ch"><img class="fd-ch__img" src="{{ $i('mission-target.svg') }}" alt="" width="48" height="48"><h2 class="fd-ch__title">Misi &amp; Visi Kami</h2></div>
                <p class="fd-card__text">{{ $fd['mission']['summary'] }}</p>
                <a class="fd-btn fd-btn--navy" href="{{ $r('mission') }}">Selengkapnya <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </article>

        <article class="fd-card fd-c-programs fd-reveal">
            <div class="fd-card__body">
                <div class="fd-ch">
                    <span class="fd-ch__ico"><svg class="fd-ico"><use href="#fd-i-grid"/></svg></span>
                    <h2 class="fd-ch__title">Program Kami</h2>
                    <a class="fd-ch__more" href="{{ $r('programs') }}">Lihat Semua Program <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                </div>
                <p class="fd-card__text">Berbagai program untuk mewujudkan dampak nyata.</p>
                <div class="fd-proggrid">
                    @foreach ($fd['programs'] as $p)
                        <a class="fd-progitem" href="{{ $r('programs') }}#{{ $p['slug'] }}">
                            <span class="fd-progitem__img"><img src="{{ $i($p['image']) }}" alt="" loading="lazy" width="525" height="360"></span>
                            <span class="fd-progitem__label">{{ $p['short'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </article>

        <article class="fd-card fd-c-impact fd-reveal">
            <span class="fd-c-impact__ring" aria-hidden="true"></span>
            <div class="fd-card__body">
                <div class="fd-ch fd-ch--light"><h2 class="fd-ch__title">Dampak Kami</h2><a class="fd-ch__more fd-ch__more--gold" href="{{ $r('impact') }}">Lihat Dampak <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a></div>
                <p class="fd-card__text">Bersama, kita telah memberikan manfaat untuk banyak orang.</p>
                <div class="fd-impact__stats">
                    @foreach ($fd['impact']['stats'] as $s)
                        <div class="fd-stat">
                            <img src="{{ $i($s['icon']) }}" alt="" width="44" height="44">
                            <strong><span data-fd-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}">{{ number_format($s['value'], 0, ',', '.') }}{{ $s['suffix'] }}</span></strong>
                            <small>{{ $s['label'] }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </div>

    {{-- ===== BARIS B: Donasi · Transparansi · Mitra ===== --}}
    <div class="fd-row fd-row--b">
        <article class="fd-card fd-c-donate fd-reveal">
            <div class="fd-card__body">
                <div class="fd-ch"><span class="fd-ch__ico fd-ch__ico--gold"><svg class="fd-ico fd-ico--fill"><use href="#fd-i-heart"/></svg></span><h2 class="fd-ch__title">Pilihan Donasi</h2></div>
                <p class="fd-card__text">Pilih cara terbaik untuk berbagi kebaikan.</p>
                <div class="fd-donategrid">
                    @foreach ($fd['donation']['options'] as $o)
                        <a class="fd-donateitem" href="{{ route('foundation-classic-trust.donation', ['jenis' => $o['key']]) }}">
                            <img src="{{ $i($o['icon']) }}" alt="" width="48" height="48" loading="lazy">
                            <span><b>{{ $o['title'] }}</b><small>{{ $o['sub'] }}</small></span>
                        </a>
                    @endforeach
                </div>
                <a class="fd-btn fd-btn--gold fd-btn--block" href="{{ $r('donation') }}">Donasi Sekarang <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </article>

        <article class="fd-card fd-c-fin fd-reveal">
            <div class="fd-c-fin__img" aria-hidden="true"><img src="{{ $i('report.jpg') }}" alt="" loading="lazy" width="1336" height="472"></div>
            <div class="fd-card__body">
                <div class="fd-ch"><span class="fd-ch__ico"><svg class="fd-ico"><use href="#fd-i-doc"/></svg></span><h2 class="fd-ch__title">Laporan Transparansi Keuangan</h2></div>
                <p class="fd-card__text">{{ $fd['financial']['summary'] }}</p>
                <a class="fd-btn fd-btn--navy" href="{{ $r('financial') }}">Lihat Laporan <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </article>

        <article class="fd-card fd-c-partners fd-reveal">
            <div class="fd-card__body">
                <div class="fd-ch"><span class="fd-ch__ico"><svg class="fd-ico"><use href="#fd-i-users"/></svg></span><h2 class="fd-ch__title">Mitra &amp; Sponsor</h2></div>
                <p class="fd-card__text">Bersama dengan berbagai pihak terpercaya.</p>
                <div class="fd-logos">
                    @foreach ($fd['partners'] as $p)
                        <span class="fd-logos__item"><img src="{{ $i($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" width="360" height="240"></span>
                    @endforeach
                </div>
                <a class="fd-btn fd-btn--outline" href="{{ $r('partners') }}">Lihat Semua Mitra <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </article>
    </div>

    {{-- ===== BARIS C: Relawan · Berita & Acara · Kutipan ===== --}}
    <div class="fd-row fd-row--c">
        <article class="fd-card fd-c-volunteer fd-reveal">
            <div class="fd-c-volunteer__img" aria-hidden="true"><img src="{{ $i('volunteer.jpg') }}" alt="" loading="lazy" width="688" height="528"></div>
            <div class="fd-card__body">
                <h2>Jadilah Relawan!</h2>
                <p>Bersama kita bisa memberikan lebih banyak manfaat.</p>
                <a class="fd-btn fd-btn--gold" href="{{ $r('volunteer') }}">Daftar Sekarang <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </article>

        <article class="fd-card fd-c-news fd-reveal">
            <div class="fd-card__body">
                <div class="fd-ch">
                    <span class="fd-ch__ico"><svg class="fd-ico"><use href="#fd-i-news"/></svg></span>
                    <h2 class="fd-ch__title">Berita &amp; Acara Terbaru</h2>
                    <a class="fd-ch__more" href="{{ $r('news') }}">Lihat Semua <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                </div>
                <p class="fd-card__text">Ikuti kabar terbaru dan kegiatan kami.</p>
                <div class="fd-newsgrid">
                    @foreach (array_slice($fd['news'], 0, 3) as $n)
                        <a class="fd-newsitem" href="{{ $r('news') }}#{{ $n['slug'] }}">
                            <span class="fd-newsitem__img"><img src="{{ $i($n['image']) }}" alt="" loading="lazy" width="525" height="360"></span>
                            <b>{{ $n['title'] }}</b>
                            <small><svg class="fd-ico"><use href="#fd-i-calendar"/></svg>{{ $n['date'] }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </article>

        <article class="fd-card fd-c-quote fd-reveal">
            <img src="{{ $i('quote.jpg') }}" alt="Kebaikan kecil, bisa membawa perubahan besar." loading="lazy" width="1095" height="942">
        </article>
    </div>
</div>
@endsection
