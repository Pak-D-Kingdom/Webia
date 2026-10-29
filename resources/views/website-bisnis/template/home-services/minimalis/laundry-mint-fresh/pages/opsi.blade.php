@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Opsi Layanan — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['options']['title'], 'sub' => $c['options']['sub']])

    <div class="lw-container lw-page">
        <div class="lw-cards-2">
            @foreach ($c['options']['items'] as $o)
                <article class="lw-card lw-detail">
                    <div class="lw-detail__top">
                        <span class="lw-ico lw-ico--xl lw-ico--round"><svg class="lw-i"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                        <div>
                            <h2 class="lw-card__title">{{ $o['name'] }}</h2>
                            <span class="lw-badge">{{ $o['desc'] }}</span>
                        </div>
                    </div>
                    <p>{{ $o['long'] }}</p>
                    <p class="lw-note lw-note--plain"><svg class="lw-i"><use href="#i-tag"/></svg>{{ $o['extra'] }}</p>
                    <a class="lw-btn lw-btn--sm" href="{{ $r('inquiry') }}?opsi={{ rawurlencode($o['name']) }}">Pilih {{ $o['name'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                </article>
            @endforeach
        </div>
    </div>
@endsection
