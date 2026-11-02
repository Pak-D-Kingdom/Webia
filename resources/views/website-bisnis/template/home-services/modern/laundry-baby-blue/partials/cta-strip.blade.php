<section class="lb-cta" aria-label="Ajakan order">
    <div class="lb-container">
        <div class="lb-cta__box">
            <div>
                <h2>Siap laundry tanpa repot?</h2>
                <p>Jadwalkan penjemputan sekarang, kami antar kembali dalam keadaan bersih dan rapi.</p>
            </div>
            <div class="lb-cta__actions">
                <a class="lb-btn lb-btn--primary" href="{{ $lbRoute('order-inquiry') }}"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg>Order Sekarang</a>
                <a class="lb-btn lb-btn--outline" href="https://wa.me/{{ $contact['whatsapp'] }}?text={{ rawurlencode($contact['wa_greeting']) }}" target="_blank" rel="noopener"><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>Chat WhatsApp</a>
            </div>
        </div>
    </div>
</section>
