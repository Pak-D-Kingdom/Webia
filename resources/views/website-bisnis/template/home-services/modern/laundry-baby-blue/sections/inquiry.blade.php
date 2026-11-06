@php
    $mode = $mode ?? 'preview';
    $uid  = 'iq' . \Illuminate\Support\Str::lower(\Illuminate\Support\Str::random(4));
    $ct   = $laundry['contact'];
    $tel  = preg_replace('/[^0-9+]/', '', $ct['phone']);
    $hr   = $laundry['hours'];
@endphp
@if ($mode === 'preview')
<article class="lb-card lb-contact-card" aria-labelledby="{{ $uid }}-title">
    <header class="lb-card__head">
        <span class="lb-card__icon lb-card__icon--solid"><svg class="lb-i" aria-hidden="true"><use href="#i-chat"/></svg></span>
        <div>
            <h2 class="lb-card__title" id="{{ $uid }}-title"><a href="{{ route('webia.laundry-baby-blue.order-inquiry') }}">Order Inquiry</a></h2>
            <p class="lb-card__sub">Hubungi kami untuk informasi &amp; pemesanan.</p>
        </div>
    </header>
    <div class="lb-contact__body">
        <ul class="lb-contact">
            <li><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span class="lb-contact__k">WhatsApp</span><a class="lb-contact__v" href="https://wa.me/{{ $ct['whatsapp'] }}" target="_blank" rel="noopener">{{ $ct['whatsapp_display'] }}</a></li>
            <li><svg class="lb-i" aria-hidden="true"><use href="#i-phone"/></svg><span class="lb-contact__k">Telepon</span><a class="lb-contact__v" href="tel:{{ $tel }}">{{ $ct['phone'] }}</a></li>
            <li><svg class="lb-i" aria-hidden="true"><use href="#i-mail"/></svg><span class="lb-contact__k">Email</span><a class="lb-contact__v" href="mailto:{{ $ct['email'] }}">{{ $ct['email'] }}</a></li>
        </ul>
        <a class="lb-btn lb-btn--primary lb-contact__btn" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}">Hubungi Kami <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
