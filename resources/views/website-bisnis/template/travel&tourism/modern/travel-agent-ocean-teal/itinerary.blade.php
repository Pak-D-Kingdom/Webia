@extends($ns . '.layouts.app')

@section('title', 'Itinerary Perjalanan – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Itinerary Perjalanan',
        'lead'  => 'Rencana perjalanan yang detail dan terstruktur, hari demi hari.',
        'image' => 'dest-tokyo.jpg',
    ])
    @include($ns . '.sections.itinerary', ['mode' => 'page'])
@endsection
