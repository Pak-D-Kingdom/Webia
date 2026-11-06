
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Appointment Request | Ruby Luxe')

@section('content')
<section class="section">
    <div class="container confirmation-panel">
        <span class="confirmation-icon">✓</span>
        <span class="eyebrow">THANK YOU FOR REACHING OUT</span>
        <h1>Your request is <em>received.</em></h1>
        <p>
            Your appointment request has been submitted.
            Please wait for the clinic to confirm your schedule.
        </p>
        <a href="{{ url('/templates/ruby-luxe') }}"
           class="button button-primary">Back to Homepage</a>
    </div>
</section>
@endsection
