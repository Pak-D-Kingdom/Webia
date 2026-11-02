@extends($ns . '.layouts.app')

@section('title', 'GrandJourney — Luxury Travel & Tour')

@section('content')
    @include($ns . '.sections.hero')

    <div class="ga-home">
        <div class="ga-container">
            {{-- Destination catalog --}}
            @include($ns . '.sections.destinations', ['mode' => 'preview'])

            {{-- Paket tour + itinerary --}}
            <div class="ga-row3">
                @include($ns . '.sections.packages', ['mode' => 'preview'])
                @include($ns . '.sections.itinerary', ['mode' => 'preview'])
            </div>

            {{-- Jadwal + galeri + booking inquiry (CTA) + testimoni --}}
            <div class="ga-row4">
                @include($ns . '.sections.schedules', ['mode' => 'preview'])
                @include($ns . '.sections.gallery', ['mode' => 'preview'])
                @include($ns . '.sections.inquiry', ['mode' => 'preview'])
                @include($ns . '.sections.testimonials', ['mode' => 'preview'])
            </div>
        </div>

        {{-- AI Chatbot (FAQ destinasi & paket) --}}
        @include($ns . '.sections.ai-banner')
    </div>
@endsection
