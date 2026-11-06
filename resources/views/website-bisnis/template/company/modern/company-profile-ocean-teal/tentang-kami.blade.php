@php
    $ns  = 'website-bisnis.template.company.modern.company-profile-ocean-teal';
    $z   = config('template.company.modern.company-profile-ocean-teal.company-profile');
    $img = fn ($f) => asset($z['paths']['images'].'/'.$f);
    $url = fn ($k, $a = null) => route($z['routes'][$k]).($a ? '#'.$a : '');
    $active = 'about';
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Tentang Kami - '.$z['brand']['name'])

@section('content')
    @include($ns.'.partials.page-header', ['heading' => 'Tentang Kami', 'lead' => $z['about']['paragraphs'][0]])
    @include($ns.'.sections.about')
    <div class="ot-container ot-endrow ot-endrow--single">
        @include($ns.'.sections.cta')
    </div>
@endsection
