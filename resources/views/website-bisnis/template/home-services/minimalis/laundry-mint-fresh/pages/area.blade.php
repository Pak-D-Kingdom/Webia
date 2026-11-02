@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Area Jemput & Antar — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['coverage']['title'], 'sub' => $c['coverage']['sub']])

    <div class="lw-container lw-page">
        <div class="lw-split lw-split--area">
            <div class="lw-stack">
                @foreach ($c['coverage']['areas'] as $a)
                    <article class="lw-card lw-area-card">
                        <header>
                            <h2 class="lw-card__title lw-card__title--sm"><svg class="lw-i"><use href="#i-pin"/></svg>{{ $a['name'] }}</h2>
                            <span class="lw-badge">{{ $a['scope'] }}</span>
                        </header>
                        <ul class="lw-chips">
                            @foreach ($a['list'] as $k)<li>{{ $k }}</li>@endforeach
                        </ul>
                    </article>
                @endforeach
            </div>

            <aside class="lw-card lw-checker" data-lw-area-check data-wa="{{ $c['contact']['whatsapp'] }}">
                <img class="lw-area-art" src="{{ $img($c['img']['area']) }}" alt="Mobil jemput dan antar FreshWash" width="450" height="468">
                <span class="lw-badge">{{ $c['coverage']['badge'] }}</span>
                <p>{{ $c['coverage']['min'] }}</p>
                <form class="lw-form" novalidate>
                    <label for="lw-ck-area">Pilih kota</label>
                    <select id="lw-ck-area" name="area" required>
                        <option value="">Pilih kota…</option>
                        @foreach ($c['coverage']['areas'] as $a)
                            <option value="{{ $a['name'] }}" data-list="{{ implode('|', $a['list']) }}" data-all="{{ stripos($a['scope'], 'seluruh') !== false ? 1 : 0 }}" data-scope="{{ $a['scope'] }}">{{ $a['name'] }} ({{ $a['scope'] }})</option>
                        @endforeach
                    </select>
                    <label for="lw-ck-kec">Kecamatan / area</label>
                    <input id="lw-ck-kec" name="kec" type="text" placeholder="Contoh: Gubeng" autocomplete="off">
                    <button class="lw-btn" type="submit">Cek Area Layanan</button>
                </form>
                <p class="lw-check-result" data-lw-check-result role="status" aria-live="polite"></p>
            </aside>
        </div>
    </div>
@endsection
