
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Our Team | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">MEET YOUR BEAUTY TEAM</span>
        <h1>Care from <em>our people.</em></h1>
        <p>Get to know the people who guide your beauty journey.</p>
    </div>
</section>

<section class="section">
    <div class="container card-grid">
        @foreach ([
            ['Skin Consultant','Consultation & skincare guidance'],
            ['Beauty Therapist','Treatment preparation & guest care'],
            ['Skincare Advisor','Product information & routine guidance'],
        ] as $person)
            <article class="beauty-card">
                <div class="team-placeholder"><span>R.</span></div>
                <div class="card-body">
                    <span class="card-category">RUBY LUXE TEAM</span>
                    <h3>{{ $person[0] }}</h3>
                    <p>{{ $person[1] }}</p>
                    <p class="disclaimer">
                        Replace this sample profile with the real team member's
                        name, photograph, and verified qualifications.
                    </p>
                </div>
            </article>
        @endforeach
    </div>
</section>
@endsection
