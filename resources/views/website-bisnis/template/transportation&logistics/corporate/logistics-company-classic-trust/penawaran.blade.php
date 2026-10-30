@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Minta Penawaran — Nusa Logistik')
@section('body_class', 'page-penawaran')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'penawaran'])

<section class="section">
    <div class="container quote-layout">
        <div class="card card--pad">
            <h2 class="card__title">{{ $c['quotation']['title'] }}</h2>
            <p class="card__sub">{{ $c['quotation']['subtitle'] }}</p>

            <form class="form" data-quote-form novalidate>
                <div class="form__grid">
                    <div class="field">
                        <label for="q-nama">Nama lengkap <span aria-hidden="true">*</span></label>
                        <input id="q-nama" name="nama" type="text" autocomplete="name" required>
                        <p class="field__err" data-err="nama" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q-perusahaan">Perusahaan</label>
                        <input id="q-perusahaan" name="perusahaan" type="text" autocomplete="organization">
                    </div>
                    <div class="field">
                        <label for="q-email">Email</label>
                        <input id="q-email" name="email" type="email" autocomplete="email">
                        <p class="field__err" data-err="email" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q-telepon">No. telepon / WhatsApp <span aria-hidden="true">*</span></label>
                        <input id="q-telepon" name="telepon" type="tel" inputmode="tel" autocomplete="tel" required>
                        <p class="field__err" data-err="telepon" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q-layanan">Jenis layanan <span aria-hidden="true">*</span></label>
                        <select id="q-layanan" name="layanan" required>
                            <option value="">Pilih layanan</option>
                            @foreach ($c['quotation']['services'] as $o)
                                <option value="{{ $o }}">{{ $o }}</option>
                            @endforeach
                        </select>
                        <p class="field__err" data-err="layanan" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q-barang">Jenis barang</label>
                        <select id="q-barang" name="barang">
                            <option value="">Pilih jenis barang</option>
                            @foreach ($c['quotation']['cargo_types'] as $o)
                                <option value="{{ $o }}">{{ $o }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="q-asal">Kota asal <span aria-hidden="true">*</span></label>
                        <input id="q-asal" name="asal" type="text" required>
                        <p class="field__err" data-err="asal" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q-tujuan">Kota / negara tujuan <span aria-hidden="true">*</span></label>
                        <input id="q-tujuan" name="tujuan" type="text" required>
                        <p class="field__err" data-err="tujuan" hidden></p>
                    </div>
                    <div class="field field--full">
                        <label for="q-berat">Perkiraan berat / volume</label>
                        <input id="q-berat" name="berat" type="text" placeholder="Contoh: 120 kg atau 2 palet">
                    </div>
                    <div class="field field--full">
                        <label for="q-catatan">Catatan tambahan</label>
                        <textarea id="q-catatan" name="catatan" rows="4"></textarea>
                    </div>
                </div>
                <button class="btn btn--orange btn--lg" type="submit">Kirim via WhatsApp
                    <svg class="ic" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                </button>
                <p class="form-msg" data-quote-msg role="status" hidden></p>
            </form>
        </div>

        <aside class="quote-side">
            <div class="quote-side__photo">
                <img src="{{ $img('quote-bg.jpg') }}" alt="Tim layanan pelanggan Nusa Logistik" width="1872" height="344" loading="lazy">
            </div>
            <div class="card card--pad">
                <h3 class="card__title card__title--sm">Setelah form dikirim</h3>
                <ol class="mini-steps">
                    @foreach ($c['quotation']['steps'] as $st)
                        <li><span class="mini-steps__n">{{ $loop->iteration }}</span><div><strong>{{ $st['title'] }}</strong><span>{{ $st['text'] }}</span></div></li>
                    @endforeach
                </ol>
            </div>
            <div class="card card--pad">
                <h3 class="card__title card__title--sm">Kontak langsung</h3>
                <ul class="contact-list">
                    <li><svg class="ic" aria-hidden="true"><use href="#i-phone"/></svg><a href="{{ $c['contact']['phone_href'] }}">{{ $c['contact']['phone'] }}</a></li>
                    <li><svg class="ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
                    <li><svg class="ic" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $c['contact']['hours'] }}</span></li>
                    <li><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['contact']['address'] }}</span></li>
                </ul>
            </div>
        </aside>
    </div>
</section>
@endsection
