@extends($v . '.layout')

@section('title', 'Sertifikasi — AgroTrade')
@section('description', 'Sertifikasi AgroTrade: USDA Organic, HACCP, ISO 22000, dan Halal Indonesia untuk menjamin kualitas dan keamanan komoditas.')

@section('content')
@php $img = fn ($f) => asset($agro['img_path'] . '/' . $f); @endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Sertifikasi',
    'ph_lead'  => 'Terjamin kualitas dan keamanannya. Seluruh proses kami diaudit terhadap standar pangan nasional dan internasional.',
    'ph_icon'  => 'shield',
])

<section class="container section">
    <div class="grid grid--2 certs">
        @foreach ($agro['certifications'] as $c)
            <article class="cert-card" id="{{ $c['slug'] }}">
                <div class="cert-card__logo"><img src="{{ $img($c['img']) }}" alt="Logo {{ $c['name'] }}" loading="lazy" width="96" height="96"></div>
                <div class="cert-card__body">
                    <h2>{{ $c['name'] }}</h2>
                    <p>{{ $c['text'] }}</p>
                    <p class="cert-card__scope"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg><span><b>Cakupan:</b> {{ $c['scope'] }}</span></p>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="container section section--tight">
    <div class="card docs">
        <span class="mini__ico"><svg class="i" aria-hidden="true"><use href="#i-docs"/></svg></span>
        <div>
            <h2>Dokumen pendukung ekspor</h2>
            <p>Setiap pengiriman dilengkapi Certificate of Analysis (COA), Phytosanitary Certificate, Certificate of Origin (COO), serta packing list dan bill of lading sesuai kebutuhan negara tujuan.</p>
        </div>
        <a class="btn btn--green btn--sm" href="{{ route('agribisnis-classic-trust.penawaran') }}">Minta Dokumen <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Perlu salinan sertifikat?',
    'cta_text'  => 'Tim kami siap mengirimkan salinan sertifikat dan hasil uji laboratorium untuk proses audit pemasok Anda.',
])
@endsection
