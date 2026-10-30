@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Tracking Pengiriman — Nusa Logistik')
@section('body_class', 'page-tracking')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'tracking'])

<section class="section">
    <div class="container container--mid">
        <div class="card card--pad track-page" data-track-page>
            <h2 class="card__title">{{ $c['tracking']['title'] }}</h2>
            <p class="card__sub">{{ $c['tracking']['subtitle'] }}</p>

            <form class="track-form track-form--lg" data-track-form action="{{ $route('tracking') }}" method="get" novalidate>
                <label class="sr-only" for="resi-page">Nomor resi</label>
                <input id="resi-page" name="resi" type="text" data-track-input placeholder="{{ $c['tracking']['placeholder'] }}" autocomplete="off" autocapitalize="characters" required>
                <button class="btn btn--blue btn--lg" type="submit">{{ $c['tracking']['button'] }}</button>
            </form>

            @foreach ($c['tracking']['demo'] as $no => $d)
                @if ($loop->first)
                    <p class="hint">Coba nomor contoh (demo):
                @endif
                <button type="button" class="link-btn" data-track-demo="{{ $no }}">{{ $no }}</button>@if (! $loop->last), @endif
                @if ($loop->last)
                    </p>
                @endif
            @endforeach

            <p class="form-msg" data-track-msg role="alert" hidden></p>

            <div class="track-result" data-track-result hidden>
                <dl class="track-summary" data-track-summary></dl>
                <ol class="track-steps track-steps--lg" data-track-steps>
                    @foreach ($c['tracking']['steps'] as $ts)
                        <li class="track-step">
                            <span class="track-step__dot"><svg class="ic" aria-hidden="true"><use href="#{{ $ts['icon'] }}"/></svg></span>
                            <span>{{ $ts['label'] }}</span>
                        </li>
                    @endforeach
                </ol>
                <h3 class="track-history__title">Riwayat pengiriman</h3>
                <ol class="track-history" data-track-history></ol>
            </div>
        </div>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Butuh bantuan soal pengiriman Anda?', 'ctaText' => 'Hubungi tim kami atau tanyakan langsung kepada Nusa AI.'])
@endsection
