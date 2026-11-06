@php $q = $z['quotation']; @endphp
<dialog class="ot-modal" id="ot-quote" aria-labelledby="ot-quote-title">
    <div class="ot-modal__box">
        <button class="ot-icon-btn ot-modal__close" type="button" data-close aria-label="Tutup"><svg class="ot-ic" aria-hidden="true"><use href="#i-close"/></svg></button>
        <h2 id="ot-quote-title">{{ $q['title'] }}</h2>
        <p class="ot-modal__lead">{{ $q['text'] }}</p>

        <form class="ot-form" method="POST" action="{{ $q['action'] ?? '#' }}" data-quote-form data-wa-intro="{{ $q['wa_intro'] }}" novalidate>
            @csrf
            <div class="ot-form__grid">
                <label class="ot-field">
                    <span>Nama lengkap</span>
                    <input type="text" name="name" autocomplete="name" required>
                    <em data-error-for="name"></em>
                </label>
                <label class="ot-field">
                    <span>Perusahaan</span>
                    <input type="text" name="company" autocomplete="organization">
                </label>
                <label class="ot-field">
                    <span>Email</span>
                    <input type="email" name="email" autocomplete="email" required>
                    <em data-error-for="email"></em>
                </label>
                <label class="ot-field">
                    <span>No. WhatsApp / Telepon</span>
                    <input type="tel" name="phone" autocomplete="tel" inputmode="tel" required>
                    <em data-error-for="phone"></em>
                </label>
                <label class="ot-field ot-field--full">
                    <span>Layanan yang dibutuhkan</span>
                    <select name="service" required>
                        <option value="">Pilih layanan</option>
                        @foreach ($z['services']['items'] as $s)
                            <option value="{{ $s['title'] }}">{{ $s['title'] }}</option>
                        @endforeach
                    </select>
                    <em data-error-for="service"></em>
                </label>
                <label class="ot-field ot-field--full">
                    <span>Kebutuhan proyek</span>
                    <textarea name="message" rows="4"></textarea>
                </label>
            </div>
            <p class="ot-form__status" role="status" aria-live="polite" data-form-status
               data-success="{{ $q['success'] }}" data-error="{{ $q['error'] }}"></p>
            <button class="ot-btn ot-btn--primary ot-btn--block" type="submit">
                <svg class="ot-ic" aria-hidden="true"><use href="#i-whatsapp"/></svg>{{ $q['submit'] }}
            </button>
        </form>
    </div>
</dialog>
