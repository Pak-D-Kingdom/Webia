
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Contact | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">WE WOULD LOVE TO HEAR FROM YOU</span>
        <h1>Let's <em>connect.</em></h1>
        <p>Ask about treatments, products, or your upcoming visit.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <div class="contact-info">
            <div>
                <span class="card-category">VISIT US</span>
                <h3>Our Location</h3>
                <p>Replace with the clinic's verified address.</p>
            </div>
            <div>
                <span class="card-category">OPENING HOURS</span>
                <h3>When we're here</h3>
                <p>Replace with the actual operating schedule.</p>
            </div>
            <div>
                <span class="card-category">GET IN TOUCH</span>
                <h3>Contact our team</h3>
                <p>Email and WhatsApp details can be configured here.</p>
            </div>
        </div>

        <form class="form-panel" method="POST"
              action="{{ url('/templates/ruby-luxe/contact') }}">
            @csrf
            <label for="contactName">Your name</label>
            <input id="contactName" name="name" required>

            <label for="contactEmail">Email address</label>
            <input id="contactEmail" name="email" type="email" required>

            <label for="contactSubject">Subject</label>
            <input id="contactSubject" name="subject" required>

            <label for="contactMessage">Message</label>
            <textarea id="contactMessage" name="message" rows="5" required></textarea>

            <button type="submit" class="button button-primary">
                Send Message ↗
            </button>
        </form>
    </div>
</section>
@endsection
