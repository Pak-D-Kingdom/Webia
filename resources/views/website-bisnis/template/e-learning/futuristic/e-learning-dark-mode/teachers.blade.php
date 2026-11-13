@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Teachers')
@section('page', 'teachers')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Teacher Terbaik', 'text' => 'Belajar langsung dari pengajar profesional dan berpengalaman.', 'crumb' => 'Teachers'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.teachers', ['full' => true])
    </div>
@endsection
