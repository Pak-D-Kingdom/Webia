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
        <div class="lw-split lw-split--price">
            {{-- Daftar harga --}}
            <article class="lw-card lw-card--price lw-card--full" data-lw-tabs>
                <div class="lw-tabs lw-tabs--lg" role="tablist" aria-label="Jenis harga">
                    <button type="button" role="tab" class="is-active" aria-selected="true" aria-controls="lw-pv-item" id="lw-pt-item">Per Item <span class="lw-tabs__n">{{ count($c['prices']['item']) }}</span></button>
                    <button type="button" role="tab" aria-selected="false" aria-controls="lw-pv-kg" id="lw-pt-kg" tabindex="-1">Per Kg <span class="lw-tabs__n">{{ count($c['prices']['kg']) }}</span></button>
                </div>

                @foreach (['item' => 'Harga per potong pakaian. Klik salah satu untuk langsung memesan.', 'kg' => 'Harga per kilogram. Klik salah satu untuk langsung memesan.'] as $mode => $cap)
                    <div role="tabpanel" id="lw-pv-{{ $mode }}" aria-labelledby="lw-pt-{{ $mode }}" @if ($mode === 'kg') hidden @endif>
                        <p class="lw-cap">{{ $cap }}</p>
                        <ul class="lw-ptiles">
                            @foreach ($c['prices'][$mode] as $p)
                                <li>
                                    <a class="lw-ptile" href="{{ $r('inquiry') }}?layanan={{ rawurlencode($mode === 'kg' ? 'Laundry Kiloan' : 'Laundry Satuan') }}">
                                        <span class="lw-ico"><svg class="lw-i"><use href="#i-{{ $p['icon'] }}"/></svg></span>
                                        <span class="lw-ptile__name">{{ $p['name'] }}</span>
                                        <b>{{ $rp($p['price']) }}<small>/{{ $mode === 'kg' ? 'kg' : 'item' }}</small></b>
                                        <svg class="lw-i lw-ptile__go"><use href="#i-arrow"/></svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

                <p class="lw-note"><svg class="lw-i"><use href="#i-shield"/></svg>{{ $c['prices']['note'] }}</p>
            </article>

            {{-- Kalkulator & bantuan --}}
            <aside class="lw-stack">
                <article class="lw-card lw-calc" data-lw-calc data-wa="{{ $c['contact']['whatsapp'] }}" data-brand="{{ $c['brand']['name'] }}">
                    <header class="lw-card__head lw-card__head--ico">
                        <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-sparkle"/></svg></span>
                        <div>
                            <h2 class="lw-card__title lw-card__title--sm">Kalkulator Estimasi</h2>
                            <p>Hitung perkiraan biaya laundry Anda.</p>
                        </div>
                    </header>

                    <div class="lw-form">
                        <label for="lw-calc-item">Pilih layanan</label>
                        <select id="lw-calc-item" name="item">
                            <optgroup label="Per Item">
                                @foreach ($c['prices']['item'] as $p)
                                    <option value="{{ $p['price'] }}" data-unit="item" data-name="{{ $p['name'] }}">{{ $p['name'] }} — {{ $rp($p['price']) }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Per Kg">
                                @foreach ($c['prices']['kg'] as $p)
                                    <option value="{{ $p['price'] }}" data-unit="kg" data-name="{{ $p['name'] }}">{{ $p['name'] }} — {{ $rp($p['price']) }}</option>
                                @endforeach
                            </optgroup>
                        </select>

                        <label for="lw-calc-qty">Jumlah <small data-lw-calc-unit>item</small></label>
                        <div class="lw-qty">
                            <button type="button" data-lw-qty="-1" aria-label="Kurangi jumlah"><svg class="lw-i"><use href="#i-minus"/></svg></button>
                            <input id="lw-calc-qty" type="number" inputmode="decimal" min="1" max="99" step="1" value="1">
                            <button type="button" data-lw-qty="1" aria-label="Tambah jumlah"><svg class="lw-i"><use href="#i-plus"/></svg></button>
                        </div>
                    </div>

                    <div class="lw-calc__total">
                        <span>Estimasi total</span>
                        <b data-lw-calc-total aria-live="polite">Rp 0</b>
                    </div>
                    <p class="lw-calc__note">Belum termasuk biaya tambahan opsi Express, Premium, atau Eco. Harga final dikonfirmasi tim kami.</p>
                    <a class="lw-btn" data-lw-calc-wa href="https://wa.me/{{ $c['contact']['whatsapp'] }}" target="_blank" rel="noopener"><svg class="lw-i"><use href="#i-whatsapp"/></svg> Pesan via WhatsApp</a>
                </article>

                <article class="lw-card lw-aside">
                    <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-chat"/></svg></span>
                    <h2 class="lw-card__title lw-card__title--sm">{{ $c['inquiry']['title'] }}</h2>
                    <p>{{ $c['inquiry']['sub'] }}</p>
                    <button class="lw-btn lw-btn--ghost" type="button" data-lw-chat-topic="harga"><svg class="lw-i"><use href="#i-sparkle"/></svg> {{ $c['cta']['bot'] }}</button>
                </article>
            </aside>
        </div>
    </div>

    @include($v . '.partials.cta')
@endsection
