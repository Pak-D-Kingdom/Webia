@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Itinerary Perjalanan — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'RENCANA PERJALANAN', 'title' => 'Itinerary Perjalanan', 'desc' => 'Rangkaian perjalanan yang terstruktur dan nyaman dari keberangkatan hingga kembali.', 'bg' => 'itinerary-skyline.svg'])

<section class="uh-section">
    <div class="uh-container uh-itin">
        <ol class="uh-timeline">
            @foreach ($d['itinerary'] as $i => $day)
                <li data-reveal style="--d:{{ ($i % 3) * .06 }}s">
                    <span class="uh-timeline__dot">{{ $i + 1 }}</span>
                    <div class="uh-timeline__card">
                        <small>Hari {{ $i + 1 }}</small>
                        <h3>{{ $day[0] }}</h3>
                        <p>{{ $day[1] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
        <aside class="uh-itin__side" data-reveal>
            <img src="{{ $img('itinerary-skyline.svg') }}" alt="" loading="lazy">
            <div class="uh-itin__sidein">
                <h3>Umrah Reguler</h3>
                <p>{{ count($d['itinerary']) }} hari perjalanan bersama muthawwif berpengalaman.</p>
                <a class="uh-btn uh-btn--gold uh-btn--block" href="{{ $r('jadwal') }}">Lihat Jadwal</a>
                <a class="uh-btn uh-btn--outline uh-btn--block" href="{{ $wa($d['contact']['wa_text']) }}" target="_blank" rel="noopener">Konsultasi Gratis</a>
            </div>
        </aside>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
