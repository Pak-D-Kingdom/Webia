{{-- KONTAK + QUOTATION LEAD --}}
<section class="cp-contact" id="kontak" aria-labelledby="cp-contact-title">
    <div class="cp-container">
        <div class="cp-contact__panel">
            <svg class="cp-contact__leaf" width="240" height="340" aria-hidden="true" focusable="false"><use href="#cp-branch"></use></svg>

            <figure class="cp-contact__media">
                <img src="{{ $img('cta.jpg') }}" alt="Laptop, kopi, dan buku catatan di meja kerja" width="564" height="417" loading="lazy">
            </figure>

            <div class="cp-contact__cta">
                <h2 class="cp-contact__title" id="cp-contact-title">Siap Memulai Proyek Anda?</h2>
                <p class="cp-contact__text">Dapatkan penawaran terbaik untuk kebutuhan bisnis Anda.</p>
                <a class="cp-btn cp-btn--primary" href="#penawaran" data-cp-focus-quote>Minta Penawaran Sekarang {!! $icon('arrow') !!}</a>
            </div>

            <div class="cp-contact__info">
                <h3 class="cp-contact__heading">Kontak Kami</h3>
                <ul class="cp-contact__list">
                    <li>{!! $icon('phone') !!}<a href="tel:{{ $company['phone_href'] }}">{{ $company['phone'] }}</a></li>
                    <li>{!! $icon('mail') !!}<a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a></li>
                    <li>{!! $icon('pin') !!}<span>{{ $company['address'] }}</span></li>
                </ul>
            </div>

            <div class="cp-quote" id="penawaran">
                <div class="cp-quote__card">
                    <header class="cp-quote__head">
                        <span class="cp-quote__badge">{!! $icon('message') !!}</span>
                        <div>
                            <h3 class="cp-quote__title">{{ $quote['title'] ?? 'Formulir Penawaran' }}</h3>
                            <p class="cp-quote__intro">{{ $quote['intro'] ?? '' }}</p>
                        </div>
                    </header>

<<<<<<< HEAD
                    <form class="cp-form" action="{{ $waBase }}" method="GET" novalidate data-cp-quote-form data-cp-wa="{{ $waBase }}" data-cp-wa-greeting="{{ $quote['wa_greeting'] ?? '' }}">
=======
                    <form class="cp-form" method="POST" action="#" novalidate data-cp-quote-form>
                        @csrf
>>>>>>> webia/nabiila-fe
                        <div class="cp-form__grid">
                            <div class="cp-field">
                                <label class="cp-label" for="cp-q-name">Nama Lengkap <span aria-hidden="true">*</span></label>
                                <div class="cp-input-wrap">
                                    {!! $icon('user') !!}
                                    <input class="cp-input" id="cp-q-name" name="name" type="text" placeholder="Contoh: Budi Santoso" autocomplete="name" required minlength="2" maxlength="120" aria-describedby="cp-q-name-error">
                                </div>
                                <p class="cp-field__error" id="cp-q-name-error" hidden></p>
                            </div>

                            <div class="cp-field">
                                <label class="cp-label" for="cp-q-email">Email <span aria-hidden="true">*</span></label>
                                <div class="cp-input-wrap">
                                    {!! $icon('mail') !!}
                                    <input class="cp-input" id="cp-q-email" name="email" type="email" placeholder="nama@perusahaan.com" autocomplete="email" required maxlength="160" aria-describedby="cp-q-email-error">
                                </div>
                                <p class="cp-field__error" id="cp-q-email-error" hidden></p>
                            </div>

                            <fieldset class="cp-field cp-field--wide cp-choices" id="cp-q-service" aria-describedby="cp-q-service-error">
                                <legend class="cp-label">Jenis Layanan <span aria-hidden="true">*</span></legend>
                                <div class="cp-choices__list">
                                    @foreach ($services as $service)
                                        <label class="cp-choice">
                                            <input type="radio" name="service" value="{{ $service['title'] }}" required>
                                            <span>{!! $icon('check') !!}{{ $service['title'] }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                <p class="cp-field__error" id="cp-q-service-error" hidden></p>
                            </fieldset>

                            <div class="cp-field cp-field--wide">
                                <div class="cp-label-row">
                                    <label class="cp-label" for="cp-q-message">Pesan / Detail Kebutuhan <span aria-hidden="true">*</span></label>
                                    <span class="cp-counter" aria-hidden="true" data-cp-counter>0/2000</span>
                                </div>
                                <textarea class="cp-input cp-input--area" id="cp-q-message" name="message" rows="4" placeholder="Jelaskan tujuan, target waktu, dan gambaran proyek Anda..." required minlength="10" maxlength="2000" aria-describedby="cp-q-message-error"></textarea>
                                <p class="cp-field__error" id="cp-q-message-error" hidden></p>
                            </div>

                            <div class="cp-hp" aria-hidden="true">
                                <label for="cp-q-website">Jangan diisi</label>
                                <input id="cp-q-website" name="website" type="text" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="cp-form__foot cp-field--wide">
<<<<<<< HEAD
                                <button class="cp-btn cp-btn--primary cp-form__submit" type="submit"><span class="cp-form__submit-text">{{ $quote['submit'] ?? 'Kirim via WhatsApp' }}</span> {!! $icon('whatsapp') !!}</button>
=======
                                <button class="cp-btn cp-btn--primary cp-form__submit" type="submit"><span class="cp-form__submit-text">Kirim Permintaan</span> {!! $icon('send') !!}</button>
>>>>>>> webia/nabiila-fe
                                <ul class="cp-form__assure">
                                    <li>{!! $icon('clock') !!}<span>{{ $quote['note'] ?? '' }}</span></li>
                                    <li>{!! $icon('shield') !!}<span>{{ $quote['privacy'] ?? '' }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <p class="cp-form__status" role="status" aria-live="polite" data-cp-form-status></p>
                    </form>

                    <div class="cp-quote__success" data-cp-quote-success tabindex="-1" hidden>
                        <span class="cp-quote__check">{!! $icon('check') !!}</span>
                        <h3 class="cp-quote__title">{{ $quote['success_title'] ?? 'Permintaan terkirim' }}</h3>
                        <p>{{ $quote['success_text'] ?? '' }}</p>
<<<<<<< HEAD
                        <div class="cp-quote__actions">
                            <a class="cp-btn cp-btn--primary cp-btn--sm" href="{{ $waBase }}" target="_blank" rel="noopener noreferrer" data-cp-wa-reopen>Buka WhatsApp lagi</a>
                            <button class="cp-btn cp-btn--outline cp-btn--sm" type="button" data-cp-quote-reset>Kirim pesan lain</button>
                        </div>
=======
                        <button class="cp-btn cp-btn--outline cp-btn--sm" type="button" data-cp-quote-reset>Kirim permintaan lain</button>
>>>>>>> webia/nabiila-fe
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
