@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Sertifikasi & Lisensi — ArchiDesign')
@section('active', 'sertifikasi')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Sertifikasi & Lisensi', 'sub' => 'Profesional dan terpercaya.', 'bg' => 'com-01.svg', 'icon' => 'badge', 'crumb' => 'Sertifikasi'])

<section class="abd-section">
    <div class="abd-container">
        <div class="abd-cert-grid">
            @foreach ($site['certs'] as $c)
                <article class="abd-cert" data-reveal>
                    <div class="abd-cert__badge"><img src="{{ $img($c['img']) }}" alt="{{ $c['title'] }}" loading="lazy" width="160" height="100"></div>
                    <h3>{{ $c['title'] }}</h3>
                    <p class="abd-cert__org">{{ $c['org'] }}</p>
                    <p>{{ $c['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
