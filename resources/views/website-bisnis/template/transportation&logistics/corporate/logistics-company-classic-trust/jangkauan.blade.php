@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Jangkauan Layanan — Nusa Logistik')
@section('body_class', 'page-jangkauan')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'jangkauan'])

<section class="section">
    <div class="container">
        <div class="card card--pad coverage-big">
            <div class="map map--big">
                <img src="{{ $img('peta-indonesia.jpg') }}" alt="Peta jangkauan layanan Nusa Logistik di Indonesia" width="1968" height="432">
                @foreach ($c['coverage']['pins'] as $p)
                    <span class="map__pin" style="left: {{ $p['x'] }}%; top: {{ $p['y'] }}%" title="{{ $p['label'] }}" aria-hidden="true"></span>
                @endforeach
            </div>
            <ul class="stats stats--big">
                @foreach ($c['coverage']['stats'] as $st)
                    <li class="stat">
                        <svg class="ic" aria-hidden="true"><use href="#{{ $st['icon'] }}"/></svg>
                        <span><strong>{{ $st['value'] }}</strong><span>{{ $st['label'] }}</span></span>
                    </li>
                @endforeach
            </ul>
        </div>

        <h2 class="section__title">Wilayah layanan</h2>
        <ul class="region-grid">
            @foreach ($c['coverage']['regions'] as $r)
                <li class="region">
                    <span class="region__ic"><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg></span>
                    <h3>{{ $r['name'] }}</h3>
                    <p>{{ $r['text'] }}</p>
                </li>
            @endforeach
            <li class="region region--intl">
                <span class="region__ic"><svg class="ic" aria-hidden="true"><use href="#i-globe"/></svg></span>
                <h3>{{ $c['coverage']['international']['name'] }}</h3>
                <p>{{ $c['coverage']['international']['text'] }}</p>
            </li>
        </ul>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Cek apakah rute Anda terjangkau', 'ctaText' => 'Sebutkan asal dan tujuan pengiriman, kami konfirmasi layanan dan jadwalnya.'])
@endsection
