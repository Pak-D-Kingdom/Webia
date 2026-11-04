@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Estimasi Waktu Pengerjaan — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['turnaround']['title'], 'sub' => $c['turnaround']['sub'], 'icon' => 'clock'])

    <div class="lw-container lw-page">
        <ul class="lw-stats">
            @foreach ($c['turnaround']['items'] as $t)
                <li class="lw-card lw-stat">
                    <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-{{ $t['icon'] }}"/></svg></span>
                    <b>{{ $t['time'] }}</b>
                    <span>{{ $t['name'] }}</span>
                </li>
            @endforeach
        </ul>

        <article class="lw-card lw-process">
            <h2 class="lw-card__title">{{ $c['turnaround']['process_title'] }}</h2>
            <ol class="lw-hsteps">
                @foreach ($c['turnaround']['process'] as $p)
                    <li>
                        <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-{{ $p['icon'] }}"/></svg></span>
                        <strong>{{ $loop->iteration }}. {{ $p['name'] }}</strong>
                        <p>{{ $p['desc'] }}</p>
                    </li>
                @endforeach
            </ol>
        </article>

        <article class="lw-card lw-card--row">
            <img class="lw-time-art" src="{{ $img($c['img']['clock']) }}" alt="" width="366" height="174" loading="lazy">
            <p class="lw-note"><svg class="lw-i"><use href="#i-clock"/></svg>{{ $c['turnaround']['note'] }}</p>
            <button class="lw-btn lw-btn--sm" type="button" data-lw-chat-topic="proses">Tanya Proses ke FreshBot</button>
        </article>
    </div>

    @include($v . '.partials.cta')
@endsection
