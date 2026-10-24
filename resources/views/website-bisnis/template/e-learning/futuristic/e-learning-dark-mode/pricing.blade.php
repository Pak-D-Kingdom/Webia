@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Pricing')
@section('page', 'pricing')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Harga Paket', 'text' => 'Pilih paket yang sesuai dengan kebutuhanmu.', 'crumb' => 'Pricing'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.pricing', ['full' => true])
    </div>
@endsection
