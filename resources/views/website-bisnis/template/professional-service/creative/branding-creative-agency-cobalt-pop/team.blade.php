@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'team')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Our Team')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'yellow', 'crumb' => 'Our Team', 'title' => 'Delapan orang, satu meja panjang.', 'lead' => 'Strategi, desain, konten, dan koordinasi dikerjakan dalam satu tim kecil yang saling mengenal baik.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-tp-h">
        <div class="bca-wrap">
            <h2 class="bca-sr" id="bca-tp-h">Anggota tim</h2>
            <div class="bca-team">
                @foreach($site['team'] as $m)
                    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.team-card', ['m' => $m])
                @endforeach
            </div>
            <p class="bca-muted" style="margin-top:44px">Nama anggota tim bersifat fiktif. Potret ditampilkan sebagai monogram grafis; ganti dengan foto asli tim Anda.</p>
        </div>
    </section>
@endsection
