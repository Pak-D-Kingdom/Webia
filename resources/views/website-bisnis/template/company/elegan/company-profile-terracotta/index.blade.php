@php
    $c    = config('template.company.elegan.company-profile-terracotta.company-profile');
    $v    = 'website-bisnis.template.company.elegan.company-profile-terracotta';
    $img  = fn ($f) => asset($c['img'] . $f);
    $ic   = fn ($n) => new \Illuminate\Support\HtmlString('<svg class="cp-ic" aria-hidden="true"><use href="#i-' . $n . '"/></svg>');
    $home = route('company-terracotta.home');
    // link anchor beranda ('h') atau halaman sendiri ('r'); dari halaman lain anchor diarahkan ke beranda
    $link = fn ($n) => isset($n['r']) ? route($n['r']) : ((request()->routeIs('company-terracotta.home') ? '' : $home) . $n['h']);
@endphp
@extends("$v.layouts.app")

@section('content')
    @include("$v.sections.hero")

    <div class="cp-wrap cp-sec">
        @include("$v.sections.services")
    </div>

    <div class="cp-wrap cp-duo">
        @include("$v.sections.portfolio-preview")
        @include("$v.sections.projects")
    </div>

    <div class="cp-wrap cp-duo">
        @include("$v.sections.certifications")
        @include("$v.sections.clients")
    </div>

    <div class="cp-wrap cp-sec">
        @include("$v.sections.quotation")
    </div>

    <div class="cp-wrap cp-sec cp-sec--last">
        @include("$v.sections.contact")
    </div>
@endsection
