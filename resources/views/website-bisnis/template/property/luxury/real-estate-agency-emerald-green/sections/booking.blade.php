{{-- ===================== BOOKING / VIEWING (preview di beranda & halaman Booking) ===================== --}}
@php $isPreview = $preview ?? false; @endphp

@if ($isPreview)
    {{-- Preview: banner cepat. Tanggal & jam dibawa ke halaman Booking lewat query string. --}}
    <section class="rea-section rea-section--tight" id="booking" aria-labelledby="booking-title">
        <div class="rea-container rea-booking-wrap">
            <div class="rea-booking">
                <div class="rea-booking__media">
                    <img src="{{ $img('booking-living.jpg') }}" alt="Living room available for private viewing" loading="lazy">
                </div>
                <div class="rea-booking__intro">
                    <p class="rea-eyebrow">BOOKING &amp; VIEWING</p>
                    <h2 id="booking-title">{{ $pages['booking']['title'] }}</h2>
                    <p>{{ $pages['booking']['subtitle'] }}</p>
                </div>
                <form class="rea-booking__form" method="get" action="{{ $route('booking') }}">
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="quick-date">Select date</label>
                        {{ $icon('calendar') }}
                        <input id="quick-date" type="date" name="date" required data-min-today>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="quick-time">Select time</label>
                        {{ $icon('clock') }}
                        <select id="quick-time" name="time" required>
                            <option value="" selected disabled>Select Time</option>
                            @foreach ($timeSlots as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="rea-btn rea-btn--gold" type="submit">Book a Viewing {{ $icon('arrow') }}</button>
                </form>
            </div>
        </div>
    </section>
@else
    {{-- Halaman Booking: info + form lengkap --}}
    <section class="rea-section rea-section--alt" id="booking" aria-label="{{ $pages['booking']['title'] }}">
        <div class="rea-container rea-bookpage">
            <div class="rea-bookinfo">
                <p class="rea-eyebrow">BOOKING &amp; VIEWING</p>
                <h2>How it works</h2>
                <ol class="rea-steps">
                    <li><span class="rea-steps__num">1</span><div><h3>Choose a date and time</h3><p>Pick a slot that suits you. Viewings are open {{ $site['hours'] }}.</p></div></li>
                    <li><span class="rea-steps__num">2</span><div><h3>Share your details</h3><p>Leave your contact so our team can confirm your visit.</p></div></li>
                    <li><span class="rea-steps__num">3</span><div><h3>Visit the property</h3><p>Enjoy a private, guided tour of {{ $property['place_name'] }}.</p></div></li>
                </ol>
                <ul class="rea-bookinfo__meta">
                    <li>{{ $icon('pin') }}<span>{{ $property['address'] }}</span></li>
                    <li>{{ $icon('phone') }}<a href="tel:{{ preg_replace('/[^+\d]/', '', $site['phone']) }}">{{ $site['phone'] }}</a></li>
                </ul>
            </div>

            <div class="rea-bookform">
                <h2>Request a Viewing</h2>
                <p>Fill in the form and our team will confirm your appointment shortly.</p>

                <form method="post" action="#" novalidate data-form="booking" data-endpoint="">
                    @csrf
                    <input type="hidden" name="property" value="{{ $property['place_name'] }}">

                    <div class="rea-field rea-field--icon rea-field--wide">
                        <label class="rea-sr" for="book-name">Full name</label>
                        {{ $icon('user') }}
                        <input id="book-name" type="text" name="name" placeholder="Full Name" autocomplete="name" required aria-describedby="book-name-error">
                        <p class="rea-field__error" id="book-name-error" role="alert"></p>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="book-email">Email address</label>
                        {{ $icon('mail') }}
                        <input id="book-email" type="email" name="email" placeholder="Email Address" autocomplete="email" required aria-describedby="book-email-error">
                        <p class="rea-field__error" id="book-email-error" role="alert"></p>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="book-phone">Phone number</label>
                        {{ $icon('phone') }}
                        <input id="book-phone" type="tel" name="phone" placeholder="Phone Number" autocomplete="tel" inputmode="tel" required aria-describedby="book-phone-error">
                        <p class="rea-field__error" id="book-phone-error" role="alert"></p>
                    </div>
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

                    <div class="rea-field--wide">
                        <button class="rea-btn rea-btn--dark rea-btn--block" type="submit">Book a Viewing {{ $icon('arrow') }}</button>
                        <p class="rea-form-status" role="status" data-form-status></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endif
