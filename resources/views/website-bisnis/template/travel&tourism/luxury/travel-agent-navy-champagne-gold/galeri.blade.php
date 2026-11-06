@extends($ns . '.layouts.app')

@section('title', 'Galeri Foto — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Galeri Foto', 'subtitle' => 'Momen indah dari perjalanan para tamu GrandJourney.'])
    @include($ns . '.sections.gallery', ['mode' => 'full'])
@endsection
