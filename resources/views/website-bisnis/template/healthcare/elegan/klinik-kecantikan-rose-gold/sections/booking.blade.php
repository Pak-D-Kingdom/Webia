{{-- Appointment. $full=false: banner beranda (tanpa field tanggal/jam) | $full=true: form --}}
@php $full = $full ?? false; $b = $c['booking']; @endphp

@if (! $full)
<section class="rg-book" id="booking" aria-labelledby="rgBookTitle">
    <div class="rg-book__copy">
        <h2 id="rgBookTitle" class="rg-book__title">{{ $b['title'] }}</h2>
        <p>{{ $b['text'] }}</p>
        <a class="rg-btn rg-btn--light rg-btn--lg" href="{{ route($rp . 'appointment') }}">
            <i class="bi bi-calendar2-check" aria-hidden="true"></i>{{ $b['button'] }} <i class="bi bi-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
    <img class="rg-book__img" src="{{ asset($c['images_dir'] . '/booking-visual.jpg') }}" alt="" loading="lazy" width="725" height="815" aria-hidden="true">
</section>
@else
<section class="rg-section" aria-labelledby="rgFormTitle">
    <div class="rg-container rg-appt">
        <form class="rg-card rg-form" id="rgBookingForm" method="post" action="#" novalidate
              data-wa="{{ $c['contact']['booking_whatsapp'] }}" data-clinic="{{ $c['brand']['name'] }}">
            @csrf
            <h2 id="rgFormTitle" class="rg-h3">Isi Data Booking</h2>
            <p class="rg-lead">Kami akan mengonfirmasi jadwal Anda melalui WhatsApp.</p>

            <div class="rg-form__grid">
                <div class="rg-field">
                    <label for="rgName">Nama lengkap <span aria-hidden="true">*</span></label>
                    <input class="rg-input" id="rgName" name="nama" type="text" autocomplete="name" required>
                    <small class="rg-err" data-err-for="nama"></small>
                </div>
                <div class="rg-field">
                    <label for="rgPhone">Nomor telepon / WhatsApp <span aria-hidden="true">*</span></label>
                    <input class="rg-input" id="rgPhone" name="telepon" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required>
                    <small class="rg-err" data-err-for="telepon"></small>
                </div>
                <div class="rg-field">
                    <label for="rgEmail">Email</label>
                    <input class="rg-input" id="rgEmail" name="email" type="email" autocomplete="email">
                    <small class="rg-err" data-err-for="email"></small>
                </div>
                <div class="rg-field">
                    <label for="rgService">Layanan <span aria-hidden="true">*</span></label>
                    <select class="rg-input" id="rgService" name="layanan" required>
                        <option value="">Pilih layanan</option>
                        @foreach ($c['services'] as $s)<option value="{{ $s['slug'] }}">{{ $s['name'] }}</option>@endforeach
                    </select>
                    <small class="rg-err" data-err-for="layanan"></small>
                </div>
                <div class="rg-field">
                    <label for="rgDoctor">Dokter / Staff</label>
                    <select class="rg-input" id="rgDoctor" name="dokter">
                        <option value="">Siapa saja yang tersedia</option>
                        @foreach ($c['doctors'] as $d)<option value="{{ $d['slug'] }}">{{ $d['name'] }}</option>@endforeach
                    </select>
                </div>
                <div class="rg-field">
                    <label for="rgDate">Tanggal <span aria-hidden="true">*</span></label>
                    <input class="rg-input" id="rgDate" name="tanggal" type="date" required>
                    <small class="rg-err" data-err-for="tanggal"></small>
                </div>
                <div class="rg-field">
                    <label for="rgTime">Jam <span aria-hidden="true">*</span></label>
                    <select class="rg-input" id="rgTime" name="jam" required>
                        <option value="">Pilih jam</option>
                        @foreach ($b['times'] as $t)<option value="{{ $t }}">{{ $t }}</option>@endforeach
                    </select>
                    <small class="rg-err" data-err-for="jam"></small>
                </div>
                <div class="rg-field rg-field--full">
                    <label for="rgNote">Catatan / keluhan</label>
                    <textarea class="rg-input" id="rgNote" name="catatan" rows="4" maxlength="500"></textarea>
                </div>
            </div>

            <label class="rg-check">
                <input type="checkbox" name="setuju" required>
                <span>Saya menyetujui <a href="{{ route($rp . 'policy') }}#privasi">Kebijakan Privasi</a> dan <a href="{{ route($rp . 'policy') }}#syarat">Syarat &amp; Ketentuan</a>.</span>
            </label>
            <small class="rg-err" data-err-for="setuju"></small>

            <button class="rg-btn rg-btn--primary rg-btn--lg" type="submit"><i class="bi bi-whatsapp" aria-hidden="true"></i>Kirim Booking via WhatsApp</button>
            <p class="rg-form__status" id="rgFormStatus" role="status" aria-live="polite"></p>
        </form>

        <aside class="rg-card rg-appt__side" aria-label="Informasi booking">
            <h2 class="rg-h4">Sebelum Datang</h2>
            <ul class="rg-checks">
                <li><i class="bi bi-check2-circle" aria-hidden="true"></i>Konsultasi dengan dokter dilakukan sebelum tindakan.</li>
                <li><i class="bi bi-check2-circle" aria-hidden="true"></i>Datang 10 menit lebih awal.</li>
                <li><i class="bi bi-check2-circle" aria-hidden="true"></i>Ubah atau batalkan jadwal minimal 24 jam sebelumnya.</li>
            </ul>
            <dl class="rg-hours">
                @foreach ($c['schedule']['hours'] as $hr)
                    <div class="{{ $hr['open'] ? '' : 'is-closed' }}"><dt>{{ $hr['day'] }}</dt><dd>{{ $hr['time'] }}</dd></div>
                @endforeach
            </dl>
            <p class="rg-note"><i class="bi bi-telephone" aria-hidden="true"></i>{{ $c['contact']['phone'] }}</p>
        </aside>
    </div>
</section>
@endif
