{{-- Halaman Property Listing --}}
@php
    $page   = 'property';
    $blocks = [
        ['partials.page-header'],
        ['sections.listing'],
        ['sections.inquiry'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
