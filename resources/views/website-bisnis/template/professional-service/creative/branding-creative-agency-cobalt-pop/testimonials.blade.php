@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'testimonials')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Testimonials')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'ink', 'crumb' => 'Testimonials', 'title' => 'Pengalaman mereka bersama kami.', 'lead' => 'Delapan ulasan dari klien setelah proyek selesai, apa adanya.'])

    <section class="bca-section bca-tone-tint" aria-labelledby="bca-tsp-h">
        <div class="bca-wrap">
            <h2 class="bca-sr" id="bca-tsp-h">Daftar testimoni</h2>
            <div class="bca-tcols">
                @foreach($site['testimonials'] as $q)
                    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.quote-card', ['q' => $q, 'variant' => $q['variant'], 'big' => false])
                @endforeach
            </div>
            <p class="bca-muted" style="margin-top:20px">Ulasan pada template ini adalah contoh fiktif.</p>
        </div>
    </section>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.pager', ['prev_route' => 'clients', 'prev_label' => 'Our Clients', 'next_route' => 'journal', 'next_label' => 'Creative Journal'])
@endsection
