@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Layanan Renovasi & Perbaikan — Renovaku')
@section('meta_description', 'Renovasi rumah, perbaikan bangunan, desain interior, eksterior & taman, serta instalasi & finishing dari Renovaku.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Layanan Renovasi & Perbaikan',
    'desc'  => 'Solusi lengkap untuk rumah Anda: dari perbaikan kecil sampai renovasi total, dikerjakan tim berpengalaman dengan material pilihan.',
    'image' => 'service-living-room.jpg',
    'alt'   => 'Ruang keluarga hasil renovasi Renovaku',
])

<section class="hr-section">
    <div class="hr-container">
        <header class="hr-sechead">
            <h2>Lima layanan untuk semua kebutuhan rumah</h2>
            <p>Pilih satu layanan atau gabungkan beberapa sekaligus dalam satu proyek.</p>
        </header>
        <div class="hr-svcgrid">
            @foreach ($cfg['services'] as $s)
                <article class="hr-svc" id="{{ $s['id'] }}" data-reveal>
                    <span class="hr-svc__ico">{{ $i($s['icon']) }}</span>
                    <h3>{{ $s['title'] }}</h3>
                    <p>{{ $s['short'] }}</p>
                    <ul class="hr-checklist hr-checklist--plain">
                        @foreach ($s['points'] as $pt)<li>{{ $i('check-circle') }}<span>{{ $pt }}</span></li>@endforeach
                    </ul>
                    <div class="hr-svc__foot">
                        <span class="hr-chip">{{ $i('clock') }}{{ $s['duration'] }}</span>
                        <a class="hr-link" href="{{ $go('permintaan-penawaran') }}?layanan={{ $s['id'] }}"><span>Minta penawaran</span>{{ $i('arrow') }}</a>
                    </div>
                </article>
            @endforeach
            <aside class="hr-svc hr-svc--cta" data-reveal>
                <h3>Belum yakin layanan mana yang cocok?</h3>
                <p>Tanyakan ke asisten AI kami atau jadwalkan survei langsung ke lokasi rumah Anda.</p>
                <div class="hr-stack">
                    <button type="button" class="hr-btn hr-btn--gold" data-chat-ask="Layanan Renovasi">{{ $i('sparkle') }}<span>Tanya Asisten AI</span></button>
                    <a class="hr-btn hr-btn--light" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Booking Survei</span></a>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
