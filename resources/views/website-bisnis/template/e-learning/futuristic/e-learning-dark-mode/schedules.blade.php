@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Schedules')
@section('page', 'schedules')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Jadwal Kelas', 'text' => 'Lihat kelas online yang berlangsung hari ini, minggu ini, dan yang akan datang.', 'crumb' => 'Schedules'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.schedules', ['full' => true])
    </div>
@endsection
