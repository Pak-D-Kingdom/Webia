{{-- Halaman Specification (spesifikasi + lokasi) --}}
@php
    $page   = 'specification';
    $blocks = [
        ['partials.page-header'],
        ['sections.specification'],
        ['sections.location'],
        ['sections.inquiry'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
