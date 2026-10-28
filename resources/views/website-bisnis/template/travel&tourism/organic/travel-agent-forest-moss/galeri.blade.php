@extends($ns . '.layouts.app')
@section('title', 'Galeri Foto')
@section('page', 'galeri')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Galeri Foto', 'subtitle' => 'Koleksi momen indah dari perjalanan kami.'])
    @include($ns . '.sections.gallery')
@endsection
