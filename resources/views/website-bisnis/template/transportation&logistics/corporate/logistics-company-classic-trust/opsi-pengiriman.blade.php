@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Opsi Pengiriman — Nusa Logistik')
@section('body_class', 'page-opsi')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'opsi-pengiriman'])

<section class="section">
    <div class="container container--mid">
        <div class="card card--pad" data-tabs data-tabs-hash>
            <div class="tabs tabs--lg" role="tablist" aria-label="Jenis pengiriman">
                @foreach ($c['freight']['tabs'] as $t)
                    <button type="button" role="tab" class="tab {{ $loop->first ? 'is-active' : '' }}" id="tab-{{ $t['key'] }}" data-tab="{{ $t['key'] }}" aria-controls="panel-{{ $t['key'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}">{{ $t['label'] }}</button>
                @endforeach
            </div>
            @foreach ($c['freight']['tabs'] as $t)
                <div role="tabpanel" id="panel-{{ $t['key'] }}" aria-labelledby="tab-{{ $t['key'] }}" @if (! $loop->first) hidden @endif>
                    <p class="tab-summary">{{ $t['summary'] }}</p>
                    <ul class="freight-table">
                        <li class="freight-table__head" aria-hidden="true"><span>Layanan</span><span>Keterangan</span><span>Estimasi</span></li>
                        @foreach ($t['items'] as $it)
                            <li class="freight-table__row">
                                <span class="freight-table__name"><span class="freight-row__ic"><svg class="ic" aria-hidden="true"><use href="#{{ $it['icon'] }}"/></svg></span>{{ $it['name'] }}</span>
                                <span class="freight-table__note">{{ $it['note'] }}</span>
                                <span class="freight-table__eta">{{ $it['eta'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <p class="note"><svg class="ic" aria-hidden="true"><use href="#i-info"/></svg>{{ $c['freight']['note'] }}</p>
        </div>
    </div>
</section>

@include($vb . 'partials.cta-band', ['ctaTitle' => 'Belum yakin opsi mana yang cocok?', 'ctaText' => 'Tim kami membantu memilih jenis pengiriman, ukuran, dan estimasi yang paling sesuai.'])
@endsection
