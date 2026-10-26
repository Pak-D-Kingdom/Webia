
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Book an Appointment | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">YOUR PERSONAL BEAUTY RITUAL</span>
        <h1>Book an <em>Appointment.</em></h1>
        <p>Share your preferred treatment and visit date with our team.</p>
    </div>
</section>

<section class="section">
    <div class="container booking-layout">
        <div class="booking-intro">
            <span class="eyebrow">LET'S PLAN YOUR VISIT</span>
            <h2>A moment<br>for <em>yourself.</em></h2>
            <p>
                Submit your preferences and our team can confirm
                the availability and appointment details.
            </p>
        </div>

        <form class="form-panel" method="POST"
              action="{{ url('/templates/ruby-luxe/booking') }}">
            @csrf

            <label for="customerName">Full name</label>
            <input id="customerName" name="name" required
                   value="{{ old('name') }}" autocomplete="name">
            @error('name') <p class="form-error">{{ $message }}</p> @enderror

            <label for="customerEmail">Email</label>
            <input id="customerEmail" name="email" type="email"
                   value="{{ old('email') }}" autocomplete="email" required>
            @error('email') <p class="form-error">{{ $message }}</p> @enderror

            <label for="customerPhone">WhatsApp number</label>
            <input id="customerPhone" name="phone" type="tel"
                   value="{{ old('phone') }}" autocomplete="tel" required>
            @error('phone') <p class="form-error">{{ $message }}</p> @enderror

            <label for="treatment">Treatment</label>
            <select id="treatment" name="treatment" required>
                <option value="">Choose a treatment</option>
                @foreach ([
                    'Signature Facial',
                    'Skin Renewal',
                    'Botanical Ritual',
                    'Deep Cleansing Facial',
                    'Personal Skin Consultation',
                    'Hydration Ritual'
                ] as $option)
                    <option value="{{ $option }}"
                        @selected(old('treatment', request('treatment')) === $option)>
                        {{ $option }}
                    </option>
                @endforeach
            </select>

            <label for="appointmentDate">Preferred date</label>
            <input id="appointmentDate" name="date" type="date"
                   min="{{ now()->toDateString() }}" value="{{ old('date') }}" required>

            <label for="appointmentTime">Preferred time</label>
            <select id="appointmentTime" name="time" required>
                <option value="">Choose a time</option>
                @foreach (['09:00','10:00','11:00','13:00','14:00','15:00','16:00'] as $time)
                    <option value="{{ $time }}" @selected(old('time') === $time)>
                        {{ $time }}
                    </option>
                @endforeach
            </select>

            <label for="bookingNote">Additional notes (optional)</label>
            <textarea id="bookingNote" name="notes" rows="4">{{ old('notes') }}</textarea>

            <button class="button button-primary" type="submit">
                Submit Appointment Request ↗
            </button>

            <small>Submitting a request does not guarantee an available slot.</small>
        </form>
    </div>
</section>
@endsection
