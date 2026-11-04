@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'Green Harvest — Agri Business & Commodity Trade')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.sections.hero')

    <div class="container home-row home-row--a">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.commodity')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.harvest')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.cta')
    </div>

    <div class="container home-row home-row--b">
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.specs')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.moq')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.supply')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.coverage')
        @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.certs')
    </div>

    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.previews.band')
@endsection
