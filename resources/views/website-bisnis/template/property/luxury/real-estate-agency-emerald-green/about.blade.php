{{-- Halaman About Us --}}
@php
    $page   = 'about';
    $blocks = [
        ['partials.page-header'],
        ['sections.about'],
        ['sections.features'],
        ['sections.inquiry'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
