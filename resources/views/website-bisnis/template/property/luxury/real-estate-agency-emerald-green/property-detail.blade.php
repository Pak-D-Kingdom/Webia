{{-- Halaman detail properti: /property/{slug}. $slug datang dari URL --}}
@php
    $page   = 'property';
    $detail = true;   // header & judul tab memakai data properti
    $blocks = [
        ['partials.page-header'],
        ['sections.gallery', ['head' => true]],
        ['sections.specification', ['head' => true]],
        ['sections.price'],
        ['sections.booking'],
        ['sections.location'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
