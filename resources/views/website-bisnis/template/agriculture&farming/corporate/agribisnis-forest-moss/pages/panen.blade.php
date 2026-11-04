@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Informasi Tanaman & Panen — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['panen']])

    <section class="section container">
        <div class="split">
            <figure class="split__media">
                <img src="{{ asset($cfg['img']['ladang']) }}" alt="Hamparan padi siap panen" loading="lazy" width="585" height="432">
            </figure>
            <ul class="rows">
                @foreach($cfg['harvest']['items'] as $h)
                    <li class="row">
                        <span class="row__ic"><svg class="ic" aria-hidden="true"><use href="#i-{{ $h['icon'] }}"/></svg></span>
                        <span class="row__tx"><b>{{ $h['name'] }}</b><small>{{ $h['season'] }}</small><em>{{ $h['note'] }}</em></span>
                        <span class="badge">{{ $h['status'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section container section--tight">
        <div class="card card--flat">
            <header class="card__head"><h2 class="card__title">Kalender Panen</h2><p class="card__sub">Perkiraan bulan panen setiap komoditas sepanjang tahun.</p></header>
            <div class="table-wrap">
                <table class="cal">
                    <thead>
                        <tr>
                            <th scope="col">Komoditas</th>
                            @foreach($cfg['harvest']['months'] as $m)<th scope="col">{{ $m }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cfg['harvest']['calendar'] as $row)
                            <tr>
                                <th scope="row">{{ $row['name'] }}</th>
                                @foreach($cfg['harvest']['months'] as $i => $m)
                                    <td @if(in_array($i, $row['on'])) class="on" title="Panen {{ $m }}" @endif><span class="sr-only">@if(in_array($i, $row['on'])) Panen @else Tidak panen @endif</span></td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="legend"><i class="legend__dot"></i> Musim panen &nbsp;·&nbsp; Ketersediaan stok mengikuti hasil panen terbaru.</p>
        </div>
    </section>

    <div class="container section section--tight">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>
@endsection
