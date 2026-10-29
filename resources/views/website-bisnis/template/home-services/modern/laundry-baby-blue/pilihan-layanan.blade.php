@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Pilihan Layanan — BlueLaundry')
@section('description', 'Pilih Regular, Express, atau Premium Care sesuai kebutuhan laundry Anda.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Pilihan Layanan', 'text' => 'Sesuaikan kecepatan dan perawatan laundry dengan kebutuhan Anda.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.options', ['mode' => 'full'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.cta-strip')
@endsection
