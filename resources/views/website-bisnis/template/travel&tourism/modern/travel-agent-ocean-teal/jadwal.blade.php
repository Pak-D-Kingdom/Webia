@extends($ns . '.layouts.app')

@section('title', 'Jadwal Keberangkatan – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Jadwal Keberangkatan',
        'lead'  => 'Tersedia jadwal keberangkatan setiap minggu / bulan.',
        'image' => 'dest-santorini.jpg',
    ])
    @include($ns . '.sections.schedule', ['mode' => 'page'])
@endsection
