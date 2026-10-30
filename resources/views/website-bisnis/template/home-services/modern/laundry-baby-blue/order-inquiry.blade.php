@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'Order Inquiry — BlueLaundry')
@section('description', 'Kirim inquiry atau konfirmasi order laundry Anda ke BlueLaundry lewat WhatsApp.')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.page-head', ['title' => 'Order Inquiry', 'text' => 'Konsultasi atau konfirmasi order Anda. Isi formulir, kami lanjutkan lewat WhatsApp.'])
    <section class="lb-section" aria-label="Formulir order inquiry">
        <div class="lb-container lb-container--narrow">
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.inquiry', ['mode' => 'full'])
        </div>
    </section>
@endsection
