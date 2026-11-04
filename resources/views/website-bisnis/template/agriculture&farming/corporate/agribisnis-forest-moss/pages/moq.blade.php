@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Jumlah Pemesanan Minimal (MOQ) — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['moq']])

    <section class="section container">
        <ul class="feature-grid feature-grid--4">
            @foreach($cfg['moq']['items'] as $m)
                <li class="feature feature--center">
                    <span class="feature__ic"><svg class="ic" aria-hidden="true"><use href="#i-{{ $m['icon'] }}"/></svg></span>
                    <h2>{{ $m['name'] }}</h2>
                    <p class="feature__val feature__val--xl">{{ $m['value'] }}</p>
                    <p>Jumlah minimal per pemesanan.</p>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="section container section--tight">
        <div class="card card--flat">
            <header class="card__head"><h2 class="card__title">Cara Memesan</h2><p class="card__sub">Tiga langkah mudah untuk memulai kerja sama dengan Green Harvest.</p></header>
            <ol class="steps">
                <li><span class="steps__n">1</span><b>Pilih Komoditas</b><small>Tentukan komoditas dan volume sesuai MOQ.</small></li>
                <li><span class="steps__n">2</span><b>Kirim Inquiry</b><small>Isi formulir B2B atau ajukan penawaran harga.</small></li>
                <li><span class="steps__n">3</span><b>Terima Penawaran</b><small>Tim kami menghubungi Anda dengan penawaran terbaik.</small></li>
            </ol>
            <div class="actions">
                <a class="btn btn--dark btn--pill" href="{{ route('agribisnis.penawaran') }}"><span>Ajukan Penawaran</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="btn btn--outline btn--pill" href="{{ route('agribisnis.inquiry') }}"><span>Inquiry Bisnis (B2B)</span></a>
            </div>
        </div>
    </section>
@endsection
