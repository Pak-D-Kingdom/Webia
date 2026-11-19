@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Event Organizer & Planner')
@section('description', 'Eventora adalah event organizer dan planner kreatif untuk wedding, corporate event, festival, konser, pameran, dan seminar.')

@section('content')
    @include($eo['view'].'sections.hero')
    @include($eo['view'].'sections.services-preview')

    <section class="eo-showcase" aria-label="Portofolio, paket, dan proyek">
        <div class="eo-container eo-showcase__grid">
            <div class="eo-showcase__a">@include($eo['view'].'sections.portfolio-preview')</div>
            <div class="eo-showcase__b">@include($eo['view'].'sections.packages-preview')</div>
            <div class="eo-showcase__c">@include($eo['view'].'sections.projects-preview')</div>
        </div>
    </section>

    <section class="eo-lower" aria-label="Proses event dan penawaran">
        <div class="eo-container eo-lower__grid">
            @include($eo['view'].'sections.process-preview')
            @include($eo['view'].'sections.quotation-preview')
        </div>
    </section>

    @include($eo['view'].'sections.clients-preview')
@endsection
