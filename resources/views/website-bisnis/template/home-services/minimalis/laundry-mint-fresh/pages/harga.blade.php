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
    @include($v . '.partials.page-header', ['title' => $c['prices']['title'], 'sub' => $c['prices']['sub'], 'icon' => 'tag'])

    <div class="lw-container lw-page">
        <div class="lw-split lw-split--side">
            <article class="lw-card lw-card--price lw-card--full" data-lw-tabs>
                <div class="lw-tabs" role="tablist" aria-label="Jenis harga">
                    <button type="button" role="tab" class="is-active" aria-selected="true" aria-controls="lw-pv-item" id="lw-pt-item">Per Item</button>
                    <button type="button" role="tab" aria-selected="false" aria-controls="lw-pv-kg" id="lw-pt-kg" tabindex="-1">Per Kg</button>
                </div>
                @foreach (['item' => 'Harga per potong pakaian', 'kg' => 'Harga per kilogram'] as $mode => $cap)
                    <div role="tabpanel" id="lw-pv-{{ $mode }}" aria-labelledby="lw-pt-{{ $mode }}" @if ($mode === 'kg') hidden @endif>
                        <p class="lw-cap">{{ $cap }}</p>
                        <ul class="lw-ptiles">
                            @foreach ($c['prices'][$mode] as $p)
                                <li class="lw-ptile">
                                    <span class="lw-ico"><svg class="lw-i"><use href="#i-{{ $p['icon'] }}"/></svg></span>
                                    <span class="lw-ptile__name">{{ $p['name'] }}</span>
                                    <b>{{ $rp($p['price']) }}<small> / {{ $mode === 'kg' ? 'kg' : 'item' }}</small></b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <p class="lw-note"><svg class="lw-i"><use href="#i-shield"/></svg>{{ $c['prices']['note'] }}</p>
            </article>

            <aside class="lw-stack">
                <article class="lw-card lw-aside">
                    <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-chat"/></svg></span>
                    <h2 class="lw-card__title lw-card__title--sm">{{ $c['inquiry']['title'] }}</h2>
                    <p>{{ $c['inquiry']['sub'] }}</p>
                    <a class="lw-btn" href="{{ $r('inquiry') }}">{{ $c['cta']['primary'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                    <button class="lw-btn lw-btn--ghost" type="button" data-lw-chat-topic="harga"><svg class="lw-i"><use href="#i-sparkle"/></svg> {{ $c['cta']['bot'] }}</button>
                </article>
                @include($v . '.sections.estimasi')
            </aside>
        </div>
    </div>

    @include($v . '.partials.cta')
@endsection
