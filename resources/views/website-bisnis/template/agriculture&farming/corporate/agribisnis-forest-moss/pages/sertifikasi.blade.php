@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Sertifikasi — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['sertifikasi']])

    <section class="section container">
        <ul class="feature-grid feature-grid--4">
            @foreach($cfg['certs']['items'] as $c)
                <li class="feature feature--center">
                    <span class="feature__logo"><img src="{{ asset($cfg['img'][$c['img']]) }}" alt="{{ $c['name'] }}" loading="lazy" width="120" height="80"></span>
                    <h2>{{ $c['name'] }}</h2>
                    <p>{{ $c['desc'] }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    <div class="container section section--tight">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>
@endsection
