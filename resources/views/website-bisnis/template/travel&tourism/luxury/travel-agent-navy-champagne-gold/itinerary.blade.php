@extends($ns . '.layouts.app')

@section('title', 'Itinerary — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Itinerary', 'subtitle' => 'Rincian perjalanan hari demi hari untuk setiap paket tour.'])
    @include($ns . '.sections.itinerary', ['mode' => 'full'])
@endsection
