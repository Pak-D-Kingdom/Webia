@php
    $ns  = $cafe['paths']['views'];
    $img = fn (string $file) => asset($cafe['paths']['img'] . '/' . $file);
@endphp
@extends("$ns.layouts.app")

@section('title', $cafe['menu']['page_title'] . ' — ' . $cafe['brand']['name'])
@section('page', 'menu')

@section('content')
    @include("$ns.partials.page-header", ['title' => $cafe['menu']['page_title'], 'text' => $cafe['menu']['page_text']])

    <div class="kl-container">
        @include("$ns.sections.menu-list")

        <div class="kl-stack">
            @include("$ns.sections.promo")
        </div>
    </div>
@endsection
