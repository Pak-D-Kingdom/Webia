@php $preview = $preview ?? false; @endphp

@if ($preview)
<section class="ta-card ta-bookprev" aria-labelledby="book-title">
    <svg class="ta-sprig ta-bookprev__sprig" aria-hidden="true"><use href="#ta-sprig"/></svg>
    <div class="ta-bookprev__in">
    <div class="ta-bookprev__art">
        <img src="{{ $img('ai-banner-right.jpg') }}" alt="Foto polaroid pantai dan ransel penjelajah" loading="lazy">
    </div>
    <div class="ta-bookprev__body">
        <p class="ta-eyebrow">Booking</p>
        <h3 id="book-title">Booking Inquiry</h3>
        <p>Kirim pertanyaan atau permintaan booking Anda. Tim kami siap membantu merencanakan perjalanan impian Anda.</p>
        <ol class="ta-bookprev__steps">
            <li>Pilih destinasi dan tanggal keberangkatan</li>
            <li>Isi data singkat Anda</li>
            <li>Dapatkan konfirmasi lewat WhatsApp</li>
        </ol>
        <a class="ta-btn ta-btn--light" href="{{ $r('booking-inquiry') }}">Kirim Inquiry <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
    </div>
    </div>
</section>
@else
<section class="ta-section" aria-label="Form booking inquiry">
    <div class="ta-container ta-bookfull">
        <div class="ta-card ta-bookfull__form">
            <h2 class="ta-subtitle">Kirim Inquiry Anda</h2>
            <p class="ta-muted">Isi data berikut. Setelah dikirim, pesan Anda terbuka di WhatsApp tim kami untuk dikonfirmasi.</p>
            <form class="ta-form" data-ta-booking novalidate>
                <div class="ta-form__grid">
                    <div class="ta-field"><label for="bf-nama">Nama Lengkap</label><input id="bf-nama" name="nama" type="text" autocomplete="name" placeholder="Nama sesuai identitas" required></div>
                    <div class="ta-field"><label for="bf-email">Email</label><input id="bf-email" name="email" type="email" autocomplete="email" placeholder="nama@email.com" required></div>
                    <div class="ta-field"><label for="bf-wa">No. WhatsApp</label><input id="bf-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx" required></div>
                    <div class="ta-field"><label for="bf-peserta">Jumlah Peserta</label>
                        <select id="bf-peserta" name="peserta" data-ta-select>
                            @for ($i = 1; $i <= 20; $i++)<option value="{{ $i }}" @selected($i === 2)>{{ $i }} Orang</option>@endfor
                        </select>
                    </div>
                    <div class="ta-field"><label for="bf-dest">Destinasi</label>
                        <select id="bf-dest" name="destinasi" required data-ta-select>
                            <option value="">Pilih destinasi</option>
                            @foreach ($cfg['search_options'] as $slug => $label)<option value="{{ $label }}" data-slug="{{ $slug }}">{{ $label }}</option>@endforeach
                        </select>
                    </div>
                    <div class="ta-field"><label for="bf-paket">Paket Tour (opsional)</label>
                        <select id="bf-paket" name="paket" data-ta-select>
                            <option value="">Belum menentukan paket</option>
                            @foreach ($cfg['packages'] as $p)<option value="{{ $p['name'] }}" data-slug="{{ $p['slug'] }}" data-dest="{{ $p['destination'] }}">{{ $p['name'] }} — {{ $p['duration'] }}</option>@endforeach
                        </select>
                    </div>
                    <div class="ta-field ta-field--full"><label for="bf-tgl">Tanggal Keberangkatan</label><span class="ta-datefield is-empty"><input id="bf-tgl" name="tanggal" type="date" min="{{ now()->toDateString() }}" required><em class="ta-datefield__ph">Pilih tanggal</em><svg class="ta-i ta-datefield__chev" aria-hidden="true"><use href="#i-chev-down"/></svg></span></div>
                    <div class="ta-field ta-field--full"><label for="bf-pesan">Pesan / Pertanyaan</label><textarea id="bf-pesan" name="pesan" rows="4" placeholder="Contoh: kami berangkat bersama 2 anak, ingin tambahan hari di Ubud."></textarea></div>
                </div>
                <p class="ta-form__msg" data-form-msg role="status" aria-live="polite" hidden></p>
                <button class="ta-btn ta-btn--primary ta-btn--lg" type="submit"><svg class="ta-i" aria-hidden="true"><use href="#i-send"/></svg>Kirim Inquiry <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
            </form>
        </div>

        <aside class="ta-bookfull__side">
            <div class="ta-card ta-bookfull__art">
                <img src="{{ $img('ai-banner-right.jpg') }}" alt="Polaroid pantai dan ransel penjelajah" loading="lazy">
            </div>
            <div class="ta-card">
                <h3>Cara booking</h3>
                <ol class="ta-steps">
                    <li><b>Kirim inquiry</b><span>Isi form dan pilih destinasi atau paket.</span></li>
                    <li><b>Konfirmasi tim</b><span>Kami cek ketersediaan dan kirim rincian lewat WhatsApp.</span></li>
                    <li><b>Siap berangkat</b><span>Selesaikan pembayaran sesuai kesepakatan dan terima panduan perjalanan.</span></li>
                </ol>
            </div>
            <div class="ta-card ta-contactcard">
                <h3>Hubungi kami</h3>
                <ul>
                    <li><svg class="ta-i ta-i--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg><a href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}" target="_blank" rel="noopener">{{ $cfg['contact']['phone_display'] }}</a></li>
                    <li><svg class="ta-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cfg['contact']['email'] }}">{{ $cfg['contact']['email'] }}</a></li>
                    <li><svg class="ta-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $cfg['contact']['hours'] }}</li>
                </ul>
            </div>
        </aside>
    </div>
</section>
@endif
