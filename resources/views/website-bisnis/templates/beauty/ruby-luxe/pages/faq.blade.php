
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'FAQs | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">HELPFUL INFORMATION</span>
        <h1>Frequently <em>asked.</em></h1>
        <p>Answers to common questions before your visit.</p>
    </div>
</section>

<section class="section">
    <div class="container faq-container">
        @foreach ([
            ['How do I choose a treatment?','Start with a consultation so the team can discuss your skin needs and suitable options.'],
            ['Do I need an appointment?','We recommend booking ahead. Availability must be confirmed by the clinic.'],
            ['Are the products organic?','Check each product page for its ingredient list, claims, and product documentation.'],
            ['How can I find treatment prices?','Contact the clinic or consult the relevant treatment detail page for current pricing.'],
            ['Can I reschedule my booking?','Contact the clinic to check its rescheduling policy and appointment availability.'],
            ['Can I order products online?','Online ordering will be available once checkout, inventory, and payment integration are configured.'],
        ] as $faq)
            <details class="faq-item">
                <summary>{{ $faq[0] }}</summary>
                <p>{{ $faq[1] }}</p>
            </details>
        @endforeach
    </div>
</section>
@endsection
