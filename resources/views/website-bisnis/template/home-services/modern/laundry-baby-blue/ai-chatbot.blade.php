@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'AI Chatbot — BlueLaundry')
@section('description', 'Tanya AI Laundry Assistant seputar harga dan proses laundry BlueLaundry.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'AI Laundry Assistant', 'text' => 'Tanya seputar harga, layanan, atau proses laundry — dijawab langsung.'])
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.chatbot', ['mode' => 'full'])
@endsection
