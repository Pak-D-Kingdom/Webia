@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Cara Pemesanan — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['steps']['title'], 'sub' => $c['steps']['sub'], 'icon' => 'form'])

    <div class="lw-container lw-page">
        <div class="lw-split lw-split--side">
            <ol class="lw-stepper">
                @foreach ($c['steps']['items'] as $s)
                    <li class="lw-card">
                        <span class="lw-stepper__no" aria-hidden="true">{{ $loop->iteration }}</span>
                        <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <div>
                            <h2 class="lw-card__title lw-card__title--sm">{{ $s['name'] }}</h2>
                            <p>{{ $s['long'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>

            <aside class="lw-stack">
                <article class="lw-card lw-aside lw-aside--bot">
                    <img src="{{ $img($c['img']['bot_left']) }}" alt="" aria-hidden="true" loading="lazy" width="696" height="357">
                    <h2 class="lw-card__title">{{ $c['chatbot']['title'] }}</h2>
                    <p>{{ $c['chatbot']['sub'] }}</p>
                    <button class="lw-btn" type="button" data-lw-chat-topic="pesan">{{ $c['chatbot']['cta'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></button>
                </article>
                <article class="lw-card lw-aside">
                    <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-form"/></svg></span>
                    <h2 class="lw-card__title lw-card__title--sm">{{ $c['inquiry']['title'] }}</h2>
                    <p>{{ $c['inquiry']['sub'] }}</p>
                    <a class="lw-btn" href="{{ $r('inquiry') }}">{{ $c['cta']['primary'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                </article>
            </aside>
        </div>
    </div>

    @include($v . '.partials.cta')
@endsection
