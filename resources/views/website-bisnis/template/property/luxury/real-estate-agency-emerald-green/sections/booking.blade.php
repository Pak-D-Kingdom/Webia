{{-- ===================== BOOKING / VIEWING (preview di beranda & halaman Booking) ===================== --}}
@php $isPreview = $preview ?? false; @endphp

@if ($isPreview)
    {{-- Preview beranda: banner ringkas tanpa pilihan tanggal & jam. Pemilihan dilakukan di halaman Booking. --}}
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
                <div class="rea-booking__cta">
                    <ul class="rea-booking__points">
                        <li>{{ $icon('calendar') }}<span>Private, guided tour</span></li>
                        <li>{{ $icon('clock') }}<span>Open {{ $site['hours'] }}</span></li>
                    </ul>
                    <a class="rea-btn rea-btn--gold" href="{{ $route('booking') }}">Book a Viewing {{ $icon('arrow') }}</a>
                </div>
            </div>
        </div>
    </section>
@else
    {{-- Halaman Booking: info + form lengkap --}}
    <section class="rea-section rea-section--alt" id="booking" aria-label="{{ $pages['booking']['title'] }}">
        <div class="rea-container rea-bookpage">
            <div class="rea-bookinfo">
                <img class="rea-bookinfo__photo" src="{{ $property['gallery'][3]['src'] }}" alt="{{ $property['gallery'][3]['alt'] }}" loading="lazy">
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
                <p>Fill in the form and send it to our team on WhatsApp to confirm your appointment.</p>

                <form method="post" action="#" novalidate data-form="booking" data-endpoint=""
                      data-wa-number="{{ $whatsapp['number'] }}" data-wa-intro="{{ $whatsapp['booking_intro'] }}">
                    @csrf
                    <input type="hidden" name="property" value="{{ $property['title'] }} - {{ $property['place_name'] }}">

                    <div class="rea-field rea-field--icon rea-field--wide">
                        <label class="rea-sr" for="book-name">Full name</label>
                        {{ $icon('user') }}
                        <input id="book-name" data-wa-label="Nama" type="text" name="name" placeholder="Full Name" autocomplete="name" required aria-describedby="book-name-error">
                        <p class="rea-field__error" id="book-name-error" role="alert"></p>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="book-email">Email address</label>
                        {{ $icon('mail') }}
                        <input id="book-email" data-wa-label="Email" type="email" name="email" placeholder="Email Address" autocomplete="email" required aria-describedby="book-email-error">
                        <p class="rea-field__error" id="book-email-error" role="alert"></p>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="book-phone">Phone number</label>
                        {{ $icon('phone') }}
                        <input id="book-phone" data-wa-label="Telepon" type="tel" name="phone" placeholder="Phone Number" autocomplete="tel" inputmode="tel" required aria-describedby="book-phone-error">
                        <p class="rea-field__error" id="book-phone-error" role="alert"></p>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="booking-date">Select date</label>
                        {{ $icon('calendar') }}
                        <input id="booking-date" data-wa-label="Tanggal" type="date" name="date" required data-min-today aria-describedby="booking-date-error">
                        <p class="rea-field__error" id="booking-date-error" role="alert"></p>
                    </div>
                    <div class="rea-field rea-field--icon">
                        <label class="rea-sr" for="booking-time">Select time</label>
                        {{ $icon('clock') }}
                        <select id="booking-time" data-wa-label="Jam" name="time" required aria-describedby="booking-time-error">
                            <option value="" selected disabled>Select Time</option>
                            @foreach ($timeSlots as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                        <p class="rea-field__error" id="booking-time-error" role="alert"></p>
                    </div>

                    <div class="rea-field--wide">
                        <button class="rea-btn rea-btn--dark rea-btn--block" type="submit">Send via WhatsApp {{ $icon('whatsapp', 'rea-icon--fill') }}</button>
                        <p class="rea-form-status" role="status" data-form-status></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endif
