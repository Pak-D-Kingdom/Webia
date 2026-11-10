@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')

@section('title', 'Nur Rahmat Travel — Umrah &amp; Haji Bersama Nur Rahmat Travel')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.hero')

    <div class="uh-home">
        <div class="uh-container uh-home__grid">
            <div class="uh-col uh-col--a">
                @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.packages')
                @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.prices')
                @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.itinerary')
            </div>

            <div class="uh-col uh-col--b">
                @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.schedules')
                @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.team')
            </div>

            <div class="uh-col uh-col--c">
                <div class="uh-col__row uh-col__row--top">
                    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.hotel-flight')
                </div>
                <div class="uh-col__row uh-col__row--bottom">
                    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.requirements')
                    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.testimonials')
                </div>
            </div>
        </div>
    </div>
@endsection
