@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Klien Korporat — Nusa Logistik')
@section('body_class', 'page-klien')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'klien'])

<section class="section">
    <div class="container">
        <ul class="client-grid">
            @foreach ($c['clients']['items'] as $cl)
                <li class="client-card">
                    <span class="client-card__logo"><img src="{{ $img($cl['img']) }}" alt="{{ $cl['name'] }}"></span>
                    <span class="client-card__name">{{ $cl['name'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Bergabung bersama mitra kami', 'ctaText' => 'Dapatkan penawaran logistik yang dirancang untuk skala dan industri bisnis Anda.'])
@endsection
