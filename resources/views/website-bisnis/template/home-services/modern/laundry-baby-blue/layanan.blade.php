@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Layanan Laundry — BlueLaundry')
@section('description', 'Cuci kering, cuci setrika, setrika saja, bed cover, bantal, boneka, sepatu, dan gorden di BlueLaundry Surabaya.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Layanan Laundry Kami', 'text' => 'Berbagai pilihan layanan laundry sesuai kebutuhan Anda, dari pakaian harian sampai bed cover dan sepatu.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.services', ['mode' => 'full'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.cta-strip')
@endsection
