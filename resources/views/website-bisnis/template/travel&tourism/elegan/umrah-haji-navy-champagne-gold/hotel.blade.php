@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Hotel & Pesawat — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'AKOMODASI & PENERBANGAN', 'title' => 'Hotel & Pesawat', 'desc' => 'Hotel bintang terbaik dan maskapai pilihan untuk perjalanan yang lebih nyaman.', 'bg' => 'hotel-flight.svg', 'chips' => ['Hotel bintang 3–5', 'Dekat Masjidil Haram', 'Maskapai terbaik']])

<section class="uh-section">
    <div class="uh-container">
        <div class="uh-secthead" data-reveal>
            <small>Akomodasi</small>
            <h2>Hotel di Makkah &amp; Madinah</h2>
            <p>Pilihan hotel bintang 3 hingga 5 yang dekat dengan masjid.</p>
            <i class="uh-orn"></i>
        </div>
        <div class="uh-hotels">
            @foreach ($d['hotels'] as $i => $h)
                <article class="uh-hotel" data-reveal style="--d:{{ $i * .08 }}s">
                    <div class="uh-hotel__img"><img src="{{ $img($h['image']) }}" alt="{{ $h['name'] }}" loading="lazy"></div>
                    <div class="uh-hotel__body">
                        <span class="uh-stars" aria-label="Bintang {{ $h['stars'] }}">@for ($s = 0; $s < 5; $s++)<svg class="uh-ico {{ $s < $h['stars'] ? 'is-on' : '' }}" aria-hidden="true"><use href="#i-star"/></svg>@endfor</span>
                        <h3>{{ $h['name'] }}</h3>
                        <p>{{ $h['note'] }}</p>
                        <ul>
                            <li><svg class="uh-ico" aria-hidden="true"><use href="#i-pin"/></svg><span><b>Makkah</b> {{ $h['makkah'] }}</span></li>
                            <li><svg class="uh-ico" aria-hidden="true"><use href="#i-pin"/></svg><span><b>Madinah</b> {{ $h['madinah'] }}</span></li>
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="uh-secthead" data-reveal>
            <small>Penerbangan</small>
            <h2>Maskapai Penerbangan</h2>
            <p>Maskapai terbaik dengan jadwal dan rute yang nyaman bagi jamaah.</p>
            <i class="uh-orn"></i>
        </div>
        <div class="uh-flights">
            @foreach ($d['flights'] as $i => $f)
                <article class="uh-flight" data-reveal style="--d:{{ $i * .08 }}s">
                    <span class="uh-flight__ico"><svg class="uh-ico" aria-hidden="true"><use href="#i-plane"/></svg></span>
                    <div><h3>{{ $f['airline'] }}</h3><b>{{ $f['route'] }}</b><p>{{ $f['info'] }}</p></div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
