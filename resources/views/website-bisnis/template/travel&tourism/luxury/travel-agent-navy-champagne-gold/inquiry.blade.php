@extends($ns . '.layouts.app')

@section('title', 'Booking Inquiry — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Booking Inquiry', 'subtitle' => 'Konsultasikan rencana perjalanan Anda bersama tim kami.'])
    @include($ns . '.sections.inquiry', ['mode' => 'full'])
@endsection
