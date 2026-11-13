@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Arsitektur Portfolio — ArchiDesign')
@section('active', 'portofolio')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@php $cats = ['semua' => 'Semua', 'residensial' => 'Residensial', 'komersial' => 'Komersial', 'villa' => 'Villa']; @endphp
@include($v . '.partials.page-hero', ['title' => 'Arsitektur Portfolio', 'sub' => 'Karya terbaik kami dalam menciptakan ruang yang inspiratif.', 'bg' => 'res-02.svg', 'icon' => 'grid', 'crumb' => 'Portofolio'])

<section class="abd-section">
    <div class="abd-container">
        <div class="abd-filter" role="group" aria-label="Filter kategori portofolio">
            @foreach ($cats as $k => $label)
                <button type="button" class="abd-chip {{ $loop->first ? 'is-active' : '' }}" data-filter="{{ $k }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $label }}</button>
            @endforeach
        </div>

        <div class="abd-gallery" data-gallery>
            @foreach ($site['portfolio'] as $p)
                <article class="abd-pcard" data-cat="{{ $p['cat'] }}" data-reveal>
                    <button type="button" class="abd-pcard__img" data-lightbox="{{ $img($p['img']) }}" data-cap="{{ $p['title'] }} — {{ $p['loc'] }}" aria-label="Perbesar gambar {{ $p['title'] }}">
                        <img src="{{ $img($p['img']) }}" alt="Ilustrasi {{ $p['title'] }}" loading="lazy" width="800" height="560">
                        <span class="abd-pcard__zoom" aria-hidden="true"><svg class="i"><use href="#i-expand"/></svg></span>
                    </button>
                    <div class="abd-pcard__body">
                        <span class="abd-tag">{{ $cats[$p['cat']] }}</span>
                        <h3>{{ $p['title'] }}</h3>
                        <p class="abd-meta"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $p['loc'] }}<span aria-hidden="true">•</span>{{ $p['year'] }}<span aria-hidden="true">•</span>{{ $p['area'] }}</p>
                        <p>{{ $p['desc'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="abd-empty" data-empty hidden>Belum ada karya pada kategori ini.</p>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
