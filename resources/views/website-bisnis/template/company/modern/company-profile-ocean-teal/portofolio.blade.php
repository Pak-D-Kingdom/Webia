@php
    $ns  = 'website-bisnis.template.company.modern.company-profile-ocean-teal';
    $z   = $siteConfig ?? config('template.company.modern.company-profile-ocean-teal.company-profile');
    $img = fn ($f) => asset($z['paths']['images'].'/'.$f);
    $url = isset($pageUrl)
        ? fn ($k, $a = null) => $pageUrl(match ($k) { 'about' => 'tentang-kami', 'portfolio' => 'portofolio', default => 'home' }, $a ? '#'.$a : '')
        : fn ($k, $a = null) => route($z['routes'][$k]).($a ? '#'.$a : '');
    $active = 'portfolio';
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Portofolio - '.$z['brand']['name'])

@section('content')
    @include($ns.'.partials.page-header', ['heading' => $z['portfolio']['page_title'], 'lead' => $z['portfolio']['page_text']])
    @include($ns.'.sections.portfolio-list')
    <div class="ot-container ot-endrow ot-endrow--single">
        @include($ns.'.sections.cta')
    </div>
@endsection
