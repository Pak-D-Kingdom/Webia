@extends($ns . '.layouts.app')
@section('title', 'Booking Inquiry')
@section('page', 'booking')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Booking Inquiry', 'subtitle' => 'Kirim pertanyaan atau permintaan booking Anda.'])
    @include($ns . '.sections.booking')
@endsection
