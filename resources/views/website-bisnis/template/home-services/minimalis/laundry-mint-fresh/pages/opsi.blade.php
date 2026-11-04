@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Opsi Layanan — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['options']['title'], 'sub' => $c['options']['sub'], 'icon' => 'star'])

    <div class="lw-container lw-page">
        <div class="lw-cards-2">
            @foreach ($c['options']['items'] as $o)
                <article class="lw-card lw-optcard">
                    <span class="lw-ico lw-ico--xl"><svg class="lw-i"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                    <div class="lw-optcard__body">
                        <h2 class="lw-card__title">{{ $o['name'] }}</h2>
                        <span class="lw-badge">{{ $o['desc'] }}</span>
                        <p>{{ $o['long'] }}</p>
                        <p class="lw-note lw-note--plain"><svg class="lw-i"><use href="#i-tag"/></svg>{{ $o['extra'] }}</p>
                        <a class="lw-btn lw-btn--sm" href="{{ $r('inquiry') }}?opsi={{ rawurlencode($o['name']) }}">Pilih {{ $o['name'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                    </div>
                </article>
            @endforeach
        </div>

        <article class="lw-card lw-compare">
            <h2 class="lw-card__title">Perbandingan Opsi</h2>
            <div class="lw-tablewrap">
                <table class="lw-table">
                    <thead><tr><th scope="col">Opsi</th><th scope="col">Estimasi</th><th scope="col">Biaya tambahan</th></tr></thead>
                    <tbody>
                        @foreach ($c['options']['items'] as $o)
                            <tr>
                                <th scope="row"><span class="lw-ico"><svg class="lw-i"><use href="#i-{{ $o['icon'] }}"/></svg></span>{{ $o['name'] }}</th>
                                <td>{{ $o['desc'] }}</td>
                                <td>{{ $o['extra'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </article>
    </div>

    @include($v . '.partials.cta')
@endsection
