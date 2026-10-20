{{-- ---------- BOOKING / VIEWING ---------- --}}
<section class="rea-booking" id="booking" aria-labelledby="booking-title">
    <div class="rea-booking__media">
        <img src="{{ $img('booking-living.jpg') }}" alt="Living room available for private viewing" loading="lazy">
    </div>
    <div class="rea-booking__intro">
        <p class="rea-eyebrow">BOOKING &amp; VIEWING</p>
        <h2 id="booking-title">Schedule a Private Viewing</h2>
        <p>See the property in person and experience its true beauty.</p>
    </div>
    <form class="rea-booking__form" method="post" action="#" novalidate data-form="booking" data-endpoint="">
        @csrf
        <input type="hidden" name="property" value="{{ $property['place_name'] }}">
        <div class="rea-field rea-field--icon">
            <label class="rea-sr" for="booking-date">Select date</label>
            {{ $icon('calendar') }}
            <input id="booking-date" type="date" name="date" required data-min-today aria-describedby="booking-date-error">
            <p class="rea-field__error" id="booking-date-error" role="alert"></p>
        </div>
        <div class="rea-field rea-field--icon">
            <label class="rea-sr" for="booking-time">Select time</label>
            {{ $icon('clock') }}
            <select id="booking-time" name="time" required aria-describedby="booking-time-error">
                <option value="" selected disabled>Select Time</option>
                @foreach ($timeSlots as $slot)
                    <option value="{{ $slot }}">{{ $slot }}</option>
                @endforeach
            </select>
            <p class="rea-field__error" id="booking-time-error" role="alert"></p>
        </div>
        <button class="rea-btn rea-btn--gold" type="submit">Book a Viewing {{ $icon('arrow') }}</button>
        <p class="rea-form-status" role="status" data-form-status></p>
    </form>
</section>
