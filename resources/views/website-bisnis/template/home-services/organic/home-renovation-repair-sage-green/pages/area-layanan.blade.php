@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Area Layanan — Renovaku')
@section('meta_description', 'Cek wilayah di Indonesia yang dilayani Renovaku untuk renovasi dan perbaikan rumah.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Area Layanan',
    'desc'  => 'Kami melayani berbagai wilayah di Indonesia. Cek apakah kota Anda sudah terjangkau dan perkiraan jadwal survei lokasinya.',
    'image' => 'project-3.jpg',
    'alt'   => 'Rumah di cluster hasil renovasi Renovaku',
    'cta'   => ['Booking Survei', 'booking-survei'],
])

<section class="hr-section">
    <div class="hr-container hr-cover">
        <div class="hr-cover__map" data-reveal>
            <h2 class="hr-cover__title">{{ $i('pin') }}<span>Peta persebaran layanan</span></h2>
            <div class="hr-map hr-map--lg">
                <img src="{{ $img('coverage-map.png') }}" alt="Peta persebaran area layanan Renovaku di Indonesia" width="1017" height="252" decoding="async">
                <a class="hr-btn hr-btn--primary hr-btn--xs hr-map__btn" href="#cek-kota"><span>Cek Area Layanan</span>{{ $i('arrow') }}</a>
            </div>
            <form class="hr-check" id="cek-kota" data-coverage-check novalidate>
                <label for="hrCity">Pilih wilayah rumah Anda</label>
                <div class="hr-check__row">
                    <select id="hrCity" name="wilayah" data-select data-placeholder="Pilih wilayah…" required>
                        <option value="">Pilih wilayah…</option>
                        @foreach ($cfg['regions'] as $r)<option value="{{ $loop->index }}">{{ $r['name'] }}</option>@endforeach
                    </select>
                    <button type="submit" class="hr-btn hr-btn--primary"><span>Cek Wilayah</span>{{ $i('arrow') }}</button>
                </div>
                <p class="hr-check__out" data-coverage-out role="status" aria-live="polite"></p>
            </form>
            <p class="hr-cover__hint">{{ $i('info') }}<span>Wilayah Anda belum ada? <a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, apakah kalian melayani wilayah saya?') }}" target="_blank" rel="noopener noreferrer">Tanya via WhatsApp</a></span></p>
        </div>

        <div class="hr-regions">
            @foreach ($cfg['regions'] as $r)
                <article class="hr-region" id="wilayah-{{ $loop->index }}" data-reveal>
                    <span class="hr-region__ico">{{ $i('pin') }}</span>
                    <div>
                        <div class="hr-region__row"><h3>{{ $r['name'] }}</h3><span class="hr-region__ok"><i></i>Tersedia</span></div>
                        <p>{{ $r['cities'] }}</p>
                        <span class="hr-chip">{{ $i('clock') }}{{ $r['lead'] }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
