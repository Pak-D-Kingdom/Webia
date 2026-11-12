@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Proyek Kami — Renovaku')
@section('meta_description', 'Proyek renovasi dan perbaikan rumah yang telah diselesaikan Renovaku.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Proyek Kami',
    'desc'  => 'Berbagai proyek renovasi dan perbaikan yang telah kami selesaikan — dari fasad dan taman sampai renovasi total rumah tinggal.',
    'image' => 'project-1.jpg',
    'alt'   => 'Rumah tropis modern hasil renovasi Renovaku',
    'cta'   => ['Konsultasi Proyek Saya', 'permintaan-penawaran'],
])

<section class="hr-section">
    <div class="hr-container">
        <div class="hr-projlist">
            @foreach ($cfg['projects'] as $p)
                <article class="hr-proj" id="{{ $p['id'] }}" data-reveal>
                    <img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}, {{ $p['location'] }}" width="510" height="204" loading="lazy" decoding="async">
                    <div class="hr-proj__body">
                        <h3>{{ $p['title'] }}</h3>
                        <p class="hr-proj__loc">{{ $i('pin') }}{{ $p['location'] }}</p>
                        <dl class="hr-proj__meta">
                            <div><dt>Jenis pekerjaan</dt><dd>{{ $p['type'] }}</dd></div>
                            <div><dt>Luas area</dt><dd>{{ $p['area'] }}</dd></div>
                            <div><dt>Durasi</dt><dd>{{ $p['duration'] }}</dd></div>
                            <div><dt>Paket</dt><dd>{{ $p['package'] }}</dd></div>
                        </dl>
                        <a class="hr-link" href="{{ $go('permintaan-penawaran') }}"><span>Ingin hasil serupa? Minta penawaran</span>{{ $i('arrow') }}</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
