@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Misi & Visi — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Misi & Visi Kami', 'lead' => $fd['mission']['summary']])

<section class="fd-section">
    <div class="fd-wrap fd-split">
        <div class="fd-reveal">
            <div class="fd-sectionhead"><h2>Visi</h2></div>
            <div class="fd-panel" style="border-left:5px solid var(--fd-gold)"><p style="font-size:16px;color:var(--fd-ink);line-height:1.7">{{ $fd['mission']['vision'] }}</p></div>
            <div class="fd-sectionhead" style="margin-top:30px"><h2>Misi</h2></div>
            <ul class="fd-list">
                @foreach ($fd['mission']['missions'] as $m)
                    <li><span class="fd-tick"><svg class="fd-ico"><use href="#fd-i-check"/></svg></span><span>{{ $m }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="fd-media fd-media--sm fd-reveal"><img src="{{ $i('mission-seed.jpg') }}" alt="Tangan menggenggam tanah dengan tunas tanaman muda" loading="lazy" style="aspect-ratio:1/1"></div>
    </div>
</section>

<section class="fd-section fd-section--tint">
    <div class="fd-wrap">
        <div class="fd-sectionhead fd-reveal"><h2>Nilai yang Kami Pegang</h2><p>Empat nilai yang memandu setiap program dan keputusan kami.</p></div>
        <div class="fd-grid fd-grid--4">
            @foreach ($fd['mission']['values'] as $v)
                <div class="fd-panel fd-value fd-reveal"><h3>{{ $v[0] }}</h3><p>{{ $v[1] }}</p></div>
            @endforeach
        </div>
    </div>
</section>
@include($fdBase . '.partials.cta', ['heading' => 'Lihat bagaimana misi kami diwujudkan', 'text' => 'Empat program utama yang menjangkau 34 provinsi.', 'label' => 'Lihat Program', 'route' => 'programs'])
@endsection
