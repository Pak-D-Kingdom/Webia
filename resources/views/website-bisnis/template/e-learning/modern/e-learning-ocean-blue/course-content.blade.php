@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = $e ?? config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = $img ?? fn ($f) => asset($e['assets']['img'].$f);
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Course Content — '.$e['brand']['name'])
@section('page', 'course-content')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'course-content'])
    @include($ns.'.sections.course-content', ['mode' => 'full'])
@endsection
