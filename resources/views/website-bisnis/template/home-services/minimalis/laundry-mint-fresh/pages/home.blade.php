@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('body_class', 'lw-home')

@section('content')
    {{-- ===== HERO BANNER ===== --}}
    <section class="lw-hero" aria-labelledby="lw-hero-title">
        <img class="lw-hero__img" src="{{ $img($c['img']['hero']) }}" alt="" fetchpriority="high">
        <img class="lw-hero__leaf lw-hero__leaf--l" src="{{ $img($c['img']['leaf_l']) }}" alt="" aria-hidden="true">
        <img class="lw-hero__leaf lw-hero__leaf--r" src="{{ $img($c['img']['leaf_r']) }}" alt="" aria-hidden="true">

        <div class="lw-container lw-hero__in">
            <div class="lw-hero__copy">
                <span class="lw-pill">{{ $c['hero']['badge'] }}</span>
                <h1 class="lw-h1 lw-hero__title" id="lw-hero-title">
                    {{ $c['hero']['title_1'] }}<br><span>{{ $c['hero']['title_2'] }}</span>
                </h1>
                <p class="lw-lead">{{ $c['hero']['text'] }}</p>

                <ul class="lw-feats">
                    @foreach ($c['hero']['features'] as $f)
                        <li>
                            <span class="lw-hex"><svg class="lw-i"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                            <span>{{ $f['l1'] }}<br>{{ $f['l2'] }}</span>
                        </li>
                    @endforeach
                </ul>

                <a class="lw-btn lw-btn--lg" href="{{ $r('inquiry') }}">{{ $c['hero']['cta'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
            </div>

            <p class="lw-script lw-hero__script" aria-hidden="true">
                @foreach ($c['hero']['script'] as $w)<span>{{ $w }}</span>@endforeach
                <svg class="lw-i"><use href="#i-leaf"/></svg>
            </p>
        </div>
    </section>

    {{-- ===== PREVIEW SECTION ===== --}}
    <div class="lw-container lw-home-wrap">
        <div class="lw-grid lw-grid--a">
            @include($v . '.sections.layanan')
            @include($v . '.sections.harga')
            @include($v . '.sections.opsi')
            @include($v . '.sections.estimasi')
        </div>

        <div class="lw-grid lw-grid--b">
            @include($v . '.sections.area')
            @include($v . '.sections.cara')
            @include($v . '.sections.jam')
            @include($v . '.sections.inquiry')
        </div>

        @include($v . '.sections.chatbot')
    </div>
@endsection
