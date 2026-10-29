@extends($ns . '.layouts.app')
@section('title', 'Itinerary Perjalanan')
@section('page', 'itinerary')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Itinerary Perjalanan', 'subtitle' => 'Rincian perjalanan lengkap, dari hari pertama hingga hari terakhir.'])
    @include($ns . '.sections.itinerary')
@endsection
