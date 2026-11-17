@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Booking Konsultasi — ArchiDesign')
@section('active', 'konsultasi')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = '') => url($site['base'] . $p);
    $img = fn (string $f) => asset($site['img'] . '/' . $f);
    $v   = $site['view'];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Booking Konsultasi', 'sub' => 'Atur jadwal konsultasi dengan tim ahli kami.', 'bg' => 'konsultasi-living.jpg', 'icon' => 'calendar', 'crumb' => 'Konsultasi'])

<section class="abd-section">
    <div class="abd-container abd-split">
        @include($v . '.partials.form', ['kind' => 'konsultasi'])

        <aside class="abd-side" data-reveal>
            <div class="abd-side__img"><img src="{{ $img('konsultasi-living.jpg') }}" alt="" loading="lazy" width="1800" height="840"></div>
            <h3>Yang akan kita bahas</h3>
            <ul class="abd-checks abd-checks--dark">
                <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>Kebutuhan ruang, gaya, dan anggaran</li>
                <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>Kondisi lahan dan aturan bangunan</li>
                <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>Lingkup layanan dan jadwal kerja</li>
            </ul>
            <p class="abd-side__row"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $site['contact']['hours'] }}</p>
            <p class="abd-side__row"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg>{{ $site['contact']['phone'] }}</p>
        </aside>
    </div>
</section>
@endsection
