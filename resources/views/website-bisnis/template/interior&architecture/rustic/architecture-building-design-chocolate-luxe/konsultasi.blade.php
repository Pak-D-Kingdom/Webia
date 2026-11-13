@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Booking Konsultasi — ArchiDesign')
@section('active', 'konsultasi')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Booking Konsultasi', 'sub' => 'Atur jadwal konsultasi dengan tim ahli kami.', 'bg' => 'konsultasi-living.svg', 'icon' => 'calendar', 'crumb' => 'Konsultasi'])

<section class="abd-section">
    <div class="abd-container abd-split">
        <form class="abd-form" data-wa-form="konsultasi" novalidate data-reveal>
            <h2>Jadwalkan Konsultasi</h2>
            <p class="abd-form__hint">Isi formulir, lalu kirim ke WhatsApp kami untuk konfirmasi jadwal.</p>
            <div class="abd-fields">
                <div class="abd-field"><label for="k-nama">Nama lengkap *</label><input id="k-nama" name="nama" data-label="Nama" type="text" required autocomplete="name"></div>
                <div class="abd-field"><label for="k-email">Email *</label><input id="k-email" name="email" data-label="Email" type="email" required autocomplete="email"></div>
                <div class="abd-field"><label for="k-wa">No. WhatsApp *</label><input id="k-wa" name="wa" data-label="WhatsApp" type="tel" inputmode="tel" required autocomplete="tel" placeholder="08xxxxxxxxxx"></div>
                <div class="abd-field"><label for="k-layanan">Jenis layanan *</label>
                    <select id="k-layanan" name="layanan" data-label="Layanan" required><option value="">Pilih layanan</option>@foreach ($site['consult']['services'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                <div class="abd-field"><label for="k-tgl">Tanggal *</label><input id="k-tgl" name="tanggal" data-label="Tanggal" type="date" required data-min-today></div>
                <div class="abd-field"><label for="k-jam">Jam *</label>
                    <select id="k-jam" name="jam" data-label="Jam" required><option value="">Pilih jam</option>@foreach ($site['consult']['times'] as $o)<option>{{ $o }} WIB</option>@endforeach</select></div>
                <div class="abd-field abd-field--full"><label for="k-metode">Metode konsultasi *</label>
                    <select id="k-metode" name="metode" data-label="Metode" required><option value="">Pilih metode</option>@foreach ($site['consult']['modes'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                <div class="abd-field abd-field--full"><label for="k-catatan">Catatan (opsional)</label><textarea id="k-catatan" name="catatan" data-label="Catatan" rows="4" placeholder="Ceritakan singkat rencana bangunan Anda"></textarea></div>
            </div>
            <button type="submit" class="abd-btn abd-btn--primary abd-btn--block"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Kirim ke WhatsApp</span></button>
        </form>

        <aside class="abd-side" data-reveal>
            <div class="abd-side__img"><img src="{{ $img('konsultasi-living.svg') }}" alt="" loading="lazy" width="900" height="420"></div>
            <h3>Yang akan kita bahas</h3>
            <ul class="abd-checks abd-checks--dark">
                <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>Kebutuhan ruang, gaya, dan anggaran</li>
                <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>Kondisi lahan dan aturan bangunan</li>
                <li><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>Lingkup layanan dan jadwal kerja</li>
            </ul>
            <p class="abd-side__row"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $site['contact']['hours'] }}</p>
            <p class="abd-side__row"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg>{{ $site['contact']['phone'] }}</p>
        </aside>
    </div>
</section>
@endsection
