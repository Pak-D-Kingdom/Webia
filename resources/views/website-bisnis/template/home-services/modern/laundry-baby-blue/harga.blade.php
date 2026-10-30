@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Daftar Harga Laundry — BlueLaundry')
@section('description', 'Daftar harga laundry BlueLaundry berdasarkan item dan berdasarkan kilogram. Harga transparan, hasil premium.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Daftar Harga Laundry', 'text' => 'Harga transparan, hasil premium. Lihat tarif per item atau per kilogram.'])
    <section class="lb-section" aria-label="Daftar harga">
        <div class="lb-container lb-container--narrow">
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.prices', ['mode' => 'full'])
        </div>
    </section>
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.cta-strip')
@endsection
