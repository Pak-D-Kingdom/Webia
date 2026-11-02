@extends($ns . '.layouts.app')
@section('title', 'Jelajahi Dunia Bersama GreenTrip')
@section('page', 'home')
@section('content')
    @include($ns . '.sections.hero')
    @include($ns . '.sections.destinations', ['preview' => true])

    <section class="ta-section ta-section--tight">
        <div class="ta-container ta-row ta-row--pkg">
            @include($ns . '.sections.packages', ['preview' => true])
            @include($ns . '.sections.itinerary', ['preview' => true])
        </div>
    </section>

    <section class="ta-section ta-section--tight">
        <div class="ta-container ta-row ta-row--quad">
            @include($ns . '.sections.schedule', ['preview' => true])
            @include($ns . '.sections.gallery', ['preview' => true])
            @include($ns . '.sections.booking', ['preview' => true])
            @include($ns . '.sections.testimonials', ['preview' => true])
        </div>
    </section>

    @include($ns . '.sections.ai-assistant')
@endsection
