@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'clients')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Our Clients')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'coral', 'crumb' => 'Our Clients', 'title' => 'Klien dari berbagai industri.', 'lead' => 'Dari toko roti sampai layanan keuangan, setiap klien membawa tantangan yang berbeda dan itu yang membuat kami terus belajar.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-cp-h">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Logo klien</span><h2 class="bca-h2" id="bca-cp-h">Delapan belas merek yang pernah kami bantu.</h2></div>
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.client-wall', ['list' => $site['clients']])
            <div class="bca-shead" style="margin:clamp(44px,6vw,80px) 0 26px"><span class="bca-label">Daftar klien</span></div>
            <ul class="bca-roster">
                @foreach($site['clients'] as $c)
                    <li>{{ $c['name'] }}<span>{{ $c['industry'] }}</span></li>
                @endforeach
            </ul>
            <p class="bca-muted" style="margin-top:32px">Nama dan logo klien adalah contoh fiktif untuk keperluan template.</p>
        </div>
    </section>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.pager', ['prev_route' => 'team', 'prev_label' => 'Our Team', 'next_route' => 'testimonials', 'next_label' => 'Testimonials'])
@endsection
