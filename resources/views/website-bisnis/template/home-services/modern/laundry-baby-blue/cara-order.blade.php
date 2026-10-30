@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Cara Order Laundry — BlueLaundry')
@section('description', 'Empat langkah mudah order laundry di BlueLaundry: pilih layanan, atur jadwal, jemput, proses.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Cara Order Laundry', 'text' => 'Order laundry jadi lebih mudah, hanya dalam empat langkah.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.steps', ['mode' => 'full'])
@endsection
