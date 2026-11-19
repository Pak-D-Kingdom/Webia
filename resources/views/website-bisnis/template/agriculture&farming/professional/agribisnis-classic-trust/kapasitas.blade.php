@extends($v . '.layout')

@section('title', 'Kapasitas Pasokan — AgroTrade')
@section('description', 'Kapasitas pasokan AgroTrade lebih dari 10.000 ton per tahun dari jaringan petani mitra di 12 provinsi.')

@section('content')
@php
    $img = fn ($f) => asset($agro['img_path'] . '/' . $f);
    $cap = $agro['capacity'];
    $toNum = fn ($s) => (int) str_replace('.', '', preg_replace('/[^\d.]/', '', $s));
    $max = 1;
    foreach ($agro['commodities'] as $c) { $max = max($max, $toNum($c['capacity'])); }
@endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Kapasitas Pasokan',
    'ph_lead'  => $cap['text'],
    'ph_icon'  => 'sprout',
])

<section class="container section">
    <div class="split">
        <article class="card card--leaf bigstat">
            <span class="bigico bigico--leaf"><svg class="i" aria-hidden="true"><use href="#i-sprout"/></svg></span>
            <div>
                <small>Total kapasitas</small>
                <strong>&gt; <span data-count="{{ $cap['number'] }}">{{ $cap['number_fmt'] }}</span> Ton</strong>
                <p>{{ $cap['unit'] }} — dari jaringan petani mitra dan pusat pengolahan yang tersebar di sentra produksi utama.</p>
            </div>
        </article>
        <ul class="statgrid">
            @foreach ($cap['stats'] as $s)
                <li><strong><span data-count="{{ $s['num'] }}">{{ $s['fmt'] }}</span>{{ $s['suf'] }}</strong><span>{{ $s['label'] }}</span></li>
            @endforeach
        </ul>
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Kapasitas per Komoditas</h2></div>
    <ul class="bars">
        @foreach ($agro['commodities'] as $c)
            @php $pct = max(6, round($toNum($c['capacity']) / $max * 100)); @endphp
            <li>
                <span class="bars__name"><svg class="i" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg>{{ $c['name'] }}</span>
                <span class="bars__track" role="img" aria-label="{{ $c['name'] }}: {{ $c['capacity'] }} per tahun"><span class="bars__fill" style="width: {{ $pct }}%"></span></span>
                <span class="bars__val">{{ $c['capacity'] }}</span>
            </li>
        @endforeach
    </ul>
    <p class="note">Angka merupakan kapasitas pasokan tahunan per komoditas dan dapat berubah mengikuti musim.</p>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Dukungan Rantai Pasok</h2></div>
    <ul class="grid grid--2 checks">
        @foreach ($cap['points'] as $p)
            <li class="check-row"><span class="tick"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg></span><span>{{ $p }}</span></li>
        @endforeach
    </ul>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Butuh kepastian pasokan jangka panjang?',
    'cta_text'  => 'Diskusikan kontrak tahunan dengan jadwal pengiriman tetap per bulan.',
])
@endsection
