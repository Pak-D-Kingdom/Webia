@extends($v.'.layouts.app')

@section('body_class', 'page-home')

@section('content')
    @include($v.'.sections.hero')
    @include($v.'.sections.chatbot')

    <div class="hf-wide hf-bento">
        <div class="hf-row hf-row--1">
            @include($v.'.sections.mission-vision')
            @include($v.'.sections.programs')
            @include($v.'.sections.impact')
        </div>
        <div class="hf-row hf-row--2">
            @include($v.'.sections.donation')
            @include($v.'.sections.transparency')
            @include($v.'.sections.partners')
        </div>
        <div class="hf-row hf-row--3">
            @include($v.'.sections.volunteer')
            @include($v.'.sections.news')
            @include($v.'.sections.quote')
        </div>
    </div>
@endsection
