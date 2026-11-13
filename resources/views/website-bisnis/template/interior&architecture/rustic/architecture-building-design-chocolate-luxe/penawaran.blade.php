@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Permintaan Penawaran — ArchiDesign')
@section('active', 'penawaran')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = "") => url($site["base"] . $p);
    $img = fn (string $f) => asset($site["img"] . "/" . $f);
    $v   = $site["view"];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Permintaan Penawaran', 'sub' => 'Dapatkan penawaran terbaik untuk proyek Anda.', 'bg' => 'blueprint-desk.svg', 'icon' => 'doc', 'crumb' => 'Penawaran'])

<section class="abd-section">
    <div class="abd-container abd-split">
        <form class="abd-form" data-wa-form="penawaran" novalidate data-reveal>
            <h2>Detail Proyek Anda</h2>
            <p class="abd-form__hint">Semakin lengkap informasinya, semakin tepat penawaran yang kami susun.</p>
            <div class="abd-fields">
                <div class="abd-field"><label for="q-nama">Nama lengkap *</label><input id="q-nama" name="nama" data-label="Nama" type="text" required autocomplete="name"></div>
                <div class="abd-field"><label for="q-pt">Perusahaan (opsional)</label><input id="q-pt" name="perusahaan" data-label="Perusahaan" type="text" autocomplete="organization"></div>
                <div class="abd-field"><label for="q-email">Email *</label><input id="q-email" name="email" data-label="Email" type="email" required autocomplete="email"></div>
                <div class="abd-field"><label for="q-wa">No. WhatsApp *</label><input id="q-wa" name="wa" data-label="WhatsApp" type="tel" inputmode="tel" required autocomplete="tel" placeholder="08xxxxxxxxxx"></div>
                <div class="abd-field"><label for="q-jenis">Jenis proyek *</label>
                    <select id="q-jenis" name="jenis" data-label="Jenis proyek" required><option value="">Pilih jenis proyek</option>@foreach ($site['quote']['types'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                <div class="abd-field"><label for="q-lokasi">Lokasi proyek *</label><input id="q-lokasi" name="lokasi" data-label="Lokasi" type="text" required placeholder="Kota / kabupaten"></div>
                <div class="abd-field"><label for="q-luas">Perkiraan luas (m²)</label><input id="q-luas" name="luas" data-label="Luas bangunan" type="number" min="1" inputmode="numeric" placeholder="contoh: 150"></div>
                <div class="abd-field"><label for="q-budget">Perkiraan anggaran</label>
                    <select id="q-budget" name="budget" data-label="Anggaran"><option value="">Pilih rentang</option>@foreach ($site['quote']['budgets'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                <div class="abd-field abd-field--full"><label for="q-mulai">Target mulai</label>
                    <select id="q-mulai" name="mulai" data-label="Target mulai"><option value="">Pilih target</option>@foreach ($site['quote']['starts'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                <div class="abd-field abd-field--full"><label for="q-desk">Deskripsi kebutuhan *</label><textarea id="q-desk" name="deskripsi" data-label="Deskripsi" rows="5" required placeholder="Gaya yang diinginkan, jumlah kamar, fasilitas, dan kebutuhan khusus lainnya"></textarea></div>
            </div>
            <button type="submit" class="abd-btn abd-btn--primary abd-btn--block"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Kirim Permintaan ke WhatsApp</span></button>
        </form>

        <aside class="abd-side" data-reveal>
            <div class="abd-side__img"><img src="{{ $img('blueprint-desk.svg') }}" alt="" loading="lazy" width="1000" height="420"></div>
            <h3>Setelah Anda mengirim</h3>
            <ol class="abd-mini-steps">
                <li>Tim kami meninjau detail proyek Anda.</li>
                <li>Kami menghubungi Anda untuk klarifikasi singkat.</li>
                <li>Penawaran tertulis dikirim ke email atau WhatsApp Anda.</li>
            </ol>
            <p class="abd-side__row"><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg>{{ $site['contact']['email'] }}</p>
        </aside>
    </div>
</section>
@endsection
