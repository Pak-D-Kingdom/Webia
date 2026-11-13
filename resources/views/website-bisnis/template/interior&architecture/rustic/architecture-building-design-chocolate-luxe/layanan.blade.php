@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Layanan Desain Kami — ArchiDesign')
@section('active', 'layanan')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Layanan Desain Kami', 'sub' => 'Layanan profesional untuk berbagai kebutuhan Anda.', 'bg' => 'interior-service.svg', 'icon' => 'compass', 'crumb' => 'Layanan'])

<section class="abd-section">
    <div class="abd-container">
        <div class="abd-svc-grid">
            @foreach ($site['services'] as $s)
                <article class="abd-svc" data-reveal>
                    <span class="abd-svc__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <h3>{{ $s['title'] }}</h3>
                    <p>{{ $s['desc'] }}</p>
                    <ul class="abd-checks abd-checks--dark">
                        @foreach ($s['items'] as $it)
                            <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>{{ $it }}</li>
                        @endforeach
                    </ul>
                    <a class="abd-link" href="{{ $u('/konsultasi') }}">Konsultasikan <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </article>
            @endforeach
            <article class="abd-svc abd-svc--img" data-reveal>
                <img src="{{ $img('interior-service.svg') }}" alt="" loading="lazy" width="900" height="600">
                <div><h3>Bingung memilih layanan?</h3><p>Ceritakan kebutuhan Anda, kami bantu menentukan lingkup yang paling tepat.</p>
                <a class="abd-btn abd-btn--gold abd-btn--sm" href="{{ $u('/konsultasi') }}"><span>Booking Konsultasi</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a></div>
            </article>
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
