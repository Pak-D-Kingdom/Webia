{{--
|--------------------------------------------------------------------------
| GreenHaven · Real Estate Agency · Luxury / Emerald Green  —  BERANDA
|--------------------------------------------------------------------------
| View  : website-bisnis.template.property.luxury.real-estate-agency-emerald-green.index
| Data  : config/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.php
| Halaman lain: property, specification, price, about, gallery, booking, blog
| Data & helper disiapkan di layouts/app.blade.php
--}}
@php
    $page   = 'index';
    $blocks = [
        ['sections.hero'],                                              // slider property listing
        ['sections.listing',       ['preview' => true, 'limit' => 3]],  // preview Property Listing
        ['sections.specification', ['preview' => true, 'limit' => 6]],  // preview Specification
        ['sections.price',         ['preview' => true]],                // preview Price
        ['sections.about',         ['preview' => true]],                // preview About Us
        ['sections.features'],
        ['sections.gallery',       ['preview' => true]],                // preview Gallery
        ['sections.booking',       ['preview' => true]],                // preview Booking / Viewing
        ['sections.blog',          ['preview' => true, 'limit' => 3]],  // preview Blog
        ['sections.location'],
        ['sections.inquiry'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
