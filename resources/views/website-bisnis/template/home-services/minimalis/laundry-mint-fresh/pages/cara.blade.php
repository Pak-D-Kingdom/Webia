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
    @include($v . '.partials.page-header', ['title' => $c['steps']['title'], 'sub' => $c['steps']['sub']])

    <div class="lw-container lw-page lw-page--narrow">
        <ol class="lw-stepper">
            @foreach ($c['steps']['items'] as $s)
                <li class="lw-card">
                    <span class="lw-stepper__no" aria-hidden="true">{{ $loop->iteration }}</span>
                    <span class="lw-ico lw-ico--lg lw-ico--round"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <div>
                        <h2 class="lw-card__title lw-card__title--sm">{{ $s['name'] }}</h2>
                        <p>{{ $s['long'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
        <div class="lw-actions lw-actions--center">
            <a class="lw-btn" href="{{ $r('inquiry') }}">Isi Form Pemesanan <svg class="lw-i"><use href="#i-arrow"/></svg></a>
            <button class="lw-btn lw-btn--ghost" type="button" data-lw-chat-topic="pesan">Tanya Cara Pembayaran</button>
        </div>
    </div>
@endsection
