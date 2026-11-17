{{-- Parameter: $fid (prefix id unik di halaman) --}}
<div class="bca-formcard">
    <h3>Project inquiry</h3>
    <p class="bca-muted">Ceritakan singkat proyek Anda. Kami membalas dalam satu hari kerja.</p>
    <form class="bca-form" data-bca-form novalidate>
        <div class="bca-form__row bca-form__row--2">
            <div class="bca-field">
                <label for="{{ $fid }}-name">Nama lengkap</label>
                <input class="bca-input" id="{{ $fid }}-name" name="name" type="text" autocomplete="name" required minlength="3" aria-describedby="{{ $fid }}-name-e">
                <span class="bca-error" id="{{ $fid }}-name-e" data-bca-error></span>
            </div>
            <div class="bca-field">
                <label for="{{ $fid }}-email">Email</label>
                <input class="bca-input" id="{{ $fid }}-email" name="email" type="email" autocomplete="email" required aria-describedby="{{ $fid }}-email-e">
                <span class="bca-error" id="{{ $fid }}-email-e" data-bca-error></span>
            </div>
        </div>
        <div class="bca-form__row bca-form__row--2">
            <div class="bca-field">
                <label for="{{ $fid }}-phone">WhatsApp <small>(opsional)</small></label>
                <input class="bca-input" id="{{ $fid }}-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" pattern="[0-9+\s\-]{8,18}" aria-describedby="{{ $fid }}-phone-e">
                <span class="bca-error" id="{{ $fid }}-phone-e" data-bca-error></span>
            </div>
            <div class="bca-field">
                <label for="{{ $fid }}-company">Brand / perusahaan <small>(opsional)</small></label>
                <input class="bca-input" id="{{ $fid }}-company" name="company" type="text" autocomplete="organization">
                <span class="bca-error"></span>
            </div>
        </div>
        <div class="bca-form__row bca-form__row--2">
            <div class="bca-field">
                <label for="{{ $fid }}-service">Layanan yang dibutuhkan</label>
                <select class="bca-input" id="{{ $fid }}-service" name="service" required aria-describedby="{{ $fid }}-service-e">
                    <option value="">Pilih layanan</option>
                    @foreach($site['form']['services'] as $o)
                        <option value="{{ $o }}">{{ $o }}</option>
                    @endforeach
                </select>
                <span class="bca-error" id="{{ $fid }}-service-e" data-bca-error></span>
            </div>
            <div class="bca-field">
                <label for="{{ $fid }}-budget">Perkiraan anggaran <small>(opsional)</small></label>
                <select class="bca-input" id="{{ $fid }}-budget" name="budget">
                    <option value="">Pilih rentang</option>
                    @foreach($site['form']['budgets'] as $o)
                        <option value="{{ $o }}">{{ $o }}</option>
                    @endforeach
                </select>
                <span class="bca-error"></span>
            </div>
        </div>
        <div class="bca-field">
            <label for="{{ $fid }}-timeline">Target waktu <small>(opsional)</small></label>
            <select class="bca-input" id="{{ $fid }}-timeline" name="timeline">
                <option value="">Pilih target</option>
                @foreach($site['form']['timelines'] as $o)
                    <option value="{{ $o }}">{{ $o }}</option>
                @endforeach
            </select>
            <span class="bca-error"></span>
        </div>
        <div class="bca-field">
            <label for="{{ $fid }}-message">Ceritakan proyek Anda</label>
            <textarea class="bca-input" id="{{ $fid }}-message" name="message" required minlength="20" placeholder="Apa yang ingin Anda bangun, untuk siapa, dan kapan?" aria-describedby="{{ $fid }}-message-e"></textarea>
            <span class="bca-error" id="{{ $fid }}-message-e" data-bca-error></span>
        </div>
        <div class="bca-field">
            <label class="bca-check" for="{{ $fid }}-consent">
                <input id="{{ $fid }}-consent" name="consent" type="checkbox" required aria-describedby="{{ $fid }}-consent-e">
                <span>Saya setuju data ini digunakan untuk menanggapi pertanyaan proyek saya.</span>
            </label>
            <span class="bca-error" id="{{ $fid }}-consent-e" data-bca-error></span>
        </div>
        <button class="bca-btn bca-btn--cobalt" type="submit">Kirim inquiry @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</button>
        <p class="bca-form__ok" role="status" data-bca-form-ok hidden>Terima kasih! Ini adalah formulir demo statis, jadi data tidak dikirim ke mana pun.</p>
        <p class="bca-form__note">Formulir ini statis dan belum terhubung ke backend.</p>
    </form>
</div>
