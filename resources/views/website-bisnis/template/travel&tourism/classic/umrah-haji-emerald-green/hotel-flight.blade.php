@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Hotel &amp; Pesawat — Nur Rahmat Travel')
@section('description', 'Informasi hotel bintang 3-5 dekat masjid dan maskapai pilihan untuk perjalanan umrah dan haji bersama Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'hotel-flight'])

    <section class="uh-section">
        <div class="uh-container uh-stack">

            <article class="uh-feature" id="hotel">
                <figure class="uh-feature__media uh-frame"><img class="uh-frame__bg" src="{{ $img($uh['hotels']['hotel']['image']) }}" alt="" aria-hidden="true" loading="lazy">
                    <img src="{{ $img($uh['hotels']['hotel']['image']) }}" alt="Kamar hotel nyaman dekat masjid" width="336" height="170" loading="lazy">
                </figure>
                <div class="uh-feature__body">
                    <span class="uh-eyebrow">Akomodasi</span>
                    <h2 class="uh-feature__title"><svg class="uh-i" aria-hidden="true"><use href="#i-hotel"/></svg>Hotel pilihan</h2>
                    <p class="uh-feature__text">Kami memilih hotel yang dekat dengan masjid agar jemaah dapat beribadah dengan lebih hemat tenaga dan waktu, lengkap dengan fasilitas yang nyaman untuk beristirahat.</p>
                    <ul class="uh-feature__points">
                        @foreach ($uh['hotels']['hotel']['points'] as $p)
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $p }}</li>
                        @endforeach
                    </ul>
                    <a class="uh-btn uh-btn--outline uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin menanyakan pilihan hotel untuk paket umrah/haji.') }}" target="_blank" rel="noopener noreferrer">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Tanya pilihan hotel</span>
                    </a>
                </div>
            </article>

            <div class="uh-staygrid">
                @foreach ($uh['hotels']['stay'] as $s)
                    <article class="uh-stay">
                        <span class="uh-stay__badge" aria-hidden="true"><svg class="uh-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <header class="uh-stay__head">
                            <h3 class="uh-stay__city">{{ $s['city'] }}</h3>
                            <p class="uh-stay__stars" role="img" aria-label="{{ $s['level'] }}">
                                @foreach (array_slice([1, 2, 3, 4, 5], 0, $s['stars']) as $x)
                                    <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                                @endforeach
                                <span>{{ $s['level'] }}</span>
                            </p>
                        </header>
                        <p class="uh-stay__dist"><svg class="uh-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $s['distance'] }}</p>
                        <p class="uh-stay__walk">{{ $s['walk'] }}</p>
                        <ul class="uh-pills">
                            @foreach ($s['facilities'] as $f)
                                <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $f }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>

            <article class="uh-pass" id="pesawat" aria-label="Informasi penerbangan">
                <div class="uh-pass__main">
                    <header class="uh-pass__head">
                        <span class="uh-pass__brand"><svg class="uh-i" aria-hidden="true"><use href="#i-plane"/></svg>Informasi penerbangan</span>
                        <span class="uh-pass__trip">{{ $uh['hotels']['flight_card']['trip'] }}</span>
                    </header>
                    <p class="uh-pass__airline">{{ $uh['hotels']['flight_card']['airline'] }}</p>

                    <div class="uh-pass__route">
                        <div class="uh-pass__stop">
                            <strong>{{ $uh['hotels']['flight_card']['from'][0] }}</strong>
                            <span>{{ $uh['hotels']['flight_card']['from'][1] }}</span>
                        </div>
                        <div class="uh-pass__path" aria-hidden="true">
                            <span class="uh-pass__line"></span>
                            <svg class="uh-i uh-pass__plane"><use href="#i-plane"/></svg>
                        </div>
                        <div class="uh-pass__stop uh-pass__stop--end">
                            <strong>{{ $uh['hotels']['flight_card']['to'][0] }}</strong>
                            <span>{{ $uh['hotels']['flight_card']['to'][1] }}</span>
                            <small>{{ $uh['hotels']['flight_card']['to_alt'] }}</small>
                        </div>
                    </div>

                    <dl class="uh-pass__info">
                        @foreach ($uh['hotels']['flight_card']['info'] as $f)
                            <div><dt>{{ $f[0] }}</dt><dd>{{ $f[1] }}</dd></div>
                        @endforeach
                    </dl>
                </div>

                <div class="uh-pass__stub">
                    <figure class="uh-pass__media uh-frame"><img class="uh-frame__bg" src="{{ $img($uh['hotels']['plane']['image']) }}" alt="" aria-hidden="true" loading="lazy">
                        <img src="{{ $img($uh['hotels']['plane']['image']) }}" alt="Pesawat terbang di atas awan" width="252" height="128" loading="lazy">
                    </figure>
                    <ul class="uh-feature__points">
                        @foreach ($uh['hotels']['plane']['points'] as $p)
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $p }}</li>
                        @endforeach
                    </ul>
                    <a class="uh-btn uh-btn--gold uh-btn--sm uh-btn--block" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin menanyakan jadwal penerbangan paket umrah/haji.') }}" target="_blank" rel="noopener noreferrer">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Tanya jadwal terbang</span>
                    </a>
                </div>
            </article>

        </div>
    </section>
@endsection
