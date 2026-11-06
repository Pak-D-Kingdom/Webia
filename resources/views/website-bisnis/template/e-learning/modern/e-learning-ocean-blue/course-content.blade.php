@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Course Content — E-learna')
@section('page', 'course-content')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'course-content'])
    @include($ns.'.sections.course-content', ['mode' => 'full'])
@endsection
