{{-- Halaman detail properti: /property/{slug}. $slug datang dari URL --}}
@php
    $page   = 'property';
    $detail = true;   // header & judul tab memakai data properti
    $blocks = [
        ['partials.page-header'],
        ['partials.detail-nav'],
        ['sections.detail'],   // galeri, info & harga, spesifikasi, fasilitas, deskripsi, lokasi
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
