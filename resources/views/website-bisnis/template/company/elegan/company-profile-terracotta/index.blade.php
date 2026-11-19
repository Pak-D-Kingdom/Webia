@php
    $c    = $siteConfig ?? config('template.company.elegan.company-profile-terracotta.company-profile');
    $v    = 'website-bisnis.template.company.elegan.company-profile-terracotta';
    $img  = fn ($f) => asset($c['img'] . $f);
    $ic   = fn ($n) => new \Illuminate\Support\HtmlString('<svg class="cp-ic" aria-hidden="true"><use href="#i-' . $n . '"/></svg>');
    $home = isset($pageUrl) ? $pageUrl() : route('company-terracotta.home');
    $routeUrl = $pageUrl ?? fn (string $page) => route(match ($page) {
        'tentang-kami' => 'company-terracotta.about',
        'portofolio' => 'company-terracotta.portfolio',
        default => 'company-terracotta.home',
    });
    $link = fn ($n) => isset($n['r'])
        ? $routeUrl(str_contains($n['r'], 'about') ? 'tentang-kami' : 'portofolio')
        : (($currentPage ?? 'home') === 'home' ? '' : $home) . $n['h'];
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
        @unless (isset($pageUrl))
            @include("$v.sections.certifications")
            @include("$v.sections.clients")
        @endunless
    </div>

    <div class="cp-wrap cp-sec">
        @include("$v.sections.quotation")
    </div>

    <div class="cp-wrap cp-sec cp-sec--last">
        @include("$v.sections.contact")
    </div>
@endsection
