@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Proses Proyek Kami — ArchiDesign')
@section('active', 'proses')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Proses Proyek Kami', 'sub' => 'Langkah demi langkah, dari ide hingga nyata.', 'bg' => 'blueprint-desk.svg', 'icon' => 'badge', 'crumb' => 'Proses Proyek'])

<section class="abd-section">
    <div class="abd-container">
        <ol class="abd-timeline">
            @foreach ($site['process'] as $s)
                <li class="abd-tl" data-reveal>
                    <span class="abd-tl__num" aria-hidden="true">{{ $loop->iteration }}</span>
                    <div class="abd-tl__card">
                        <div class="abd-tl__head">
                            <span class="abd-step__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                            <h3>{{ $s['title'] }}</h3>
                            <span class="abd-pill"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $s['time'] }}</span>
                        </div>
                        <p>{{ $s['desc'] }}</p>
                        <ul class="abd-chips">@foreach ($s['out'] as $o)<li>{{ $o }}</li>@endforeach</ul>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
