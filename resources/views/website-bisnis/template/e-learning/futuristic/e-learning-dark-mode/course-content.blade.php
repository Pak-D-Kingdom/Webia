@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Course Content')
@section('page', 'course-content')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Course Content', 'text' => $customerSite ? 'Pelajari materi kursus secara berurutan.' : 'Pelajari materi kursus secara berurutan dan pantau progres belajarmu.', 'crumb' => 'Course Content'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.course-content', ['full' => true])
    </div>
@endsection
