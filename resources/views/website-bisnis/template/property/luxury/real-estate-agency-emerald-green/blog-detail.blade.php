{{-- Halaman artikel blog: /blog/{post}. $post datang dari URL --}}
@php
    $page        = 'blog';
    $articleView = true;   // header & judul tab memakai data artikel
    $blocks = [
        ['partials.page-header'],
        ['sections.article'],
    ];
@endphp

@extends('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.layouts.app')
