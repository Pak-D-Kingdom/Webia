@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'testimonials')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Testimonials')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'ink', 'crumb' => 'Testimonials', 'title' => 'Pengalaman mereka bersama kami.', 'lead' => 'Delapan ulasan dari klien setelah proyek selesai, apa adanya.'])

    <section class="bca-section bca-tone-tint" aria-labelledby="bca-tsp-h">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Sorotan</span><h2 class="bca-h2" id="bca-tsp-h">Cerita yang paling <mark class="bca-hl">sering kami dengar.</mark></h2></div>
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.testimonial-stage', ['items' => $site['testimonials'], 'uid' => 'page'])
        </div>
    </section>

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-tw-h">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Semua ulasan</span><h2 class="bca-h2" id="bca-tw-h">Delapan klien, <mark class="bca-hl">delapan cerita.</mark></h2><p class="bca-lead">Rata-rata penilaian 5,0 dari {{ count($site['testimonials']) }} ulasan demo.</p></div>
            <div class="bca-wall">
                @foreach($site['testimonials'] as $q)
                    <figure class="bca-wcard bca-reveal" data-tone="{{ $q['variant'] }}" style="--bca-d:{{ ($loop->index % 3) * 0.07 }}s">
                        <div class="bca-wcard__top"><div class="bca-stars" role="img" aria-label="Penilaian {{ $q['rating'] }} dari 5">@foreach([1, 2, 3, 4, 5] as $n)@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'star'])@endforeach</div><span class="bca-chip">{{ $q['project'] }}</span></div>
                        <blockquote>&ldquo;{{ $q['quote'] }}&rdquo;</blockquote>
                        <figcaption class="bca-who"><span class="bca-avatar" data-tone="{{ $q['tone'] }}" aria-hidden="true">{{ $q['initials'] }}</span><span><strong>{{ $q['name'] }}</strong><span>{{ $q['role'] }}, {{ $q['company'] }}</span></span></figcaption>
                    </figure>
                @endforeach
            </div>
            <p class="bca-muted" style="margin-top:24px">Ulasan pada template ini adalah contoh fiktif.</p>
        </div>
    </section>
@endsection
