@extends($ns . '.layouts.app')

@section('title', $ta['brand']['name'] . ' – Liburan Impian Anda Dimulai di Sini')

@section('content')
    @include($ns . '.sections.hero')

    {{-- Destination catalog (preview) --}}
    @include($ns . '.sections.destinations', ['mode' => 'preview'])

    {{-- Tour packages (preview) --}}
    <section class="ta-section ta-section--tight">
        <div class="ta-container ta-feature">
            @include($ns . '.sections.packages', ['mode' => 'preview'])
        </div>
    </section>

    {{-- Departure schedules + Photo gallery + Testimonials (preview) --}}
    <section class="ta-section ta-section--tight">
        <div class="ta-container ta-trio">
            @include($ns . '.sections.schedule', ['mode' => 'preview'])
            @include($ns . '.sections.gallery', ['mode' => 'preview'])
            @include($ns . '.sections.testimonials', ['mode' => 'preview'])
        </div>
    </section>

    {{-- Booking inquiry + AI chatbot (preview) --}}
    @include($ns . '.sections.inquiry', ['mode' => 'preview'])
@endsection
