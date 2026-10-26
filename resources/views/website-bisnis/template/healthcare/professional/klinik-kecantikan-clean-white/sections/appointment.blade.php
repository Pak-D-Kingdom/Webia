{{--
    Appointment
    $full = false → preview beranda (ajakan + form mini yang melanjutkan ke halaman Appointment)
    $full = true  → halaman Appointment (form lengkap → dikirim ke WhatsApp admin via JS)
--}}
@php
    $full = $full ?? false;
    $min  = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d');
@endphp

@if (! $full)
    <section class="gl-section gl-appt" id="appointment" aria-labelledby="gl-appt-title">
        <div class="gl-container">
            <div class="gl-appt__box">
                <div class="gl-appt__copy">
                    <p class="gl-eyebrow">Appointment</p>
                    <h2 class="gl-title" id="gl-appt-title">Jadwalkan Konsultasi Anda</h2>
                    <p class="gl-lead">Booking online dalam hitungan menit, lalu tim kami mengonfirmasi jadwal Anda.</p>
                    <ul class="gl-checklist">
                        @foreach ($clinic['appointment']['benefits'] as $b)
                            <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-check"/></svg>{{ $b }}</li>
                        @endforeach
                    </ul>
                </div>

                <form class="gl-appt__mini" data-gl-wa-mini action="https://wa.me/{{ $clinic['contact']['whatsapp'] }}" method="get" target="_blank" novalidate>
                    <div class="gl-field">
                        <label for="gl-mini-nama">Nama lengkap</label>
                        <input id="gl-mini-nama" type="text" name="nama" placeholder="Nama Anda" autocomplete="name" required>
                        <p class="gl-field__error" data-error-for="nama" role="alert"></p>
                    </div>
                    <div class="gl-field">
                        <label for="gl-mini-layanan">Layanan</label>
                        <select id="gl-mini-layanan" name="layanan" required>
                            <option value="">Pilih layanan</option>
                            @foreach ($clinic['services'] as $s)
                                <option value="{{ $s['slug'] }}">{{ $s['name'] }}</option>
                            @endforeach
                        </select>
                        <p class="gl-field__error" data-error-for="layanan" role="alert"></p>
                    </div>
                    <div class="gl-field">
                        <label for="gl-mini-tanggal">Tanggal</label>
                        <input id="gl-mini-tanggal" type="date" name="tanggal" min="{{ $min }}" required>
                        <p class="gl-field__error" data-error-for="tanggal" role="alert"></p>
                    </div>
                    <button type="submit" class="gl-btn gl-btn--primary gl-btn--block">
                        <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-whatsapp"/></svg>
                        Booking Sekarang via WhatsApp
                    </button>
                    <p class="gl-form__status" data-gl-form-status role="status" hidden></p>
                </form>
            </div>
        </div>
    </section>
