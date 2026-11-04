@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Spesifikasi Produk — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['spesifikasi']])

    <section class="section container">
        <ul class="feature-grid feature-grid--4">
            @foreach($cfg['specs']['items'] as $s)
                <li class="feature">
                    <span class="feature__ic"><svg class="ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <h2>{{ $s['label'] }}</h2>
                    <p class="feature__val">{{ $s['value'] }}</p>
                    <p>{{ $s['desc'] }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="section container section--tight">
        <div class="card card--flat">
            <header class="card__head"><h2 class="card__title">Ringkasan Spesifikasi per Komoditas</h2><p class="card__sub">Standar umum yang berlaku; spesifikasi detail dapat disesuaikan dengan permintaan pembeli.</p></header>
            <div class="table-wrap">
                <table class="data">
                    <thead><tr><th scope="col">Komoditas</th><th scope="col">Varian</th><th scope="col">Kadar Air</th><th scope="col">Ukuran</th><th scope="col">Kemurnian</th><th scope="col">Kemasan</th></tr></thead>
                    <tbody>
                        @foreach($cfg['commodities'] as $c)
                            <tr>
                                <th scope="row">{{ $c['name'] }}</th>
                                <td>{{ $c['variant'] }}</td>
                                <td>{{ $cfg['specs']['items'][0]['value'] }}</td>
                                <td>{{ $cfg['specs']['items'][1]['value'] }}</td>
                                <td>{{ $cfg['specs']['items'][2]['value'] }}</td>
                                <td>{{ $cfg['specs']['items'][3]['value'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="container section section--tight">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>
@endsection
