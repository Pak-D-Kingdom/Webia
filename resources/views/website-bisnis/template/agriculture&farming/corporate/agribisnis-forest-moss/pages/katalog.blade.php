@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Katalog Komoditas — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['katalog']])

    <section class="section container">
        <div class="catalog">
            @foreach($cfg['commodities'] as $c)
                <article class="pcard" id="{{ $c['key'] }}">
                    <div class="pcard__img"><img src="{{ asset($cfg['img'][$c['img']]) }}" alt="{{ $c['name'] }} — {{ $c['variant'] }}" loading="lazy" width="291" height="273"></div>
                    <div class="pcard__body">
                        <p class="pcard__tag">{{ $c['variant'] }}</p>
                        <h2>{{ $c['name'] }}</h2>
                        <p>{{ $c['desc'] }}</p>
                        <dl class="facts">
                            @foreach($c['facts'] as $f)
                                <div><dt>{{ $f[0] }}</dt><dd>{{ $f[1] }}</dd></div>
                            @endforeach
                        </dl>
                        <div class="pcard__cta">
                            <a class="btn btn--dark btn--pill btn--sm" href="{{ route('agribisnis.penawaran') }}"><span>Minta Penawaran</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                            <a class="btn btn--outline btn--pill btn--sm" href="{{ route('agribisnis.moq') }}"><span>Lihat MOQ</span></a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <div class="container section section--tight">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>
@endsection
