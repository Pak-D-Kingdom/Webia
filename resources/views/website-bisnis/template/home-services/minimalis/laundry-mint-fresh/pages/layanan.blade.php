@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Layanan Laundry — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['services']['title'], 'sub' => $c['services']['sub']])

    <div class="lw-container lw-page">
        <div class="lw-cards-2">
            @foreach ($c['services']['items'] as $s)
                <article class="lw-card lw-detail" id="{{ $s['key'] }}">
                    <div class="lw-detail__top">
                        <span class="lw-ico lw-ico--xl"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <div>
                            <h2 class="lw-card__title">{{ $s['name'] }}</h2>
                            <span class="lw-badge">{{ $s['tag'] }}</span>
                        </div>
                    </div>
                    <p>{{ $s['desc'] }}</p>
                    <ul class="lw-checks">
                        @foreach ($s['features'] as $f)
                            <li><svg class="lw-i"><use href="#i-check"/></svg>{{ $f }}</li>
                        @endforeach
                    </ul>
                    <dl class="lw-meta">
                        <div><dt>Mulai dari</dt><dd>{{ $s['from'] }}</dd></div>
                        <div><dt>Estimasi</dt><dd>{{ $s['time'] }}</dd></div>
                    </dl>
                    <a class="lw-btn lw-btn--sm" href="{{ $r('inquiry') }}?layanan={{ rawurlencode($s['name']) }}">Pesan Layanan Ini <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                </article>
            @endforeach
        </div>
    </div>
@endsection
