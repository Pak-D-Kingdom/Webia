{{-- Parameter: $fid (prefix id unik di halaman). Form statis: hasilnya dikirim ke WhatsApp studio lewat tautan wa.me. --}}
<div class="bca-formcard">
    <div class="bca-formcard__head">
        <div>
            <h3>Project inquiry</h3>
            <p class="bca-muted">Isi singkat, lalu lanjutkan lewat WhatsApp ke {{ $site['whatsapp']['display'] }}.</p>
        </div>
        <div class="bca-meter" aria-hidden="true"><span data-bca-meter-label>0 dari 5 terisi</span><i><b data-bca-meter-bar></b></i></div>
    </div>
    <form class="bca-form" data-bca-form novalidate data-bca-wa="{{ $site['whatsapp']['number'] }}" data-bca-wa-intro="{{ $site['whatsapp']['form_intro'] }}">
        <div class="bca-form__row bca-form__row--2">
            <div class="bca-field">
                <label for="{{ $fid }}-name">Nama lengkap</label>
                <span class="bca-inp">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'users'])<input class="bca-input" id="{{ $fid }}-name" name="name" type="text" autocomplete="name" required minlength="3" placeholder="Nama Anda" aria-describedby="{{ $fid }}-name-e"></span>
                <span class="bca-error" id="{{ $fid }}-name-e" data-bca-error></span>
            </div>
            <div class="bca-field">
                <label for="{{ $fid }}-email">Email</label>
                <span class="bca-inp">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'mail'])<input class="bca-input" id="{{ $fid }}-email" name="email" type="email" autocomplete="email" required placeholder="nama@email.com" aria-describedby="{{ $fid }}-email-e"></span>
                <span class="bca-error" id="{{ $fid }}-email-e" data-bca-error></span>
            </div>
        </div>
        <div class="bca-form__row bca-form__row--2">
            <div class="bca-field">
                <label for="{{ $fid }}-phone">WhatsApp <small>(opsional)</small></label>
                <span class="bca-inp">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'phone'])<input class="bca-input" id="{{ $fid }}-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="+62 8xx-xxxx-xxxx" aria-describedby="{{ $fid }}-phone-e"></span>
                <span class="bca-error" id="{{ $fid }}-phone-e" data-bca-error></span>
            </div>
            <div class="bca-field">
                <label for="{{ $fid }}-company">Brand / perusahaan <small>(opsional)</small></label>
                <span class="bca-inp">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'briefcase'])<input class="bca-input" id="{{ $fid }}-company" name="company" type="text" autocomplete="organization" placeholder="Nama brand"></span>
                <span class="bca-error"></span>
            </div>
        </div>

        <fieldset class="bca-field bca-field--group" data-bca-group="Layanan" data-bca-required>
            <legend>Layanan yang dibutuhkan <small>(pilih satu atau lebih)</small></legend>
            <div class="bca-pickrow">
                @foreach($site['form']['services'] as $o)
                    <label class="bca-pick"><input type="checkbox" name="service" value="{{ $o }}"><span>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'tick']){{ $o }}</span></label>
                @endforeach
            </div>
            <span class="bca-error" data-bca-error></span>
        </fieldset>

        <fieldset class="bca-field bca-field--group" data-bca-group="Anggaran">
            <legend>Perkiraan anggaran <small>(opsional)</small></legend>
            <div class="bca-pickrow">
                @foreach($site['form']['budgets'] as $o)
                    <label class="bca-pick bca-pick--radio"><input type="radio" name="{{ $fid }}-budget" value="{{ $o }}"><span>{{ $o }}</span></label>
                @endforeach
            </div>
        </fieldset>

        <fieldset class="bca-field bca-field--group" data-bca-group="Target waktu">
            <legend>Target waktu <small>(opsional)</small></legend>
            <div class="bca-pickrow">
                @foreach($site['form']['timelines'] as $o)
                    <label class="bca-pick bca-pick--radio"><input type="radio" name="{{ $fid }}-timeline" value="{{ $o }}"><span>{{ $o }}</span></label>
                @endforeach
            </div>
        </fieldset>

        <div class="bca-field">
            <label for="{{ $fid }}-message">Ceritakan proyek Anda</label>
            <textarea class="bca-input" id="{{ $fid }}-message" name="message" required minlength="20" maxlength="600" rows="4" placeholder="Apa yang ingin Anda bangun, untuk siapa, dan kapan?" aria-describedby="{{ $fid }}-message-e"></textarea>
            <div class="bca-field__foot"><span class="bca-error" id="{{ $fid }}-message-e" data-bca-error></span><span class="bca-counter"><span data-bca-count-now>0</span>/600</span></div>
        </div>

        <div class="bca-field">
            <label class="bca-check" for="{{ $fid }}-consent">
                <input id="{{ $fid }}-consent" name="consent" type="checkbox" required aria-describedby="{{ $fid }}-consent-e">
                <span>Saya setuju pesan ini dikirim ke WhatsApp {{ $site['name'] }} untuk menanggapi proyek saya.</span>
            </label>
            <span class="bca-error" id="{{ $fid }}-consent-e" data-bca-error></span>
        </div>

        <button class="bca-btn bca-btn--cobalt bca-btn--wide" type="submit">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'whatsapp']) Kirim lewat WhatsApp</button>
        <div class="bca-form__ok" role="status" tabindex="-1" data-bca-form-ok hidden>
            <b>Siap dikirim!</b>
            <p>WhatsApp dibuka di tab baru dengan pesan yang sudah terisi. Jika tidak terbuka, <a data-bca-wa-link href="https://wa.me/{{ $site['whatsapp']['number'] }}" target="_blank" rel="noopener noreferrer">buka WhatsApp di sini</a>.</p>
        </div>
        <p class="bca-form__note">Tidak ada data yang disimpan di situs ini. Pesan baru terkirim setelah Anda menekan “Kirim” di WhatsApp.</p>
    </form>
</div>
