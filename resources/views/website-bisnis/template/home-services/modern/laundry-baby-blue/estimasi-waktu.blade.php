@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Estimasi Waktu Pengerjaan — BlueLaundry')
@section('description', 'Estimasi waktu laundry Regular, Express, dan Premium Care serta kalkulator perkiraan selesai.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Estimasi Waktu Pengerjaan', 'text' => 'Proses cepat, sesuai pilihan layanan. Hitung perkiraan laundry Anda selesai.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.turnaround', ['mode' => 'full'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.cta-strip')
@endsection
