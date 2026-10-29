@extends($ns . '.layouts.app')

@section('title', 'Destinasi — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Destinasi', 'subtitle' => 'Jelajahi destinasi eksotis pilihan kami, dari pantai tropis hingga kota bersejarah.'])
    @include($ns . '.sections.destinations', ['mode' => 'full'])
@endsection
