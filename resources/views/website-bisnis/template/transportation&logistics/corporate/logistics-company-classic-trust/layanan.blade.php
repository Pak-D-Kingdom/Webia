@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Layanan Logistik — Nusa Logistik')
@section('body_class', 'page-layanan')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'layanan'])

<section class="section">
    <div class="container">
        <div class="svc-detail-grid">
            @foreach ($c['services'] as $s)
                <article class="svc-detail" id="{{ $s['slug'] }}">
                    <div class="svc-detail__top">
                        <svg class="svc-detail__ic" aria-hidden="true"><use href="#{{ $s['icon'] }}"/></svg>
                        <h2>{{ $s['title'] }}</h2>
                    </div>
                    <p class="svc-detail__desc">{{ $s['desc'] }}</p>
                    <ul class="check-list">
                        @foreach ($s['features'] as $f)
                            <li><svg class="ic" aria-hidden="true"><use href="#i-check"/></svg>{{ $f }}</li>
                        @endforeach
                    </ul>
                    <a class="btn btn--outline btn--sm" href="{{ $route('penawaran') }}?layanan={{ rawurlencode($s['title']) }}">Minta Penawaran
                        <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Butuh solusi pengiriman yang sesuai?', 'ctaText' => 'Ceritakan kebutuhan Anda dan tim kami akan menyiapkan penawaran terbaik.'])
@endsection
