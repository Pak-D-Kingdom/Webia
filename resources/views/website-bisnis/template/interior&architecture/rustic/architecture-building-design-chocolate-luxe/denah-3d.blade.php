@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Denah Lantai & 3D Render — ArchiDesign')
@section('active', 'denah-3d')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Denah Lantai & 3D Render', 'sub' => 'Visualisasi desain dengan detail dan realistis.', 'bg' => 'plan-3d-3.svg', 'icon' => 'cube', 'crumb' => 'Desain & Render'])

<section class="abd-section">
    <div class="abd-container">
        <div class="abd-sec-head" data-reveal><h2>Denah &amp; Render Interaktif</h2><p>Pilih tampilan denah 2D atau render 3D untuk setiap tipe bangunan.</p></div>
        <div class="abd-plans">
            @foreach ($site['plans'] as $p)
                <article class="abd-plan" data-plan data-reveal>
                    <div class="abd-plan__tabs" role="tablist" aria-label="Tampilan {{ $p['title'] }}">
                        <button type="button" role="tab" class="is-active" aria-selected="true" data-src="{{ $img('plan-2d-' . $p['n'] . '.svg') }}"><svg class="i" aria-hidden="true"><use href="#i-plan"/></svg>Denah 2D</button>
                        <button type="button" role="tab" aria-selected="false" data-src="{{ $img('plan-3d-' . $p['n'] . '.svg') }}"><svg class="i" aria-hidden="true"><use href="#i-cube"/></svg>Render 3D</button>
                    </div>
                    <button type="button" class="abd-plan__view" data-lightbox="{{ $img('plan-2d-' . $p['n'] . '.svg') }}" data-cap="{{ $p['title'] }}" aria-label="Perbesar gambar {{ $p['title'] }}">
                        <img src="{{ $img('plan-2d-' . $p['n'] . '.svg') }}" alt="Denah {{ $p['title'] }}" loading="lazy" width="900" height="560">
                        <span class="abd-pcard__zoom" aria-hidden="true"><svg class="i"><use href="#i-expand"/></svg></span>
                    </button>
                    <div class="abd-plan__body">
                        <h3>{{ $p['title'] }}</h3>
                        <p>{{ $p['desc'] }}</p>
                        <ul class="abd-plan__meta"><li><svg class="i" aria-hidden="true"><use href="#i-ruler"/></svg>{{ $p['area'] }}</li><li><svg class="i" aria-hidden="true"><use href="#i-home"/></svg>{{ $p['rooms'] }}</li></ul>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="abd-section abd-section--tint">
    <div class="abd-container">
        <div class="abd-sec-head" data-reveal><h2>Render Eksterior</h2><p>Lihat tampilan akhir bangunan sebelum konstruksi dimulai.</p></div>
        <div class="abd-grid-3">
            @foreach ([['Rumah Modern Minimalis', 'res-01.svg'], ['Villa Tropis Modern', 'vil-01.svg'], ['Gedung Perkantoran', 'com-01.svg']] as [$t, $f])
                <figure class="abd-fig" data-reveal>
                    <button type="button" data-lightbox="{{ $img($f) }}" data-cap="Render eksterior — {{ $t }}" aria-label="Perbesar {{ $t }}"><img src="{{ $img($f) }}" alt="Render eksterior {{ $t }}" loading="lazy" width="800" height="560"></button>
                    <figcaption>{{ $t }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