</article>
@else
<section class="lb-section" aria-label="Formulir order inquiry">
    <div class="lb-container lb-oi">
        <article class="lb-card lb-card--lg lb-oi__form" aria-labelledby="{{ $uid }}-title">
            <header class="lb-card__head">
                <span class="lb-card__icon lb-card__icon--solid"><svg class="lb-i" aria-hidden="true"><use href="#i-chat"/></svg></span>
                <div><h2 class="lb-card__title" id="{{ $uid }}-title">Kirim Inquiry</h2><p class="lb-card__sub">Isi data singkat, lalu lanjutkan ke WhatsApp.</p></div>
            </header>

            <form class="lb-form lb-form--full" data-lb-inquiry novalidate>
                <fieldset class="lb-oi__group">
                    <legend><span class="lb-oi__num" aria-hidden="true">1</span>Data Anda</legend>
                    <div class="lb-form__grid">
                        <div class="lb-form__cell">
                            <label class="lb-label__t" for="{{ $uid }}-nama">Nama Lengkap <abbr class="lb-req" title="wajib diisi">*</abbr></label>
                            <div class="lb-field"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-user"/></svg>
                                <input id="{{ $uid }}-nama" name="nama" type="text" placeholder="Contoh: Budi Santoso" autocomplete="name" maxlength="80" required></div>
                            <small class="lb-field__err" data-err-for="nama" hidden></small>
                        </div>
                        <div class="lb-form__cell">
                            <label class="lb-label__t" for="{{ $uid }}-wa">No. WhatsApp <abbr class="lb-req" title="wajib diisi">*</abbr></label>
                            <div class="lb-field"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                                <input id="{{ $uid }}-wa" name="wa" type="tel" inputmode="tel" placeholder="Contoh: 0812 3456 7890" autocomplete="tel" maxlength="20" required></div>
                            <small class="lb-field__err" data-err-for="wa" hidden></small>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="lb-oi__group">
                    <legend><span class="lb-oi__num" aria-hidden="true">2</span>Pilih Layanan</legend>
                    <div class="lb-oi__quick" role="group" aria-label="Pilihan cepat layanan">
                        @foreach ($laundry['inquiry_quick'] as $q)
                            <button type="button" class="lb-chip" data-lb-pick="{{ $q }}" aria-pressed="false">{{ $q }}</button>
                        @endforeach
                    </div>
                    <div class="lb-form__cell">
                        <label class="lb-label__t" for="{{ $uid }}-layanan">Jenis layanan <abbr class="lb-req" title="wajib diisi">*</abbr></label>
                        <div class="lb-field lb-field--select"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-tag"/></svg>
                            <select id="{{ $uid }}-layanan" name="layanan" required>
                                <option value="">Pilih Layanan</option>
                                @foreach ($laundry['inquiry_services'] as $opt)<option value="{{ $opt }}">{{ $opt }}</option>@endforeach
                            </select><svg class="lb-i lb-field__chev" aria-hidden="true"><use href="#i-chevron"/></svg></div>
                        <small class="lb-field__err" data-err-for="layanan" hidden></small>
                    </div>
                </fieldset>

                <fieldset class="lb-oi__group">
                    <legend><span class="lb-oi__num" aria-hidden="true">3</span>Penjemputan <small>(opsional)</small></legend>
                    <div class="lb-form__grid">
                        <div class="lb-form__cell">
                            <label class="lb-label__t" for="{{ $uid }}-area">Area</label>
                            <div class="lb-field lb-field--select"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-pin"/></svg>
                                <select id="{{ $uid }}-area" name="area">
                                    <option value="">Pilih area di Surabaya</option>
                                    @foreach ($laundry['areas'] as $a)<option value="{{ $a['name'] }}">{{ $a['name'] }}</option>@endforeach
                                </select><svg class="lb-i lb-field__chev" aria-hidden="true"><use href="#i-chevron"/></svg></div>
                        </div>
                        <div class="lb-form__cell">
                            <label class="lb-label__t" for="{{ $uid }}-tgl">Jadwal jemput</label>
                            <div class="lb-field lb-field--dt"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-calendar"/></svg>
                                <input id="{{ $uid }}-tgl" name="jadwal" type="datetime-local" data-placeholder="Pilih tanggal &amp; jam"></div>
                        </div>
                        <div class="lb-form__cell lb-form__cell--full">
                            <label class="lb-label__t" for="{{ $uid }}-alamat">Alamat penjemputan</label>
                            <div class="lb-field"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-truck"/></svg>
                                <input id="{{ $uid }}-alamat" name="alamat" type="text" placeholder="Nama jalan, nomor rumah, patokan" autocomplete="street-address" maxlength="160"></div>
                        </div>
                        <div class="lb-form__cell lb-form__cell--full">
                            <label class="lb-label__t" for="{{ $uid }}-catatan">Catatan</label>
                            <div class="lb-field lb-field--area">
                                <textarea id="{{ $uid }}-catatan" name="catatan" rows="3" placeholder="Jumlah kg/pcs, bahan khusus, noda tertentu, dll." maxlength="300"></textarea></div>
                        </div>
                    </div>
                </fieldset>

                <button class="lb-btn lb-btn--primary lb-btn--lg lb-btn--block" type="submit"><span>Kirim Inquiry via WhatsApp</span><svg class="lb-i" aria-hidden="true"><use href="#i-send"/></svg></button>
                <p class="lb-form__note" data-lb-form-msg role="status" aria-live="polite" hidden></p>
                <p class="lb-form__hint">Inquiry dibuka di WhatsApp BlueLaundry agar tim kami dapat langsung mengonfirmasi order Anda.</p>
            </form>
        </article>

        <aside class="lb-oi__side" aria-label="Kontak dan alur">
            <article class="lb-card lb-card--lg lb-contact-card lb-oi__contact">
                <header class="lb-card__head">
                    <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-phone"/></svg></span>
                    <div><h2 class="lb-card__title">Hubungi Langsung</h2><p class="lb-card__sub">Lebih cepat lewat WhatsApp.</p></div>
                </header>
                <ul class="lb-contact">
                    <li><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span class="lb-contact__k">WhatsApp</span><a class="lb-contact__v" href="https://wa.me/{{ $ct['whatsapp'] }}" target="_blank" rel="noopener">{{ $ct['whatsapp_display'] }}</a></li>
                    <li><svg class="lb-i" aria-hidden="true"><use href="#i-phone"/></svg><span class="lb-contact__k">Telepon</span><a class="lb-contact__v" href="tel:{{ $tel }}">{{ $ct['phone'] }}</a></li>
                    <li><svg class="lb-i" aria-hidden="true"><use href="#i-mail"/></svg><span class="lb-contact__k">Email</span><a class="lb-contact__v" href="mailto:{{ $ct['email'] }}">{{ $ct['email'] }}</a></li>
                    <li><svg class="lb-i" aria-hidden="true"><use href="#i-clock"/></svg><span class="lb-contact__k">Jam buka</span><span class="lb-contact__v">{{ $hr['range'] }}, {{ $hr['time'] }}</span></li>
                </ul>
                <a class="lb-btn lb-btn--outline lb-btn--block" href="https://wa.me/{{ $ct['whatsapp'] }}?text={{ rawurlencode($ct['wa_greeting']) }}" target="_blank" rel="noopener"><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>Chat WhatsApp</a>
            </article>

            <article class="lb-card lb-card--lg lb-oi__next">
                <h2 class="lb-card__title">Setelah inquiry dikirim</h2>
                <ol>
                    @foreach ($laundry['inquiry_next'] as $n)
                        <li>
                            <span class="lb-step__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $n['icon'] }}"/></svg></span>
                            <div><h3>{{ $n['title'] }}</h3><p>{{ $n['text'] }}</p></div>
                        </li>
                    @endforeach
                </ol>
            </article>
        </aside>
    </div>
</section>
@endif
