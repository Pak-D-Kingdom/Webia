{{--
    Appointment.  $full = false → form ringkas beranda (nama, telepon, layanan; GET ke halaman Appointment, data terisi otomatis)
                  $full = true  → form lengkap; JS memvalidasi lalu membuka WhatsApp (tanpa backend)
--}}
@php $full = $full ?? false; @endphp

<section id="appointment" class="cg-section cg-card cg-appointment {{ $full ? 'cg-appointment--full' : 'cg-appointment--preview' }}" aria-labelledby="cg-appointment-title">
    @unless ($full)
        <header class="cg-card__head">
            <h2 id="cg-appointment-title" class="cg-card__title">Booking Appointment</h2>
        </header>
        <p class="cg-card__sub">Pesan jadwal perawatan Anda sekarang.</p>

        <form class="cg-form" action="{{ route('glow.appointment') }}" method="get" data-cg-preview-form>
            <div class="cg-field">
                <label class="cg-sr" for="pv-nama">Nama lengkap</label>
                <i class="bi bi-person" aria-hidden="true"></i>
                <input id="pv-nama" name="nama" type="text" placeholder="Nama Lengkap" autocomplete="name" required>
            </div>
            <div class="cg-field">
                <label class="cg-sr" for="pv-telepon">Nomor telepon</label>
                <i class="bi bi-telephone" aria-hidden="true"></i>
                <input id="pv-telepon" name="telepon" type="tel" inputmode="tel" placeholder="No. Telepon" autocomplete="tel" required>
            </div>
            <div class="cg-field">
                <label class="cg-sr" for="pv-layanan">Layanan</label>
                <i class="bi bi-stars" aria-hidden="true"></i>
                <select id="pv-layanan" name="layanan">
                    <option value="">Pilih Layanan</option>
                    @foreach ($c['services'] as $s)
                        <option value="{{ $s['slug'] }}">{{ $s['title'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="cg-btn cg-btn--primary cg-btn--block">
                Booking Sekarang <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </button>
        </form>
    @else
        <h2 id="cg-appointment-title" class="cg-card__title cg-card__title--lg">Isi Data Booking</h2>
        <p class="cg-card__sub">Lengkapi formulir berikut. Tim kami akan mengonfirmasi jadwal Anda lewat WhatsApp.</p>

        <form class="cg-form cg-form--full" id="cg-appointment-form" method="post" action="#" novalidate data-cg-appointment-form>
            {{-- Backend: ganti action ke endpoint & aktifkan @csrf; JS saat ini mengirim ke WhatsApp. --}}
            <div class="cg-form__grid">
                <div class="cg-formrow">
                    <label for="ap-nama">Nama lengkap <abbr title="wajib">*</abbr></label>
                    <div class="cg-field"><i class="bi bi-person" aria-hidden="true"></i>
                        <input id="ap-nama" name="nama" type="text" autocomplete="name" required placeholder="Nama sesuai identitas"></div>
                    <p class="cg-error" data-error-for="nama" hidden></p>
                </div>
                <div class="cg-formrow">
                    <label for="ap-telepon">No. telepon / WhatsApp <abbr title="wajib">*</abbr></label>
                    <div class="cg-field"><i class="bi bi-telephone" aria-hidden="true"></i>
                        <input id="ap-telepon" name="telepon" type="tel" inputmode="tel" autocomplete="tel" required placeholder="08xx xxxx xxxx"></div>
                    <p class="cg-error" data-error-for="telepon" hidden></p>
                </div>
                <div class="cg-formrow">
                    <label for="ap-email">Email</label>
                    <div class="cg-field"><i class="bi bi-envelope" aria-hidden="true"></i>
                        <input id="ap-email" name="email" type="email" autocomplete="email" placeholder="nama@email.com"></div>
                    <p class="cg-error" data-error-for="email" hidden></p>
                </div>
                <div class="cg-formrow">
                    <label for="ap-layanan">Layanan <abbr title="wajib">*</abbr></label>
                    <div class="cg-field"><i class="bi bi-stars" aria-hidden="true"></i>
                        <select id="ap-layanan" name="layanan" required>
                            <option value="">Pilih Layanan</option>
                            @foreach ($c['services'] as $s)
                                <option value="{{ $s['slug'] }}">{{ $s['title'] }}</option>
                            @endforeach
                        </select></div>
                    <p class="cg-error" data-error-for="layanan" hidden></p>
                </div>
                <div class="cg-formrow">
                    <label for="ap-dokter">Dokter / staff</label>
                    <div class="cg-field"><i class="bi bi-person-badge" aria-hidden="true"></i>
                        <select id="ap-dokter" name="dokter">
                            <option value="">Tidak ada preferensi</option>
                            @foreach ($c['doctors'] as $d)
                                <option value="{{ $d['slug'] }}">{{ $d['name'] }} — {{ $d['role'] }}</option>
                            @endforeach
                        </select></div>
                </div>
                <div class="cg-formrow">
                    <label for="ap-tanggal">Tanggal <abbr title="wajib">*</abbr></label>
                    <div class="cg-field"><i class="bi bi-calendar3" aria-hidden="true"></i>
                        <input id="ap-tanggal" name="tanggal" type="date" required data-cg-date></div>
                    <p class="cg-error" data-error-for="tanggal" hidden></p>
                </div>
                <div class="cg-formrow">
                    <label for="ap-jam">Jam <abbr title="wajib">*</abbr></label>
                    <div class="cg-field"><i class="bi bi-clock" aria-hidden="true"></i>
                        <select id="ap-jam" name="jam" required data-cg-time>
                            <option value="">Pilih Jam</option>
                            @foreach ($c['appointment']['time_slots'] as $t)
                                <option value="{{ $t }}">{{ str_replace(':', '.', $t) }} WIB</option>
                            @endforeach
                        </select></div>
                    <p class="cg-error" data-error-for="jam" hidden></p>
                </div>
                <div class="cg-formrow cg-formrow--wide">
                    <label for="ap-catatan">Catatan / keluhan kulit</label>
                    <div class="cg-field cg-field--area"><i class="bi bi-chat-left-text" aria-hidden="true"></i>
                        <textarea id="ap-catatan" name="catatan" rows="3" maxlength="500" placeholder="Contoh: kulit sensitif, alergi tertentu, atau sedang hamil/menyusui"></textarea></div>
                </div>
            </div>

            <div class="cg-formrow cg-formrow--wide">
                <label class="cg-check">
                    <input type="checkbox" name="setuju" required>
                    <span>Saya menyetujui <a href="{{ route('glow.policy') }}#privasi" target="_blank" rel="noopener">Kebijakan Privasi</a> dan <a href="{{ route('glow.policy') }}#pembatalan" target="_blank" rel="noopener">Kebijakan Pembatalan</a>.</span>
                </label>
                <p class="cg-error" data-error-for="setuju" hidden></p>
            </div>

            <button type="submit" class="cg-btn cg-btn--primary cg-btn--lg">
                <i class="bi bi-whatsapp" aria-hidden="true"></i> Kirim Booking via WhatsApp
            </button>
            <p class="cg-form__status" data-cg-form-status role="status" aria-live="polite" hidden></p>
            <p class="cg-note"><i class="bi bi-info-circle" aria-hidden="true"></i> {{ $c['appointment']['note'] }}</p>
        </form>
    @endunless
</section>
