@extends('website-bisnis.template.home-services.minimalis.laundry-mint-fresh.layouts.app')
@php
    $c   = config('template.home-services.minimalis.laundry-mint-fresh.laundry');
    $img = fn ($f) => asset('images/' . $c['asset_path'] . '/' . $f);
    $r   = fn ($n, $p = []) => route($c['route'] . $n, $p);
    $rp  = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $v   = $c['view'];
@endphp

@section('title', 'Order Inquiry — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', ['title' => $c['inquiry']['title'], 'sub' => $c['inquiry']['sub'], 'icon' => 'chat'])

    <div class="lw-container lw-page">
        <div class="lw-split lw-split--form">
            <article class="lw-card lw-card--full">
                {{-- Tanpa backend: form membuka WhatsApp dengan pesan yang sudah terisi --}}
                <form class="lw-form" data-lw-order-form action="https://wa.me/{{ $c['contact']['whatsapp'] }}" method="get" target="_blank" novalidate>
                    <input type="hidden" name="text" value="">
                    <div class="lw-form__row">
                        <div>
                            <label for="lw-f-nama">Nama lengkap</label>
                            <input id="lw-f-nama" name="nama" type="text" autocomplete="name" required>
                        </div>
                        <div>
                            <label for="lw-f-wa">Nomor WhatsApp</label>
                            <input id="lw-f-wa" name="wa" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>
                    <div class="lw-form__row">
                        <div>
                            <label for="lw-f-layanan">Layanan</label>
                            <select id="lw-f-layanan" name="layanan" required>
                                <option value="">Pilih layanan…</option>
                                @foreach ($c['services']['items'] as $s)<option>{{ $s['name'] }}</option>@endforeach
                            </select>
                        </div>
                        <div>
                            <label for="lw-f-opsi">Opsi kecepatan</label>
                            <select id="lw-f-opsi" name="opsi" required>
                                <option value="">Pilih opsi…</option>
                                @foreach ($c['options']['items'] as $o)<option>{{ $o['name'] }}</option>@endforeach
                            </select>
                        </div>
                    </div>
                    <label for="lw-f-area">Area jemput</label>
                    <select id="lw-f-area" name="area" required>
                        <option value="">Pilih kota…</option>
                        @foreach ($c['coverage']['areas'] as $a)<option>{{ $a['name'] }}</option>@endforeach
                    </select>
                    <label for="lw-f-alamat">Alamat lengkap</label>
                    <textarea id="lw-f-alamat" name="alamat" rows="3" required></textarea>
                    <label for="lw-f-catatan">Catatan <small>(opsional)</small></label>
                    <textarea id="lw-f-catatan" name="catatan" rows="2" placeholder="Jenis kain, noda khusus, jam jemput…"></textarea>
                    <p class="lw-form__err" data-lw-form-error role="alert" hidden></p>
                    <button class="lw-btn lw-btn--lg" type="submit"><svg class="lw-i"><use href="#i-whatsapp"/></svg> {{ $c['inquiry']['form_cta'] }}</button>
                </form>
            </article>

            <div class="lw-stack">
                <a class="lw-card lw-ccard" href="https://wa.me/{{ $c['contact']['whatsapp'] }}" target="_blank" rel="noopener">
                    <span class="lw-ico lw-ico--wa"><svg class="lw-i"><use href="#i-whatsapp"/></svg></span>
                    <span><small>WhatsApp</small><b>{{ $c['contact']['phone'] }}</b></span>
                    <svg class="lw-i"><use href="#i-arrow"/></svg>
                </a>
                <a class="lw-card lw-ccard" href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}">
                    <span class="lw-ico lw-ico--wa"><svg class="lw-i"><use href="#i-phone"/></svg></span>
                    <span><small>Telepon</small><b>{{ $c['contact']['phone'] }}</b></span>
                    <svg class="lw-i"><use href="#i-arrow"/></svg>
                </a>
                <a class="lw-card lw-ccard" href="mailto:{{ $c['contact']['email'] }}">
                    <span class="lw-ico lw-ico--wa"><svg class="lw-i"><use href="#i-mail"/></svg></span>
                    <span><small>Email</small><b>{{ $c['contact']['email'] }}</b></span>
                    <svg class="lw-i"><use href="#i-arrow"/></svg>
                </a>
                @include($v . '.sections.jam')
            </div>
        </div>
    </div>
@endsection
