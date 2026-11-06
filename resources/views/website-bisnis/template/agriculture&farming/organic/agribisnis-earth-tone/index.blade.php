@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', $data['brand']['title'])
@section('page_key', 'home')

@section('content')
    @include($v . '.sections.hero')

    <div class="home">
        @include($v . '.sections.commodity-preview')

        <div class="home-row home-row--feature">
            @include($v . '.sections.harvest-preview')
            @include($v . '.sections.specs-preview')
            @include($v . '.sections.moq-preview')
            @include($v . '.sections.capacity-preview')
        </div>

        <div class="home-row home-row--reach">
            @include($v . '.sections.distribution-preview')
            @include($v . '.sections.certification-preview')
            @include($v . '.sections.b2b-preview')
            @include($v . '.sections.quotation-preview')
        </div>

        @include($v . '.sections.values-strip')
    </div>
@endsection
