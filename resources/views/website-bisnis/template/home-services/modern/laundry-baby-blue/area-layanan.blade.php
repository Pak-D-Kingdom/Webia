@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Area Pickup & Delivery — BlueLaundry')
@section('description', 'Area antar-jemput laundry BlueLaundry di Surabaya Pusat, Timur, Barat, Utara, dan Selatan.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Area Pickup & Delivery', 'text' => 'Layanan antar–jemput laundry untuk seluruh wilayah Surabaya.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.coverage', ['mode' => 'full'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.cta-strip')
@endsection
