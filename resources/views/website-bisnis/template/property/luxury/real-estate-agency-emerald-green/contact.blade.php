{{-- Halaman Contact (inquiry + location) --}}
@php
    $page   = 'contact';
    $blocks = [
        ['partials.page-header'],
        ['sections.inquiry'],
        ['sections.location'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
