@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Proyek Residensial & Komersial — ArchiDesign')
@section('active', 'proyek')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@php $groups = ['residensial' => ['Proyek Residensial', 'Hunian impian untuk keluarga Anda.', 'home'], 'komersial' => ['Proyek Komersial', 'Bangunan bisnis modern yang mendukung operasional.', 'building']]; @endphp
@include($v . '.partials.page-hero', ['title' => 'Proyek Residensial & Komersial', 'sub' => 'Dari hunian impian hingga bangunan bisnis modern.', 'bg' => 'com-02.svg', 'icon' => 'home', 'crumb' => 'Proyek'])

<section class="abd-section">
    <div class="abd-container">
        <div class="abd-filter" role="navigation" aria-label="Lompat ke kelompok proyek">
            @foreach ($groups as $k => [$t])
                <a class="abd-chip" href="#{{ $k }}">{{ $t }}</a>
            @endforeach
        </div>

        @foreach ($groups as $k => [$t, $d, $ic])
            <div class="abd-block" id="{{ $k }}">
                <header class="abd-block__head" data-reveal>
                    <span class="abd-card__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $ic }}"/></svg></span>
                    <div><h2>{{ $t }}</h2><p>{{ $d }}</p></div>
                </header>
                <div class="abd-grid-4">
                    @foreach ($site['projects'][$k] as $p)
                        <article class="abd-pcard abd-pcard--proj" data-reveal>
                            <button type="button" class="abd-pcard__img" data-lightbox="{{ $img($p['img']) }}" data-cap="{{ $p['title'] }} — {{ $p['loc'] }}" aria-label="Perbesar gambar {{ $p['title'] }}">
                                <img src="{{ $img($p['img']) }}" alt="Ilustrasi {{ $p['title'] }}" loading="lazy" width="800" height="560">
                                <span class="abd-pcard__zoom" aria-hidden="true"><svg class="i"><use href="#i-expand"/></svg></span>
                            </button>
                            <div class="abd-pcard__body">
                                <span class="abd-tag {{ str_contains($p['status'], 'Dalam') ? 'abd-tag--live' : '' }}">{{ $p['status'] }}</span>
                                <h3>{{ $p['title'] }}</h3>
                                <p>{{ $p['desc'] }}</p>
                                <dl class="abd-spec">
                                    <div><dt>Lokasi</dt><dd>{{ $p['loc'] }}</dd></div>
                                    <div><dt>Luas</dt><dd>{{ $p['area'] }}</dd></div>
                                    <div><dt>Tinggi</dt><dd>{{ $p['floors'] }}</dd></div>
                                </dl>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
@include($v . '.partials.cta')
@endsection
