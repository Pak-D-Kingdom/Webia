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
    @include($v . '.partials.page-header', ['title' => $c['turnaround']['title'], 'sub' => $c['turnaround']['sub']])

    <div class="lw-container lw-page">
        <div class="lw-split">
            <article class="lw-card">
                <img class="lw-time-art" src="{{ $img($c['img']['clock']) }}" alt="" width="366" height="174">
                <ul class="lw-time-list lw-time-list--full">
                    @foreach ($c['turnaround']['items'] as $t)
                        <li><span class="lw-ico lw-ico--round"><svg class="lw-i"><use href="#i-{{ $t['icon'] }}"/></svg></span><span>{{ $t['name'] }}</span><b>{{ $t['time'] }}</b></li>
                    @endforeach
                </ul>
                <p class="lw-note"><svg class="lw-i"><use href="#i-clock"/></svg>{{ $c['turnaround']['note'] }}</p>
            </article>

            <article class="lw-card">
                <h2 class="lw-card__title">{{ $c['turnaround']['process_title'] }}</h2>
                <ol class="lw-timeline">
                    @foreach ($c['turnaround']['process'] as $p)
                        <li>
                            <span class="lw-ico lw-ico--round"><svg class="lw-i"><use href="#i-{{ $p['icon'] }}"/></svg></span>
                            <div><strong>{{ $p['name'] }}</strong><p>{{ $p['desc'] }}</p></div>
                        </li>
                    @endforeach
                </ol>
                <button class="lw-btn lw-btn--sm" type="button" data-lw-chat-topic="proses">Tanya Proses ke FreshBot</button>
            </article>
        </div>
    </div>
@endsection
