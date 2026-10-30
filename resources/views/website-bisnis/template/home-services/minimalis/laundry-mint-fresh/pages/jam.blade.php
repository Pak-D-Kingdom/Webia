@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Jam Operasional — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['hours']['title'], 'sub' => $c['hours']['label'] . ' · ' . $c['hours']['time'] . ' WIB'])

    <div class="lw-container lw-page lw-page--narrow">
        <div class="lw-split">
            @include($v . '.sections.jam')

            <article class="lw-card">
                <h2 class="lw-card__title lw-card__title--sm">Jadwal Mingguan</h2>
                <ul class="lw-week" data-lw-week>
                    @foreach ($c['hours']['days'] as $d)
                        <li data-day="{{ $d['n'] }}"><span>{{ $d['d'] }}</span><b>{{ $c['hours']['time'] }}</b></li>
                    @endforeach
                </ul>
                <p class="lw-note"><svg class="lw-i"><use href="#i-calendar"/></svg>{{ $c['hours']['note'] }}</p>
            </article>
        </div>
    </div>
@endsection
