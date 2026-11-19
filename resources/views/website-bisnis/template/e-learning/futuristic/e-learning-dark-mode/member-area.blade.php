@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Member Area')
@section('page', 'member-area')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Member Area', 'text' => $customerSite ? 'Akses materi kursus, sertifikat, dan fitur eksklusif lainnya.' : 'Akses materi kursus, progres, sertifikat, dan fitur eksklusif lainnya.', 'crumb' => 'Member Area'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.member-area', ['full' => true])
    </div>
@endsection
