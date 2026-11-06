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
        <form class="fd-panel fd-form fd-reveal" data-fd-wa-form data-title="Halo, saya ingin mendaftar sebagai relawan Harapan Untuk Negeri Foundation." novalidate>
            <h3>Formulir Pendaftaran Relawan</h3>
            <div class="fd-form__row">
                <div class="fd-field"><label for="v-nama">Nama lengkap *</label><input id="v-nama" name="nama" data-label="Nama" required autocomplete="name"><span class="fd-err">Nama wajib diisi.</span></div>
                <div class="fd-field"><label for="v-email">Email *</label><input id="v-email" type="email" name="email" data-label="Email" required autocomplete="email"><span class="fd-err">Masukkan email yang valid.</span></div>
            </div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="v-hp">Nomor WhatsApp *</label><input id="v-hp" type="tel" name="whatsapp" data-label="WhatsApp" required autocomplete="tel" placeholder="08xxxxxxxxxx"><span class="fd-err">Masukkan nomor yang valid.</span></div>
                <div class="fd-field"><label for="v-kota">Kota domisili *</label><input id="v-kota" name="kota" data-label="Kota" required autocomplete="address-level2"><span class="fd-err">Kota wajib diisi.</span></div>
            </div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="v-bidang">Bidang yang diminati *</label>
                    <select id="v-bidang" name="bidang" data-label="Bidang" required><option value="">Pilih bidang…</option>@foreach ($fd['volunteer']['roles'] as $ro)<option>{{ $ro }}</option>@endforeach</select><span class="fd-err">Pilih salah satu bidang.</span></div>
                <div class="fd-field"><label for="v-waktu">Ketersediaan waktu</label>
                    <select id="v-waktu" name="waktu" data-label="Ketersediaan"><option>Akhir pekan</option><option>Hari kerja</option><option>Fleksibel</option><option>Hanya saat acara besar</option></select></div>
            </div>
            <div class="fd-field"><label for="v-motivasi">Motivasi bergabung</label><textarea id="v-motivasi" name="motivasi" data-label="Motivasi"></textarea></div>
            <button class="fd-btn fd-btn--gold fd-btn--block" type="submit">Daftar via WhatsApp <svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg></button>
            <p class="fd-ok" data-fd-form-ok hidden>Terima kasih! Jendela WhatsApp akan terbuka dengan data pendaftaran Anda.</p>
            <p class="fd-note">Pendaftaran dikirim langsung ke WhatsApp tim relawan; tidak disimpan di situs ini.</p>
        </form>
        <aside class="fd-grid fd-reveal">
            <div class="fd-media"><img src="{{ $i('volunteer.jpg') }}" alt="Tangan-tangan relawan terangkat" loading="lazy" style="aspect-ratio:16/10"></div>
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
