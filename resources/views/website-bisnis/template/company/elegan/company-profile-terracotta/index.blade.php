@php
    $c   = config('template.company.elegan.company-profile-terracotta.company-profile');
    $v   = 'website-bisnis.template.company.elegan.company-profile-terracotta';
    $img = fn ($f) => asset($c['img'] . $f);
    $ic  = fn ($n) => new \Illuminate\Support\HtmlString('<svg class="cp-ic" aria-hidden="true"><use href="#i-' . $n . '"/></svg>');
@endphp
@extends("$v.layouts.app")

@section('content')
    @include("$v.sections.hero")

    <div class="cp-wrap cp-split">
        @include("$v.sections.about")
        @include("$v.sections.services")
    </div>

    <div class="cp-wrap cp-quad">
        @include("$v.sections.portfolio")
        @include("$v.sections.projects")
        @include("$v.sections.certifications")
        @include("$v.sections.clients")
    </div>

    <div class="cp-wrap cp-split cp-split--equal">
        @include("$v.sections.quotation")
        @include("$v.sections.contact")
    </div>
@endsection
