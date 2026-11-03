@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Inquiry Bisnis (B2B) — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['inquiry']])

    <section class="section container">
        <div class="form-layout">
            <div class="card card--flat">
                <header class="card__head"><h2 class="card__title">Kirim Inquiry</h2><p class="card__sub">{{ $cfg['inquiry']['sub'] }}</p></header>
                @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.form-inquiry', ['full' => true, 'suffix' => 'Page'])
            </div>
            <aside class="card card--flat aside">
                <h2 class="card__title">Hubungi Kami</h2>
                <ul class="contact">
                    <li><svg class="ic" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:+{{ $cfg['site']['whatsapp'] }}">{{ $cfg['site']['phone'] }}</a></li>
                    <li><svg class="ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cfg['site']['email'] }}">{{ $cfg['site']['email'] }}</a></li>
                    <li><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cfg['site']['address'] }}</span></li>
                    <li><svg class="ic" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $cfg['site']['hours'] }}</span></li>
                </ul>
                <img class="aside__img" src="{{ asset($cfg['img']['petani']) }}" alt="" loading="lazy" width="624" height="531">
            </aside>
        </div>
    </section>
@endsection
