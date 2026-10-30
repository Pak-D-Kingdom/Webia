@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Daftar Harga — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['prices']['title'], 'sub' => $c['prices']['sub']])

    <div class="lw-container lw-page lw-page--narrow">
        <article class="lw-card lw-card--price lw-card--full" data-lw-tabs>
            <div class="lw-tabs" role="tablist" aria-label="Jenis harga">
                <button type="button" role="tab" class="is-active" aria-selected="true" aria-controls="lw-pv-item" id="lw-pt-item">Per Item</button>
                <button type="button" role="tab" aria-selected="false" aria-controls="lw-pv-kg" id="lw-pt-kg" tabindex="-1">Per Kg</button>
            </div>
            @foreach (['item' => 'Harga per potong pakaian', 'kg' => 'Harga per kilogram'] as $mode => $cap)
                <div role="tabpanel" id="lw-pv-{{ $mode }}" aria-labelledby="lw-pt-{{ $mode }}" @if ($mode === 'kg') hidden @endif>
                    <p class="lw-cap">{{ $cap }}</p>
                    <ul class="lw-prices lw-prices--full">
                        @foreach ($c['prices'][$mode] as $p)
                            <li>
                                <span class="lw-ico lw-ico--round"><svg class="lw-i"><use href="#i-{{ $p['icon'] }}"/></svg></span>
                                <span>{{ $p['name'] }}</span>
                                <b>{{ $rp($p['price']) }}<small> / {{ $mode === 'kg' ? 'kg' : 'item' }}</small></b>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <p class="lw-note"><svg class="lw-i"><use href="#i-shield"/></svg>{{ $c['prices']['note'] }}</p>
            <div class="lw-actions">
                <a class="lw-btn" href="{{ $r('inquiry') }}">Pesan Sekarang <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                <button class="lw-btn lw-btn--ghost" type="button" data-lw-chat-topic="harga">Tanya FreshBot</button>
            </div>
        </article>
    </div>
@endsection
