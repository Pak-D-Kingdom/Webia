@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Kapasitas Pasokan — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['kapasitas']])

    <section class="section container">
        <div class="split split--supply">
            <div class="bigstat">
                <span class="bigstat__ic" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"><path d="m32 6 14 8v16l-14 8-14-8V14zM18 30l-14 8v16l14 8 14-8V38zM46 30l14 8v16l-14 8-14-8V38z" opacity=".9"/><path d="m18 14 14 8 14-8M32 22v16M4 38l14 8 14-8M32 38l14 8 14-8" opacity=".55"/></svg>
                </span>
                <p class="bigstat__val">{{ $cfg['supply']['value'] }}</p>
                <p class="bigstat__unit">{{ $cfg['supply']['unit'] }}</p>
                <p class="bigstat__note">{{ $cfg['supply']['sub'] }}</p>
            </div>
            <div class="card card--flat">
                <header class="card__head"><h2 class="card__title">Kapasitas per Komoditas</h2><p class="card__sub">Perkiraan kapasitas pasokan tahunan.</p></header>
                <ul class="bars">
                    @foreach($cfg['supply']['items'] as $b)
                        <li>
                            <div class="bars__top"><b>{{ $b[0] }}</b><span>{{ $b[1] }}</span></div>
                            <div class="bars__track" role="img" aria-label="{{ $b[0] }} {{ $b[1] }}"><i style="width: {{ $b[2] }}%"></i></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <div class="container section section--tight">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>
@endsection
