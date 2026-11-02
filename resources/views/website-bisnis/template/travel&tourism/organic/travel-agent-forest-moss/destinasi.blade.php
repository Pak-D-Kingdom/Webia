@extends($ns . '.layouts.app')
@section('title', 'Destinasi')
@section('page', 'destinasi')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Destinasi', 'subtitle' => 'Temukan destinasi impianmu di berbagai penjuru dunia, dari keindahan alam hingga kekayaan budaya.'])
    @include($ns . '.sections.destinations')
@endsection
