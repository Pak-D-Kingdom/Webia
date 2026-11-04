@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Jangkauan Distribusi — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['distribusi']])

    <section class="section container">
        <div class="card card--flat card--map">
            <img src="{{ asset($cfg['img']['peta']) }}" alt="Peta jangkauan distribusi dunia" width="600" height="250">
            <p class="coverage__regions coverage__regions--lg">
                @foreach($cfg['coverage']['regions'] as $r)<span>{{ $r }}</span>@endforeach
            </p>
        </div>
        <ul class="feature-grid feature-grid--5">
            @foreach($cfg['coverage']['items'] as $r)
                <li class="feature">
                    <span class="feature__ic"><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg></span>
                    <h2>{{ $r[0] }}</h2>
                    <p>{{ $r[1] }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    <div class="container section section--tight">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>
@endsection
