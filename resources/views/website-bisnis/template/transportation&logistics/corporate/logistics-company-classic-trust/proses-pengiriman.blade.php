@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Proses Pengiriman — Nusa Logistik')
@section('body_class', 'page-proses')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'proses-pengiriman'])

<section class="section">
    <div class="container container--mid">
        <ol class="timeline">
            @foreach ($c['process']['steps'] as $st)
                <li class="timeline__item">
                    <span class="timeline__dot"><svg class="ic" aria-hidden="true"><use href="#{{ $st['icon'] }}"/></svg></span>
                    <div class="timeline__card card">
                        <p class="timeline__num">Tahap {{ $loop->iteration }}</p>
                        <h2>{{ $st['title'] }}</h2>
                        <p class="timeline__lead">{{ $st['text'] }}</p>
                        <p>{{ $st['detail'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Siap memulai pengiriman?', 'ctaText' => 'Isi form penawaran atau lacak pengiriman yang sedang berjalan.'])
@endsection
