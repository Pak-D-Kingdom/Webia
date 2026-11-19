@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Pendaftaran Relawan — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Jadilah Relawan!', 'lead' => 'Bersama kita bisa memberikan lebih banyak manfaat. Daftarkan diri Anda dan bergabung dengan relawan dari seluruh Indonesia.'])

<section class="fd-section">
    <div class="fd-wrap fd-split fd-split--form">
        <form class="fd-formcard fd-form fd-reveal" data-fd-wa-form data-title="Halo, saya ingin mendaftar sebagai relawan Harapan Untuk Negeri Foundation." novalidate>
            <header class="fd-formcard__head">
                <span class="fd-formcard__ico"><svg class="fd-ico"><use href="#fd-i-users"/></svg></span>
                <div><h3>Formulir Pendaftaran Relawan</h3><p>Hanya 2 menit. Tim relawan akan menghubungi Anda lewat WhatsApp.</p></div>
            </header>
            <div class="fd-progress" aria-live="polite"><span class="fd-progress__bar"><i data-fd-progress-bar></i></span><small data-fd-progress-text>Lengkapi data wajib</small></div>

            <div class="fd-step fd-step--plain"><span class="fd-step__n">1</span><b>Data diri</b></div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="v-nama">Nama lengkap <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-user"/></svg><input id="v-nama" name="nama" data-label="Nama" required autocomplete="name" placeholder="Nama Anda"></div><span class="fd-err">Nama wajib diisi.</span></div>
                <div class="fd-field"><label for="v-email">Email <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-mail"/></svg><input id="v-email" type="email" name="email" data-label="Email" required autocomplete="email" placeholder="nama@email.com"></div><span class="fd-err">Masukkan email yang valid.</span></div>
            </div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="v-hp">Nomor WhatsApp <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-phone"/></svg><input id="v-hp" type="tel" name="whatsapp" data-label="WhatsApp" required autocomplete="tel" placeholder="08xxxxxxxxxx"></div><span class="fd-err">Masukkan nomor yang valid.</span></div>
                <div class="fd-field"><label for="v-kota">Kota domisili <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-pin"/></svg><input id="v-kota" name="kota" data-label="Kota" required autocomplete="address-level2" placeholder="Kota tempat tinggal"></div><span class="fd-err">Kota wajib diisi.</span></div>
            </div>

            <div class="fd-step fd-step--plain"><span class="fd-step__n">2</span><b>Penugasan</b></div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="v-bidang">Bidang yang diminati <i>*</i></label>
                    <div class="fd-input"><svg class="fd-ico"><use href="#fd-i-grid"/></svg><select id="v-bidang" name="bidang" data-label="Bidang" required><option value="">Pilih bidang…</option>@foreach ($fd['volunteer']['roles'] as $ro)<option>{{ $ro }}</option>@endforeach</select></div><span class="fd-err">Pilih salah satu bidang.</span></div>
                <div class="fd-field"><label for="v-waktu">Ketersediaan waktu</label>
                    <div class="fd-input"><svg class="fd-ico"><use href="#fd-i-clock"/></svg><select id="v-waktu" name="waktu" data-label="Ketersediaan"><option>Akhir pekan</option><option>Hari kerja</option><option>Fleksibel</option><option>Hanya saat acara besar</option></select></div></div>
            </div>

            <div class="fd-step fd-step--plain"><span class="fd-step__n">3</span><b>Motivasi</b></div>
            <div class="fd-field"><label for="v-motivasi">Ceritakan alasan Anda bergabung <small>(opsional)</small></label><div class="fd-input fd-input--area"><svg class="fd-ico"><use href="#fd-i-message"/></svg><textarea id="v-motivasi" name="motivasi" data-label="Motivasi" placeholder="Mengapa Anda ingin menjadi relawan?"></textarea></div></div>

            <button class="fd-btn fd-btn--gold fd-btn--lg fd-btn--block" type="submit"><svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg>Daftar via WhatsApp</button>
            <p class="fd-ok" data-fd-form-ok hidden><svg class="fd-ico"><use href="#fd-i-circle-check"/></svg>Terima kasih! Jendela WhatsApp akan terbuka dengan data pendaftaran Anda.</p>
            <p class="fd-note"><svg class="fd-ico"><use href="#fd-i-lock"/></svg>Pendaftaran dikirim langsung ke WhatsApp tim relawan; tidak disimpan di situs ini.</p>
        </form>
        <aside class="fd-grid fd-reveal">
            <div class="fd-media fd-media--sm"><img src="{{ $i('volunteer.jpg') }}" alt="Tangan-tangan relawan terangkat" loading="lazy" style="aspect-ratio:16/10"></div>
            <div class="fd-panel">
                <h3>Yang Anda dapatkan</h3>
                <ul class="fd-list">
                    @foreach ($fd['volunteer']['benefits'] as $b)
                        <li><span class="fd-tick"><svg class="fd-ico"><use href="#fd-i-check"/></svg></span><span><b>{{ $b[0] }}</b><br><span class="fd-note">{{ $b[1] }}</span></span></li>
                    @endforeach
                </ul>
            </div>
            <div class="fd-panel">
                <h3>Pertanyaan?</h3>
                <button type="button" class="fd-chip" style="margin-top:6px" data-fd-chat-ask="Bagaimana menjadi relawan?">Bagaimana menjadi relawan?</button>
            </div>
        </aside>
    </div>
</section>
@endsection
