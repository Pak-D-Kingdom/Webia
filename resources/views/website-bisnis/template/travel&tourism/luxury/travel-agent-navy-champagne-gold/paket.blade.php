@extends($ns . '.layouts.app')

@section('title', 'Paket Tour — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Paket Tour', 'subtitle' => 'Paket tour premium dengan hotel, transportasi, dan makan yang sudah diatur.'])
    @include($ns . '.sections.packages', ['mode' => 'full'])
@endsection
