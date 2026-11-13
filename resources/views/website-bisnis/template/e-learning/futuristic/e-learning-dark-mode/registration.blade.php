@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Registration')
@section('page', 'registration')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Registrasi', 'text' => 'Daftar sekarang dan mulai perjalanan belajarmu bersama '.$e['brand']['name'].'.', 'crumb' => 'Registration'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.registration', ['full' => true])
    </div>
@endsection
