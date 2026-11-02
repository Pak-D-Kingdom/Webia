@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Armada & Gudang — Nusa Logistik')
@section('body_class', 'page-armada')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'armada-gudang'])

<section class="section">
    <div class="container">
        <div class="feature-list">
            @foreach ($c['fleet']['items'] as $f)
                <article class="feature {{ $loop->even ? 'feature--rev' : '' }}" id="{{ $f['slug'] }}">
                    <figure class="feature__media">
                        <img src="{{ $img($f['img']) }}" alt="{{ $f['title'] }}" width="636" height="360" loading="lazy">
                    </figure>
                    <div class="feature__body">
                        <p class="eyebrow">{{ $f['text'] }}</p>
                        <h2>{{ $f['title'] }}</h2>
                        <p>{{ $f['detail'] }}</p>
                        <ul class="check-list">
                            @foreach ($f['points'] as $pt)
                                <li><svg class="ic" aria-hidden="true"><use href="#i-check"/></svg>{{ $pt }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Perlu armada atau gudang untuk bisnis Anda?', 'ctaText' => 'Diskusikan kapasitas, rute, dan kebutuhan penyimpanan bersama tim kami.'])
@endsection
