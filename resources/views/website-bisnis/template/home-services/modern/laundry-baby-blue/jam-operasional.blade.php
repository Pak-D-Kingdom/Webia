@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Jam Operasional — BlueLaundry')
@section('description', 'BlueLaundry buka setiap hari Senin sampai Minggu pukul 08:00 - 20:00 WIB.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Jam Operasional', 'text' => 'Kami siap melayani Anda setiap hari.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.hours', ['mode' => 'full'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.cta-strip')
@endsection
