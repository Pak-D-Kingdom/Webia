{{-- ===================== INQUIRY (minimalis & mewah) ===================== --}}
<section class="rea-inquiry" id="inquiry" aria-labelledby="inquiry-title">
    <div class="rea-container">
        <div class="rea-inquiry__panel">
            <div class="rea-inquiry__intro">
                <p class="rea-eyebrow">{{ strtoupper($inquiry['eyebrow']) }}</p>
                <h2 id="inquiry-title">{{ $inquiry['title'] }}</h2>
                <span class="rea-inquiry__rule" aria-hidden="true"></span>
                <p>{{ $inquiry['text'] }}</p>

                <ul class="rea-inquiry__contact">
                    <li>{{ $icon('phone') }}<a href="tel:{{ preg_replace('/[^+\d]/', '', $site['phone']) }}">{{ $site['phone'] }}</a></li>
                    <li>{{ $icon('mail') }}<a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></li>
                    <li>{{ $icon('clock') }}<span>{{ $site['hours'] }}</span></li>
                </ul>
            </div>

            <form class="rea-inquiry__form" method="post" action="#" novalidate data-form="inquiry" data-endpoint="">
                @csrf
                <input type="hidden" name="property" value="{{ $property['place_name'] }}">

                <div class="rea-field rea-field--line">
                    <label for="inq-name">Full Name</label>
                    <input id="inq-name" type="text" name="name" placeholder="Your full name" autocomplete="name" required aria-describedby="inq-name-error">
                    <p class="rea-field__error" id="inq-name-error" role="alert"></p>
                </div>
                <div class="rea-field rea-field--line">
                    <label for="inq-email">Email Address</label>
                    <input id="inq-email" type="email" name="email" placeholder="name@email.com" autocomplete="email" required aria-describedby="inq-email-error">
                    <p class="rea-field__error" id="inq-email-error" role="alert"></p>
                </div>
                <div class="rea-field rea-field--line rea-field--wide">
                    <label for="inq-phone">Phone Number</label>
                    <input id="inq-phone" type="tel" name="phone" placeholder="+62" autocomplete="tel" inputmode="tel" required aria-describedby="inq-phone-error">
                    <p class="rea-field__error" id="inq-phone-error" role="alert"></p>
                </div>
                <div class="rea-field rea-field--line rea-field--wide">
                    <label for="inq-message">Your Message</label>
                    <textarea id="inq-message" name="message" rows="3" placeholder="Tell us how we can help" required aria-describedby="inq-message-error"></textarea>
                    <p class="rea-field__error" id="inq-message-error" role="alert"></p>
                </div>

                <div class="rea-inquiry__submit rea-field--wide">
                    <button class="rea-btn rea-btn--gold rea-btn--lg" type="submit">Send Inquiry {{ $icon('arrow') }}</button>
                    <p class="rea-form-status" role="status" data-form-status></p>
                </div>
            </form>
        </div>
    </div>
</section>
