@php
    $ns  = 'website-bisnis.template.company.modern.company-profile-ocean-teal';
    $z   = config('template.company.modern.company-profile-ocean-teal.company-profile');
    $img = fn ($f) => asset($z['paths']['images'].'/'.$f);
    $url = fn ($k, $a = null) => route($z['routes'][$k]).($a ? '#'.$a : '');
    $active = 'home';
@endphp
@extends($ns.'.layouts.app')

@section('content')
    @include($ns.'.sections.hero')
    @include($ns.'.sections.services')

    <section class="ot-showcase" aria-label="Portofolio, proyek, sertifikasi, dan klien">
        <div class="ot-container ot-showcase__grid">
            @include($ns.'.sections.portfolio-preview')
            @include($ns.'.sections.projects')
            @include($ns.'.sections.certifications')
            @include($ns.'.sections.clients')
        </div>
    </section>

    <div class="ot-container ot-endrow">
        @include($ns.'.sections.cta')
        @include($ns.'.sections.contact')
    </div>
@endsection
