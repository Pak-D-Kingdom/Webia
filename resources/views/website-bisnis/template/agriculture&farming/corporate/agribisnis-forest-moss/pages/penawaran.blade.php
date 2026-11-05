@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Minta Penawaran Harga — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['penawaran']])

    <section class="section container">
        <div class="form-layout">
            <div class="card card--flat">
                <header class="card__head"><h2 class="card__title">Formulir Penawaran</h2><p class="card__sub">{{ $cfg['quote']['sub'] }}</p></header>
                @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.form-quote')
            </div>
            <aside class="card aside aside--quote">
                <div class="aside__cover" style="--quote-img: url('{{ asset($cfg['img']['gandum']) }}')">
                    <h2 class="card__title">{{ $cfg['quote']['flow_title'] }}</h2>
                    <p>{{ $cfg['quote']['flow_sub'] }}</p>
                </div>
                <ol class="timeline">
                    @foreach($cfg['quote']['flow'] as $step)
                        <li class="timeline__item">
                            <span class="timeline__dot"><svg class="ic" aria-hidden="true"><use href="#i-{{ $step['icon'] }}"/></svg></span>
                            <div class="timeline__tx">
                                <small>{{ $step['n'] }}</small>
                                <b>{{ $step['title'] }}</b>
                                <p>{{ $step['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
                <a class="aside__help" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ urlencode($cfg['site']['whatsapp_text']) }}" target="_blank" rel="noopener">
                    <span class="aside__help-ic"><svg class="ic" aria-hidden="true"><use href="#i-wa-fill"/></svg></span>
                    <span class="aside__help-tx"><b>{{ $cfg['quote']['help_title'] }}</b><small>{{ $cfg['quote']['help_sub'] }}</small></span>
                    <svg class="ic ic--xs" aria-hidden="true"><use href="#i-arrow"/></svg>
                </a>
            </aside>
        </div>
    </section>
@endsection
