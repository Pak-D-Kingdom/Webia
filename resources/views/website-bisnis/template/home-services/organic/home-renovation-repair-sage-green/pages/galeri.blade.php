@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Before - After Gallery — Renovaku')
@section('meta_description', 'Lihat hasil nyata renovasi Renovaku lewat foto sebelum dan sesudah.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Before - After Gallery',
    'desc'  => 'Lihat hasil nyata dari proyek kami. Geser pembanding untuk melihat perubahan ruangan dari kondisi awal hingga selesai.',
    'image' => $cfg['gallery']['after'],
    'alt'   => 'Ruang keluarga setelah renovasi',
    'cta'   => ['Mulai Renovasi Saya', 'permintaan-penawaran'],
])

<section class="hr-section" id="before-after">
    <div class="hr-container">
        <header class="hr-sechead">
            <p class="hr-kicker">{{ $i('camera') }} Pembanding interaktif</p>
            <h2>Geser untuk membandingkan</h2>
            <p>Tarik penggeser, ketuk tombol, atau gunakan tombol panah di keyboard.</p>
        </header>
        <div class="hr-compare" data-compare data-reveal>
            <img class="hr-compare__after" src="{{ $img($cfg['gallery']['after']) }}" alt="Setelah renovasi: ruang keluarga hangat dan terang" width="639" height="345" decoding="async">
            <div class="hr-compare__before">
                <img src="{{ $img($cfg['gallery']['before']) }}" alt="Sebelum renovasi: dinding kusam dan plafon rusak" width="630" height="345" decoding="async">
            </div>
            <span class="hr-compare__tag hr-compare__tag--l">{{ $i('camera') }}Sebelum</span>
            <span class="hr-compare__tag hr-compare__tag--r">{{ $i('camera') }}Sesudah</span>
            <span class="hr-compare__handle" aria-hidden="true">{{ $i('chevron-left') }}{{ $i('chevron-right') }}</span>
            <input class="hr-compare__range" type="range" min="0" max="100" value="50" aria-label="Geser untuk membandingkan sebelum dan sesudah renovasi" data-compare-range>
        </div>
        <div class="hr-compare__ctrl" role="group" aria-label="Pilih tampilan">
            <button type="button" data-compare-set="100">{{ $i('camera') }}Sebelum</button>
            <button type="button" data-compare-set="50">{{ $i('layers') }}Bandingkan</button>
            <button type="button" data-compare-set="0">{{ $i('sparkle') }}Sesudah</button>
        </div>
    </div>
</section>

<section class="hr-section hr-section--tint" id="perbandingan">
    <div class="hr-container">
        <header class="hr-sechead"><h2>Detail perbandingan</h2><p>Apa yang berubah dari kondisi awal ke hasil akhir. Ketuk gambar untuk memperbesar.</p></header>
        <div class="hr-twocol">
            <figure class="hr-figure" data-reveal>
                <button type="button" class="hr-zoomable" data-zoom="{{ $img($cfg['gallery']['before']) }}" data-caption="Sebelum renovasi" data-zoom-group="galeri" aria-label="Perbesar foto sebelum renovasi">
                    <img src="{{ $img($cfg['gallery']['before']) }}" alt="Kondisi ruangan sebelum renovasi" width="630" height="345" loading="lazy" decoding="async">
                    <span class="hr-zoomable__ico">{{ $i('zoom') }}</span>
                </button>
                <figcaption><strong>{{ $cfg['gallery']['notes'][0][0] }}</strong><span>{{ $cfg['gallery']['notes'][0][1] }}</span></figcaption>
            </figure>
            <figure class="hr-figure hr-figure--after" data-reveal>
                <button type="button" class="hr-zoomable" data-zoom="{{ $img($cfg['gallery']['after']) }}" data-caption="Sesudah renovasi" data-zoom-group="galeri" aria-label="Perbesar foto sesudah renovasi">
                    <img src="{{ $img($cfg['gallery']['after']) }}" alt="Kondisi ruangan sesudah renovasi" width="639" height="345" loading="lazy" decoding="async">
                    <span class="hr-zoomable__ico">{{ $i('zoom') }}</span>
                </button>
                <figcaption><strong>{{ $cfg['gallery']['notes'][1][0] }}</strong><span>{{ $cfg['gallery']['notes'][1][1] }}</span></figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="hr-section">
    <div class="hr-container">
        <header class="hr-sechead"><h2>Hasil akhir proyek lainnya</h2><p>Rumah yang sudah selesai kami renovasi.</p></header>
        <div class="hr-thumbs hr-thumbs--lg">
            @foreach ($cfg['projects'] as $p)
                <a href="{{ $go('proyek') }}#{{ $p['id'] }}" data-reveal><img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}" width="510" height="204" loading="lazy" decoding="async"><span>{{ $p['title'] }}<small>{{ $p['location'] }}</small></span></a>
            @endforeach
        </div>
    </div>
</section>
@endsection
