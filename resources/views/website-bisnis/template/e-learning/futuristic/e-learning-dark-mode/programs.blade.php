@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Programs')
@section('page', 'programs')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Program Unggulan', 'text' => 'Kursus terbaik pilihan untuk meningkatkan skill dan karier kamu.', 'crumb' => 'Programs'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.programs', ['full' => true])
    </div>
@endsection
