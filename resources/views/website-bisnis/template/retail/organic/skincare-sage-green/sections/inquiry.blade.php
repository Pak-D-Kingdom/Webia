{{--
    Inquiry.
    $full = false → CTA di beranda: TIDAK ada form, hanya mengarahkan ke halaman Inquiry & Konsultasi.
    $full = true  → halaman Inquiry & Konsultasi: form lengkap, dikirim ke WhatsApp.
--}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $full ??= false;
@endphp
@if(! $full)
    <section class="container section inq" id="inquiry" aria-labelledby="inq-title">
        <div class="inq-hero">
            <svg class="deco deco--inq-a" aria-hidden="true"><use href="#i-branch"/></svg>
            <svg class="deco deco--inq-b" aria-hidden="true"><use href="#i-branch"/></svg>

            <div class="inq-hero__copy">
                <p class="eyebrow">Inquiry &amp; Konsultasi</p>
                <h2 id="inq-title">Bingung pilih produk yang cocok? Konsultasi gratis dengan kami.</h2>
                <p class="inq-hero__text">Tanyakan produk, harga, stok, pre-order, hingga kerja sama reseller. Isi formulir singkat di halaman Inquiry dan tim kami membalas lewat WhatsApp.</p>

                <ul class="inq-points">
                    <li><svg class="ico" aria-hidden="true"><use href="#i-clock"/></svg>Dibalas cepat · {{ $cfg['whatsapp']['hours'] }}</li>
                    <li><svg class="ico" aria-hidden="true"><use href="#i-leaf"/></svg>Rekomendasi sesuai jenis kulitmu</li>
                    <li><svg class="ico" aria-hidden="true"><use href="#i-tag"/></svg>Penawaran khusus reseller</li>
                </ul>

                <div class="inq-hero__actions">
                    <a class="btn btn--light btn--lg" href="{{ route($cfg['route'] . 'inquiry') }}#form-inquiry">Isi Form Inquiry <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                    <button type="button" class="btn btn--ghost btn--lg" data-ai-open><svg class="ico" aria-hidden="true"><use href="#i-sparkles"/></svg> Tanya AI dulu</button>
                </div>
            </div>

            <div class="inq-hero__topics">
                <h3>Pilih topik pertanyaanmu</h3>
                <ul class="topic-grid">
                    @foreach($cfg['inquiry_types'] as $t)
                        <li>
                            <a class="topic" href="{{ route($cfg['route'] . 'inquiry') }}?jenis={{ rawurlencode($t['label']) }}#form-inquiry">
                                <span class="topic__ico"><svg class="ico" aria-hidden="true"><use href="#i-{{ $t['icon'] }}"/></svg></span>
                                <span class="topic__txt"><strong>{{ $t['label'] }}</strong><small>{{ $t['text'] }}</small></span>
                                <svg class="ico topic__go" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@else
    <section class="container section inquiry inquiry--full" id="inquiry">
        <div class="inquiry__layout">
            <div class="inquiry__info">
                <p class="eyebrow">Inquiry &amp; Konsultasi</p>
                <h2>Ceritakan kebutuhanmu, kami bantu carikan yang terbaik.</h2>
                <p>Tanyakan produk, harga, ketersediaan stok, pre-order, hingga kerja sama reseller. Pesanmu langsung terbuka di WhatsApp tim PureGlow.</p>

                <ol class="flow">
                    <li><span>1</span><div><strong>Isi formulir</strong><p>Pilih topik dan tulis pertanyaanmu.</p></div></li>
                    <li><span>2</span><div><strong>Kirim via WhatsApp</strong><p>Pesan terisi otomatis, tinggal tekan kirim.</p></div></li>
                    <li><span>3</span><div><strong>Dapat balasan</strong><p>Tim kami membalas pada jam layanan.</p></div></li>
                </ol>

                <ul class="contact-cards">
                    <li>
                        <span class="contact-cards__ico"><svg class="ico"><use href="#i-whatsapp"/></svg></span>
                        <div><strong>WhatsApp</strong><a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}" target="_blank" rel="noopener noreferrer">{{ $cfg['whatsapp']['display'] }}</a></div>
                    </li>
                    <li>
                        <span class="contact-cards__ico"><svg class="ico"><use href="#i-clock"/></svg></span>
                        <div><strong>Jam Layanan</strong><span>{{ $cfg['whatsapp']['hours'] }}</span></div>
                    </li>
                    <li>
                        <span class="contact-cards__ico"><svg class="ico"><use href="#i-mail"/></svg></span>
                        <div><strong>Email</strong><a href="mailto:{{ $cfg['contact']['email'] }}">{{ $cfg['contact']['email'] }}</a></div>
                    </li>
                    <li>
                        <span class="contact-cards__ico"><svg class="ico"><use href="#i-pin"/></svg></span>
                        <div><strong>Alamat</strong><span>{{ $cfg['contact']['address'] }}</span></div>
                    </li>
                </ul>

                <button type="button" class="btn btn--soft" data-ai-open><svg class="ico"><use href="#i-sparkles"/></svg> Tanya AI Beauty Assistant dulu</button>
            </div>

            <form class="form card-form" id="form-inquiry" data-wa-form data-wa-subject="Halo PureGlow, saya mengirim inquiry lewat website." novalidate>
                <div class="card-form__head">
                    <span class="card-form__ico"><svg class="ico"><use href="#i-message"/></svg></span>
                    <div>
                        <h3>Form Inquiry</h3>
                        <p>Terkirim langsung ke WhatsApp tim kami.</p>
                    </div>
                </div>

                <div class="field">
                    <span class="field__label">Topik Pertanyaan</span>
                    <div class="chips chips--wrap" role="group" aria-label="Pilih topik cepat">
                        @foreach($cfg['inquiry_types'] as $t)
                            <button type="button" class="chip" data-topic="{{ $t['label'] }}">{{ $t['label'] }}</button>
                        @endforeach
                    </div>
                    <select id="inq-jenis" name="jenis" data-label="Topik" required class="sr-only" tabindex="-1" aria-label="Topik pertanyaan">
                        @foreach($cfg['inquiry_types'] as $t)
                            <option value="{{ $t['label'] }}">{{ $t['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="inq-nama">Nama Lengkap</label>
                        <input id="inq-nama" type="text" name="nama" data-label="Nama" placeholder="Nama kamu" required autocomplete="name">
                    </div>
                    <div class="field">
                        <label for="inq-wa">No. WhatsApp</label>
                        <input id="inq-wa" type="tel" name="whatsapp" data-label="No. WhatsApp" placeholder="08xx xxxx xxxx" required inputmode="tel" autocomplete="tel">
                    </div>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="inq-email">Email <span class="muted">(opsional)</span></label>
                        <input id="inq-email" type="email" name="email" data-label="Email" placeholder="nama@email.com" autocomplete="email">
                    </div>
                    <div class="field">
                        <label for="inq-produk">Produk yang Diminati</label>
                        <select id="inq-produk" name="produk" data-label="Produk" data-product-select>
                            <option value="">Belum menentukan</option>
                            @foreach($cfg['products'] as $p)
                                <option value="{{ $p['name'] }}">{{ $p['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="inq-pesan">Pesan</label>
                    <textarea id="inq-pesan" name="pesan" data-label="Pesan" rows="5" placeholder="Tulis pertanyaan atau kebutuhanmu..." required></textarea>
                </div>

                <p class="form-error" data-form-error hidden></p>
                <button type="submit" class="btn btn--primary btn--block btn--lg"><svg class="ico"><use href="#i-whatsapp"/></svg> Kirim via WhatsApp</button>
                <p class="form-hint"><svg class="ico"><use href="#i-shield-check"/></svg> Datamu hanya dipakai untuk membalas inquiry ini.</p>
            </form>
        </div>
    </section>
@endif
