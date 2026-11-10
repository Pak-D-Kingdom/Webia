@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Hotel &amp; Pesawat — Nur Rahmat Travel')
@section('description', 'Informasi hotel bintang 3-5 dekat masjid dan maskapai pilihan untuk perjalanan umrah dan haji bersama Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'hotel-flight'])

    <section class="uh-section">
        <div class="uh-container uh-stack">
            <article class="uh-block" id="hotel">
                <figure class="uh-block__media">
                    <img src="{{ $img($uh['hotels']['hotel']['image']) }}" alt="Kamar hotel nyaman dekat masjid" width="504" height="255" loading="lazy">
                </figure>
                <div class="uh-block__body">
                    <h2 class="uh-block__title"><svg class="uh-i" aria-hidden="true"><use href="#i-hotel"/></svg>Hotel pilihan</h2>
                    <p class="uh-block__text">Kami memilih hotel yang dekat dengan masjid agar jemaah dapat beribadah dengan lebih hemat tenaga dan waktu, lengkap dengan fasilitas yang nyaman untuk beristirahat.</p>
                    <ul class="uh-checklist">
                        @foreach ($uh['hotels']['hotel']['points'] as $p)
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg><span>{{ $p }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </article>

            <div class="uh-staygrid">
                @foreach ($uh['hotels']['stay'] as $s)
                    <article class="uh-stay">
                        <header class="uh-stay__head">
                            <h3 class="uh-stay__city">{{ $s['city'] }}</h3>
                            <span class="uh-tag">{{ $s['level'] }}</span>
                        </header>
                        <p class="uh-stay__dist"><svg class="uh-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $s['distance'] }}</p>
                        <ul class="uh-pills">
                            @foreach ($s['facilities'] as $f)
                                <li>{{ $f }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>

            <article class="uh-block uh-block--reverse" id="pesawat">
                <figure class="uh-block__media">
                    <img src="{{ $img($uh['hotels']['plane']['image']) }}" alt="Pesawat terbang di atas awan" width="504" height="255" loading="lazy">
                </figure>
                <div class="uh-block__body">
                    <h2 class="uh-block__title"><svg class="uh-i" aria-hidden="true"><use href="#i-plane"/></svg>Penerbangan</h2>
                    <ul class="uh-checklist">
                        @foreach ($uh['hotels']['plane']['points'] as $p)
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg><span>{{ $p }}</span></li>
                        @endforeach
                    </ul>
                    <dl class="uh-facts uh-facts--list">
                        @foreach ($uh['hotels']['flight'] as $f)
                            <div><dt>{{ $f[0] }}</dt><dd>{{ $f[1] }}</dd></div>
                        @endforeach
                    </dl>
                </div>
            </article>
        </div>
    </section>
@endsection
