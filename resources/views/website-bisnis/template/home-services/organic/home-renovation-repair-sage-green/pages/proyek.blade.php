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
        <div class="hr-filter" role="group" aria-label="Saring proyek" data-filter>
            @foreach ($cfg['project_filters'] as $f)
                <button type="button" data-filter-btn="{{ $f[0] }}" class="{{ $loop->first ? 'is-on' : '' }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $f[1] }}</button>
            @endforeach
        </div>
        <div class="hr-projlist">
            @foreach ($cfg['projects'] as $p)
                <article class="hr-proj" id="{{ $p['id'] }}" data-reveal data-filter-item="{{ $p['filter'] }}">
                    <button type="button" class="hr-zoomable hr-proj__img" data-zoom="{{ $img($p['image']) }}" data-caption="{{ $p['title'] }} — {{ $p['location'] }}" data-zoom-group="proyek" aria-label="Perbesar foto {{ $p['title'] }}">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}, {{ $p['location'] }}" width="510" height="204" loading="lazy" decoding="async">
                        <span class="hr-proj__tag">{{ $p['type'] }}</span>
                        <span class="hr-zoomable__ico">{{ $i('zoom') }}</span>
                    </button>
                    <div class="hr-proj__body">
                        <h3>{{ $p['title'] }}</h3>
                        <p class="hr-proj__loc">{{ $i('pin') }}{{ $p['location'] }}</p>
                        <dl class="hr-proj__meta">
                            <div>{{ $i('folder') }}<dt>Jenis pekerjaan</dt><dd>{{ $p['type'] }}</dd></div>
                            <div>{{ $i('ruler') }}<dt>Luas area</dt><dd>{{ $p['area'] }}</dd></div>
                            <div>{{ $i('clock') }}<dt>Durasi</dt><dd>{{ $p['duration'] }}</dd></div>
                            <div>{{ $i('crown') }}<dt>Paket</dt><dd>{{ $p['package'] }}</dd></div>
                        </dl>
                        <div class="hr-proj__cta">
                            <a class="hr-btn hr-btn--primary hr-btn--sm" href="{{ $go('permintaan-penawaran') }}"><span>Minta hasil serupa</span>{{ $i('arrow') }}</a>
                            <a class="hr-link" href="{{ $go('galeri') }}"><span>Lihat galeri</span>{{ $i('arrow') }}</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
