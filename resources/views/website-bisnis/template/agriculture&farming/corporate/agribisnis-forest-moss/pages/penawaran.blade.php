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
            <aside class="card card--flat aside aside--quote" style="--quote-img: url('{{ asset($cfg['img']['gandum']) }}')">
                <h2 class="card__title">Alur Penawaran</h2>
                <ol class="steps steps--v">
                    <li><span class="steps__n">1</span><b>Isi Formulir</b><small>Sebutkan komoditas, volume, dan tujuan.</small></li>
                    <li><span class="steps__n">2</span><b>Verifikasi</b><small>Tim kami memeriksa kebutuhan dan ketersediaan.</small></li>
                    <li><span class="steps__n">3</span><b>Penawaran Dikirim</b><small>Penawaran harga dikirim ke email Anda.</small></li>
                </ol>
            </aside>
        </div>
    </section>
@endsection
