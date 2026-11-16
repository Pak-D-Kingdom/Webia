@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Booking Survei Lokasi — Renovaku')
@section('meta_description', 'Jadwalkan survei langsung ke lokasi rumah Anda bersama tim Renovaku.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Booking Survei Lokasi',
    'desc'  => 'Jadwalkan survei langsung ke lokasi rumah Anda. Tim kami mengukur, memeriksa kondisi bangunan, lalu menyusun penawaran yang akurat.',
    'image' => 'survey-tape.jpg',
    'alt'   => 'Meteran kuning di atas denah rumah',
    'cta'   => ['Pilih Jadwal', 'booking-survei'],
])

<section class="hr-section">
    <div class="hr-container hr-formwrap">
        <form class="hr-form" id="formulir" data-wa-form data-wa-intro="Halo Renovaku, saya ingin booking survei lokasi." novalidate>
            <header class="hr-form__head">
                <h2>Jadwal survei</h2>
                <div class="hr-progressbar" role="progressbar" aria-label="Kelengkapan formulir" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-form-progress>
                    <span><i data-form-bar></i></span><b data-form-pct>0%</b>
                </div>
            </header>

            <fieldset class="hr-fs">
                <legend><span class="hr-fs__no">1</span>Data Anda</legend>
                <div class="hr-form__grid">
                    <div class="hr-field"><label for="s-nama">Nama lengkap</label>
                        <div class="hr-input">{{ $i('user') }}<input id="s-nama" name="nama" type="text" autocomplete="name" placeholder="Nama Anda" required minlength="3"></div><p class="hr-field__err" data-err></p></div>
                    <div class="hr-field"><label for="s-wa">Nomor WhatsApp</label>
                        <div class="hr-input">{{ $i('phone') }}<input id="s-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required></div><p class="hr-field__err" data-err></p></div>
                </div>
            </fieldset>

            <fieldset class="hr-fs">
                <legend><span class="hr-fs__no">2</span>Lokasi rumah</legend>
                <div class="hr-form__grid">
                    <div class="hr-field hr-field--full"><label for="s-alamat">Alamat lokasi rumah</label>
                        <textarea id="s-alamat" name="alamat" rows="3" required minlength="8" placeholder="Nama jalan, nomor, kelurahan, patokan"></textarea><p class="hr-field__err" data-err></p></div>
                    <div class="hr-field hr-field--full"><label for="s-kota">Wilayah</label>
                        <select id="s-kota" name="wilayah" data-select data-placeholder="Pilih wilayah…" required><option value="">Pilih wilayah…</option>@foreach ($cfg['select']['cities'] as $o)<option>{{ $o }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                </div>
                <div class="hr-field hr-field--full">
                    <p class="hr-field__label" id="lbl-s-layanan">Jenis layanan</p>
                    <div class="hr-choice" role="radiogroup" aria-labelledby="lbl-s-layanan" data-group="layanan" data-required>
                        @foreach ($cfg['services'] as $s)
                            <label class="hr-opt"><input type="radio" name="layanan" value="{{ $s['id'] }}" data-text="{{ $s['title'] }}"><span class="hr-opt__card">{{ $i($s['icon']) }}<b>{{ $s['title'] }}</b></span></label>
                        @endforeach
                    </div>
                    <p class="hr-field__err" data-err></p>
                </div>
            </fieldset>

            <fieldset class="hr-fs">
                <legend><span class="hr-fs__no">3</span>Pilih jadwal</legend>
                <div class="hr-field hr-field--full"><label for="s-tgl">Tanggal survei</label>
                    <div class="hr-input">{{ $i('calendar') }}<input id="s-tgl" name="tanggal" type="date" data-min-today required></div><p class="hr-field__err" data-err></p></div>
                <div class="hr-field hr-field--full">
                    <p class="hr-field__label" id="lbl-jam">Jam kunjungan</p>
                    <div class="hr-slots" role="radiogroup" aria-labelledby="lbl-jam" data-group="jam" data-required>
                        @foreach ($cfg['select']['times'] as $t)
                            <label class="hr-slot"><input type="radio" name="jam" value="{{ $t }}" data-text="{{ $t }}"><span>{{ $i('clock') }}{{ $t }}</span></label>
                        @endforeach
                    </div>
                    <p class="hr-field__err" data-err></p>
                </div>
                <div class="hr-field hr-field--full"><label for="s-note">Catatan <span>(opsional)</span></label>
                    <textarea id="s-note" name="catatan" rows="3" maxlength="300" data-count placeholder="Contoh: akses masuk lewat satpam, ada anjing di halaman"></textarea>
                    <div class="hr-field__foot"><p class="hr-field__err" data-err></p><span class="hr-count" data-count-out>0/300</span></div></div>
            </fieldset>

            <button class="hr-btn hr-btn--primary hr-btn--lg hr-btn--block hr-submit" type="submit">{{ $i('whatsapp') }}<span>Booking via WhatsApp</span></button>
            <p class="hr-form__hint">{{ $i('info') }}<span>Dikirim ke WhatsApp {{ $cfg['site']['whatsapp_display'] }}. Jadwal dikonfirmasi oleh tim kami; pilih tanggal mulai besok.</span></p>
            <div class="hr-form__ok" data-form-ok hidden role="status">{{ $i('check-circle') }}<div><strong>WhatsApp dibuka.</strong><span>Jika tidak terbuka otomatis, <a data-form-link href="#" target="_blank" rel="noopener noreferrer">klik di sini</a>.</span></div></div>
        </form>

        <aside class="hr-side">
            <div class="hr-wapreview" data-reveal aria-label="Pratinjau pesan WhatsApp">
                <div class="hr-wapreview__bar"><span class="hr-wapreview__av">R</span><div><strong>Renovaku</strong><small>{{ $cfg['site']['whatsapp_display'] }}</small></div>{{ $i('whatsapp') }}</div>
                <div class="hr-wapreview__chat"><p class="hr-wapreview__bubble" data-wa-preview>Pratinjau pesan Anda akan muncul di sini saat Anda mengisi formulir.</p></div>
            </div>
            <div class="hr-side__card" data-reveal>
                <h3>Yang kami lakukan saat survei</h3>
                <ul class="hr-checklist hr-checklist--plain">
                    <li>{{ $i('check-circle') }}<span>Mengukur area dan mencatat kondisi bangunan</span></li>
                    <li>{{ $i('check-circle') }}<span>Mendiskusikan kebutuhan dan pilihan material</span></li>
                    <li>{{ $i('check-circle') }}<span>Memberi gambaran biaya dan jadwal awal</span></li>
                </ul>
            </div>
            <div class="hr-side__card hr-side__card--img" data-reveal>
                <img src="{{ $img('survey-tape.jpg') }}" alt="Meteran kuning di atas denah" width="549" height="297" loading="lazy" decoding="async">
                <p>{{ $i('clock') }}<span>{{ $cfg['site']['hours'] }}</span></p>
            </div>
        </aside>
    </div>
</section>
@endsection
