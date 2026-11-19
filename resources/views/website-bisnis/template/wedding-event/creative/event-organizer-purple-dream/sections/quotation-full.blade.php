<section class="eo-sec">
    <div class="eo-container eo-qgrid">
        <form class="eo-form" data-eo-quote novalidate>
            <h2 class="eo-form__title">Ceritakan acara Anda</h2>
            <p class="eo-form__sub">Isi formulir singkat ini. Detail Anda akan dikirim melalui WhatsApp ke tim kami untuk disiapkan penawarannya.</p>

            <div class="eo-form__grid">
                <label class="eo-field" data-eo-field>
                    <span class="eo-field__label">Nama Lengkap <b aria-hidden="true">*</b></span>
                    <input type="text" name="nama" autocomplete="name" placeholder="Nama Anda" data-required="1" maxlength="80">
                    <small class="eo-field__msg" data-eo-msg></small>
                </label>
                <label class="eo-field" data-eo-field>
                    <span class="eo-field__label">Email <b aria-hidden="true">*</b></span>
                    <input type="email" name="email" autocomplete="email" placeholder="nama@email.com" data-required="1" maxlength="120">
                    <small class="eo-field__msg" data-eo-msg></small>
                </label>
                <label class="eo-field" data-eo-field>
                    <span class="eo-field__label">Nomor WhatsApp <b aria-hidden="true">*</b></span>
                    <input type="tel" name="whatsapp" inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx" data-required="1" maxlength="20">
                    <small class="eo-field__msg" data-eo-msg></small>
                </label>
                @include($eo['view'].'partials.select', ['name' => 'jenis', 'label' => 'Jenis Acara', 'placeholder' => 'Pilih jenis acara', 'options' => $eo['quotation']['event_types'], 'required' => true])

                <div class="eo-field" data-eo-field>
                    <span class="eo-field__label" id="eo-lbl-tanggal">Tanggal Acara <b aria-hidden="true">*</b></span>
                    <div class="eo-date" data-eo-date>
                        <input type="hidden" name="tanggal" value="" data-required="1">
                        <button type="button" class="eo-select__btn" aria-haspopup="dialog" aria-expanded="false" aria-labelledby="eo-lbl-tanggal">
                            <svg class="eo-i" aria-hidden="true"><use href="#i-calendar"/></svg>
                            <span class="eo-select__val" data-placeholder="Pilih tanggal">Pilih tanggal</span>
                        </button>
                        <div class="eo-date__pop" role="dialog" aria-label="Pilih tanggal acara" hidden></div>
                    </div>
                    <small class="eo-field__msg" data-eo-msg></small>
                </div>
                @include($eo['view'].'partials.select', ['name' => 'tamu', 'label' => 'Perkiraan Jumlah Tamu', 'placeholder' => 'Pilih jumlah tamu', 'options' => $eo['quotation']['guests'], 'required' => false])
                @include($eo['view'].'partials.select', ['name' => 'anggaran', 'label' => 'Perkiraan Anggaran', 'placeholder' => 'Pilih anggaran', 'options' => $eo['quotation']['budgets'], 'required' => false])
                <label class="eo-field" data-eo-field>
                    <span class="eo-field__label">Kota / Lokasi Acara</span>
                    <input type="text" name="lokasi" autocomplete="address-level2" placeholder="Contoh: Jakarta Selatan" maxlength="80">
                    <small class="eo-field__msg" data-eo-msg></small>
                </label>
                @include($eo['view'].'partials.select', ['name' => 'paket', 'label' => 'Paket yang Diminati', 'placeholder' => 'Pilih paket', 'options' => $eo['quotation']['packages'], 'required' => false, 'wide' => true])
                <label class="eo-field eo-field--wide" data-eo-field>
                    <span class="eo-field__label">Catatan Tambahan</span>
                    <textarea name="catatan" rows="4" placeholder="Ceritakan tema, kebutuhan khusus, atau ide acara Anda" maxlength="600"></textarea>
                    <small class="eo-field__msg" data-eo-msg></small>
                </label>
            </div>

            <p class="eo-form__error" data-eo-form-msg role="alert" aria-live="assertive"></p>
            <button class="eo-btn eo-btn--violet eo-btn--lg" type="submit"><svg class="eo-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>Kirim Permintaan Penawaran</button>
            <p class="eo-form__hint">Formulir ini membuka WhatsApp dengan pesan yang sudah terisi. Anda dapat meninjau pesan sebelum mengirim.</p>
        </form>

        <aside class="eo-qside" data-reveal>
            <h2>Kenapa memilih Eventora?</h2>
            <ul class="eo-qside__list">
                @foreach($eo['quotation']['benefits'] as $benefit)
                <li>
                    <span class="eo-qside__ico"><svg class="eo-i" aria-hidden="true"><use href="#i-check"/></svg></span>
                    <div><strong>{{ $benefit['title'] }}</strong><p>{{ $benefit['text'] }}</p></div>
                </li>
                @endforeach
            </ul>
            <ul class="eo-qside__contact">
                <li><svg class="eo-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>{{ $eo['whatsapp']['display'] }}</li>
                <li><svg class="eo-i" aria-hidden="true"><use href="#i-mail"/></svg>{{ $eo['contact']['email'] }}</li>
                <li><svg class="eo-i" aria-hidden="true"><use href="#i-calendar"/></svg>{{ $eo['contact']['hours'] }}</li>
                <li><svg class="eo-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $eo['contact']['location'] }}</li>
            </ul>
            <img class="eo-qside__gift" src="{{ asset($eo['assets']['img']) }}/quotation-gift.svg" alt="" width="190" height="168" loading="lazy">
        </aside>
    </div>
</section>
