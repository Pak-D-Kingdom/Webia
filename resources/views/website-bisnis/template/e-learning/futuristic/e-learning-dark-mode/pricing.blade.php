@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Pricing')
@section('page', 'pricing')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Harga Paket', 'text' => 'Pilih paket yang sesuai dengan kebutuhanmu.', 'crumb' => 'Pricing'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.pricing', ['full' => true])
    </div>
@endsection
