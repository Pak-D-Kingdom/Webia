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
                <h3 class="cp-contact__heading">Formulir Penawaran</h3>
                <p class="cp-quote__intro">Ceritakan kebutuhan proyek Anda, kami siap membantu.</p>

                <form class="cp-form" method="POST" action="#" novalidate data-cp-quote-form>
                    @csrf
                    <div class="cp-form__grid">
                        <div class="cp-field cp-field--name">
                            <label class="cp-sr" for="cp-q-name">Nama Lengkap</label>
                            <input class="cp-input" id="cp-q-name" name="name" type="text" placeholder="Nama Lengkap" autocomplete="name" required minlength="2" maxlength="120" aria-describedby="cp-q-name-error">
                            <p class="cp-field__error" id="cp-q-name-error" hidden></p>
                        </div>

                        <div class="cp-field cp-field--email">
                            <label class="cp-sr" for="cp-q-email">Email</label>
                            <input class="cp-input" id="cp-q-email" name="email" type="email" placeholder="Email" autocomplete="email" required maxlength="160" aria-describedby="cp-q-email-error">
                            <p class="cp-field__error" id="cp-q-email-error" hidden></p>
                        </div>

                        <div class="cp-field cp-field--service">
                            <label class="cp-sr" for="cp-q-service">Jenis Layanan</label>
                            <select class="cp-input cp-input--select" id="cp-q-service" name="service" required aria-describedby="cp-q-service-error">
                                <option value="" selected disabled>Jenis Layanan</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service['title'] }}">{{ $service['title'] }}</option>
                                @endforeach
                            </select>
                            <p class="cp-field__error" id="cp-q-service-error" hidden></p>
                        </div>

                        <div class="cp-field cp-field--message">
                            <label class="cp-sr" for="cp-q-message">Pesan / Detail Kebutuhan</label>
                            <textarea class="cp-input cp-input--area" id="cp-q-message" name="message" rows="4" placeholder="Pesan / Detail Kebutuhan" required minlength="10" maxlength="2000" aria-describedby="cp-q-message-error"></textarea>
                            <p class="cp-field__error" id="cp-q-message-error" hidden></p>
                        </div>

                        <div class="cp-hp" aria-hidden="true">
                            <label for="cp-q-website">Jangan diisi</label>
                            <input id="cp-q-website" name="website" type="text" tabindex="-1" autocomplete="off">
                        </div>

                        <button class="cp-btn cp-btn--primary cp-form__submit" type="submit">Kirim Permintaan {!! $icon('arrow') !!}</button>
                    </div>
                    <p class="cp-form__status" role="status" aria-live="polite" data-cp-form-status></p>
                </form>
            </div>
        </div>
    </div>
</section>
