<section class="rea-inquiry" id="inquiry" aria-labelledby="inquiry-title">
    <h2 id="inquiry-title">Inquire Now</h2>
    <p>Get more information about this property. Our team is ready to assist you.</p>

    <form method="post" action="#" novalidate data-form="inquiry" data-endpoint="">
        @csrf
        <input type="hidden" name="property" value="{{ $property['place_name'] }}">

        <div class="rea-field rea-field--icon">
            <label class="rea-sr" for="inq-name">Full name</label>
            {{ $icon('user') }}
            <input id="inq-name" type="text" name="name" placeholder="Full Name" autocomplete="name" required aria-describedby="inq-name-error">
            <p class="rea-field__error" id="inq-name-error" role="alert"></p>
        </div>
        <div class="rea-field rea-field--icon">
            <label class="rea-sr" for="inq-email">Email address</label>
            {{ $icon('mail') }}
            <input id="inq-email" type="email" name="email" placeholder="Email Address" autocomplete="email" required aria-describedby="inq-email-error">
            <p class="rea-field__error" id="inq-email-error" role="alert"></p>
        </div>
        <div class="rea-field rea-field--icon rea-field--wide">
            <label class="rea-sr" for="inq-phone">Phone number</label>
            {{ $icon('phone') }}
            <input id="inq-phone" type="tel" name="phone" placeholder="Phone Number" autocomplete="tel" inputmode="tel" required aria-describedby="inq-phone-error">
            <p class="rea-field__error" id="inq-phone-error" role="alert"></p>
        </div>
        <div class="rea-field rea-field--icon rea-field--area rea-field--wide">
            <label class="rea-sr" for="inq-message">Your message</label>
            {{ $icon('pencil') }}
            <textarea id="inq-message" name="message" rows="3" placeholder="Your Message" required aria-describedby="inq-message-error"></textarea>
            <p class="rea-field__error" id="inq-message-error" role="alert"></p>
        </div>

        <button class="rea-btn rea-btn--dark rea-btn--block" type="submit">Send Inquiry {{ $icon('arrow') }}</button>
        <p class="rea-form-status" role="status" data-form-status></p>
    </form>
</section>
