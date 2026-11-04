@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Dampak Kami — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Dampak Kami', 'lead' => 'Bersama, kita telah memberikan manfaat untuk banyak orang di seluruh Indonesia.'])

<section class="fd-section">
    <div class="fd-wrap">
        <div class="fd-bigstats">
            @foreach ($fd['impact']['stats'] as $s)
                <div class="fd-bigstat fd-reveal">
                    <img src="{{ $i($s['icon']) }}" alt="" width="56" height="56">
                    <div><strong><span data-fd-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}">{{ number_format($s['value'], 0, ',', '.') }}{{ $s['suffix'] }}</span></strong><small>{{ $s['label'] }}</small></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="fd-section fd-section--tint">
    <div class="fd-wrap">
        <div class="fd-sectionhead fd-reveal"><h2>Dampak per Program</h2><p>Capaian kumulatif pada empat program utama.</p></div>
        <div class="fd-grid fd-grid--4">
            @foreach ($fd['programs'] as $p)
                <a class="fd-pcard fd-reveal" href="{{ $r('programs') }}#{{ $p['slug'] }}">
                    <img src="{{ $i($p['image']) }}" alt="" loading="lazy">
                    <div class="fd-pcard__body"><h3>{{ $p['title'] }}</h3><div class="fd-pcard__stat"><span>{{ $p['stat'][0] }}</span><small>{{ $p['stat'][1] }}</small></div></div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="fd-section">
    <div class="fd-wrap fd-split" style="align-items:start">
        <div class="fd-panel fd-reveal">
            <h3>Pertumbuhan Penerima Manfaat</h3>
            <p>Indeks per tahun (2026 = 100).</p>
            <div class="fd-bars" role="img" aria-label="Grafik pertumbuhan penerima manfaat 2022 sampai 2026">
                @foreach ($fd['impact']['by_year'] as $y)
                    <div><b>{{ $y[1] }}</b><i data-h="{{ $y[1] }}"></i><span>{{ $y[0] }}</span></div>
                @endforeach
            </div>
        </div>
        <div class="fd-reveal">
            <div class="fd-sectionhead" style="margin-bottom:18px"><h2>Perjalanan Kami</h2></div>
            <ul class="fd-timeline">
                @foreach ($fd['impact']['milestones'] as $m)
                    <li><b>{{ $m[0] }}</b>{{ $m[1] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@include($fdBase . '.partials.cta', ['heading' => 'Jadi bagian dari dampak berikutnya', 'text' => 'Donasi Anda langsung bekerja untuk program yang membutuhkan.', 'label' => 'Donasi Sekarang', 'route' => 'donation'])
@endsection
