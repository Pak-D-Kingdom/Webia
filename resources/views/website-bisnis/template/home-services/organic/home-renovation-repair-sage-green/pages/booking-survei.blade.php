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
            <h2>Jadwal survei</h2>
            <div class="hr-form__grid">
                <div class="hr-field"><label for="s-nama">Nama lengkap</label><input id="s-nama" name="nama" type="text" autocomplete="name" required minlength="3"><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="s-wa">Nomor WhatsApp</label><input id="s-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required pattern="^[0-9+\s\-]{9,16}$"><p class="hr-field__err" data-err></p></div>
                <div class="hr-field hr-field--full"><label for="s-alamat">Alamat lokasi rumah</label><textarea id="s-alamat" name="alamat" rows="3" required minlength="8" placeholder="Nama jalan, nomor, kelurahan, patokan"></textarea><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="s-kota">Wilayah</label>
                    <select id="s-kota" name="wilayah" required><option value="">Pilih wilayah…</option>@foreach ($cfg['select']['cities'] as $o)<option>{{ $o }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="s-layanan">Jenis layanan</label>
                    <select id="s-layanan" name="layanan" required><option value="">Pilih layanan…</option>@foreach ($cfg['select']['services'] as $o)<option>{{ $o }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="s-tgl">Tanggal survei</label><input id="s-tgl" name="tanggal" type="date" data-min-today required><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="s-jam">Jam</label>
                    <select id="s-jam" name="jam" required><option value="">Pilih jam…</option>@foreach ($cfg['select']['times'] as $o)<option>{{ $o }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                <div class="hr-field hr-field--full"><label for="s-note">Catatan <span>(opsional)</span></label><textarea id="s-note" name="catatan" rows="3" placeholder="Contoh: akses masuk lewat satpam, ada anjing di halaman"></textarea></div>
            </div>
            <button class="hr-btn hr-btn--primary hr-btn--lg" type="submit">{{ $i('whatsapp') }}<span>Booking via WhatsApp</span></button>
            <p class="hr-form__hint">Jadwal dikonfirmasi oleh tim kami lewat WhatsApp. Pilih tanggal mulai besok.</p>
            <div class="hr-form__ok" data-form-ok hidden role="status">{{ $i('check-circle') }}<div><strong>WhatsApp dibuka.</strong><span>Jika tidak terbuka otomatis, <a data-form-link href="#" target="_blank" rel="noopener noreferrer">klik di sini</a>.</span></div></div>
        </form>

        <aside class="hr-side">
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
                <p>{{ $cfg['site']['hours'] }}</p>
            </div>
        </aside>
    </div>
</section>
@endsection