@else
    <section class="gl-section gl-appt gl-appt--full" aria-label="Formulir appointment">
        <div class="gl-container gl-appt__layout">
            <form class="gl-card gl-form" data-gl-appt-form action="https://wa.me/{{ $clinic['contact']['whatsapp'] }}" method="get" target="_blank" novalidate>
                <h2 class="gl-card__title">Formulir Booking</h2>
                <p class="gl-card__text">Isi data berikut. Setelah dikirim, Anda diarahkan ke WhatsApp admin klinik untuk konfirmasi.</p>

                <div class="gl-form__grid">
                    <div class="gl-field">
                        <label for="gl-f-nama">Nama lengkap <abbr title="wajib">*</abbr></label>
                        <input id="gl-f-nama" type="text" name="nama" value="{{ request('nama') }}" autocomplete="name" required data-label="Nama lengkap">
                        <p class="gl-field__error" data-error-for="nama" role="alert"></p>
                    </div>
                    <div class="gl-field">
                        <label for="gl-f-wa">No. WhatsApp <abbr title="wajib">*</abbr></label>
                        <input id="gl-f-wa" type="tel" name="whatsapp" inputmode="tel" placeholder="08xxxxxxxxxx" autocomplete="tel" required data-label="No. WhatsApp">
                        <p class="gl-field__error" data-error-for="whatsapp" role="alert"></p>
                    </div>
                    <div class="gl-field gl-field--wide">
                        <label for="gl-f-email">Email <span class="gl-field__opt">(opsional)</span></label>
                        <input id="gl-f-email" type="email" name="email" autocomplete="email">
                        <p class="gl-field__error" data-error-for="email" role="alert"></p>
                    </div>
                    <div class="gl-field">
                        <label for="gl-f-layanan">Layanan <abbr title="wajib">*</abbr></label>
                        <select id="gl-f-layanan" name="layanan" required data-label="Layanan">
                            <option value="">Pilih layanan</option>
                            @foreach ($clinic['services'] as $s)
                                <option value="{{ $s['slug'] }}" @selected(request('layanan') === $s['slug'])>{{ $s['name'] }}</option>
                            @endforeach
                        </select>
                        <p class="gl-field__error" data-error-for="layanan" role="alert"></p>
                    </div>
                    <div class="gl-field">
                        <label for="gl-f-dokter">Dokter / staf</label>
                        <select id="gl-f-dokter" name="dokter">
                            <option value="">Tidak ada preferensi</option>
                            @foreach ($clinic['doctors'] as $d)
                                <option value="{{ $d['id'] }}" @selected(request('dokter') === $d['id'])>{{ $d['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="gl-field">
                        <label for="gl-f-tanggal">Tanggal <abbr title="wajib">*</abbr></label>
                        <input id="gl-f-tanggal" type="date" name="tanggal" min="{{ $min }}" value="{{ request('tanggal') }}" required data-label="Tanggal">
                        <p class="gl-field__error" data-error-for="tanggal" role="alert"></p>
                    </div>
                    <div class="gl-field">
                        <label for="gl-f-jam">Jam <abbr title="wajib">*</abbr></label>
                        <select id="gl-f-jam" name="jam" required data-label="Jam">
                            <option value="">Pilih jam</option>
                            @foreach ($clinic['appointment']['times'] as $t)
                                <option value="{{ $t }}" @selected(request('jam') === $t)>{{ $t }}</option>
                            @endforeach
                        </select>
                        <p class="gl-field__error" data-error-for="jam" role="alert"></p>
                    </div>
                    <div class="gl-field gl-field--wide">
                        <label for="gl-f-catatan">Keluhan / catatan</label>
                        <textarea id="gl-f-catatan" name="catatan" rows="4" maxlength="500" placeholder="Ceritakan singkat kondisi kulit atau perawatan yang diinginkan"></textarea>
                    </div>
                </div>

                <div class="gl-field gl-field--check">
                    <label class="gl-check">
                        <input type="checkbox" name="setuju" required data-label="Persetujuan">
                        <span>Saya menyetujui <a href="{{ route('klinik-kecantikan.policy') }}#privasi" target="_blank" rel="noopener">Kebijakan Privasi</a> dan <a href="{{ route('klinik-kecantikan.policy') }}#syarat-ketentuan" target="_blank" rel="noopener">Syarat & Ketentuan</a>.</span>
                    </label>
                    <p class="gl-field__error" data-error-for="setuju" role="alert"></p>
                </div>

                <button type="submit" class="gl-btn gl-btn--primary gl-btn--lg gl-btn--block">
                    <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-whatsapp"/></svg>
                    Kirim via WhatsApp
                </button>
                <noscript><p class="gl-note">JavaScript dibutuhkan untuk mengirim formulir. Atau hubungi kami langsung: <a href="https://wa.me/{{ $clinic['contact']['whatsapp'] }}">WhatsApp</a>.</p></noscript>
                <p class="gl-form__status" data-gl-form-status role="status" hidden></p>
            </form>

            <aside class="gl-appt__aside" aria-label="Informasi booking">
                <div class="gl-card">
                    <h2 class="gl-card__title">Alur Booking</h2>
                    <ol class="gl-steps">
                        @foreach ($clinic['appointment']['steps'] as $step)
                            <li>
                                <strong>{{ $step['title'] }}</strong>
                                <span>{{ $step['text'] }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="gl-card gl-contactcard">
                    <h2 class="gl-card__title">Butuh bantuan?</h2>
                    <ul class="gl-footer__contact gl-contactcard__list">
                        <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-phone"/></svg><a href="tel:{{ preg_replace('/\s+/', '', $clinic['contact']['phone']) }}">{{ $clinic['contact']['phone'] }}</a></li>
                        <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-clock"/></svg><span>{{ $clinic['contact']['hours_short'] }}</span></li>
                        <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-map-pin"/></svg><span>{{ $clinic['contact']['address'] }}</span></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endif
