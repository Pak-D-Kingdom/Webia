@extends($ns . '.layouts.app')

@section('title', 'Testimoni — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Testimoni', 'subtitle' => 'Cerita dan kepuasan pelanggan yang telah berangkat bersama kami.'])
    @include($ns . '.sections.testimonials', ['mode' => 'full'])
@endsection
