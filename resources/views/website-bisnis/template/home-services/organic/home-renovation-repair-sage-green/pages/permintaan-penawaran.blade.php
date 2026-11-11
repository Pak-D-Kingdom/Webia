@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Permintaan Penawaran — Renovaku')
@section('meta_description', 'Isi formulir untuk mendapatkan penawaran harga renovasi dan perbaikan rumah dari Renovaku.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Permintaan Penawaran',
    'desc'  => 'Dapatkan penawaran harga terbaik sekarang juga. Isi formulir singkat ini dan tim kami akan menghubungi Anda lewat WhatsApp.',
    'image' => 'quotation-hand.jpg',
    'alt'   => 'Tangan menulis rincian penawaran di atas denah',
    'cta'   => ['Isi Formulir', 'permintaan-penawaran'],
])

<section class="hr-section">
    <div class="hr-container hr-formwrap">
        <form class="hr-form" id="formulir" data-wa-form data-wa-intro="Halo Renovaku, saya ingin meminta penawaran renovasi/perbaikan rumah." novalidate>
            <h2>Formulir penawaran</h2>
            <div class="hr-form__grid">
                <div class="hr-field"><label for="q-nama">Nama lengkap</label><input id="q-nama" name="nama" type="text" autocomplete="name" required minlength="3"><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="q-wa">Nomor WhatsApp</label><input id="q-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required pattern="^[0-9+\s\-]{9,16}$"><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="q-email">Email <span>(opsional)</span></label><input id="q-email" name="email" type="email" autocomplete="email"><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="q-kota">Wilayah</label>
                    <select id="q-kota" name="wilayah" required><option value="">Pilih wilayah…</option>@foreach ($cfg['select']['cities'] as $o)<option>{{ $o }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="q-layanan">Jenis layanan</label>
                    <select id="q-layanan" name="layanan" data-prefill="layanan" required><option value="">Pilih layanan…</option>@foreach ($cfg['services'] as $s)<option value="{{ $s['id'] }}">{{ $s['title'] }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="q-paket">Paket yang diminati</label>
                    <select id="q-paket" name="paket" data-prefill="paket"><option value="">Belum memilih</option>@foreach ($cfg['packages'] as $p)<option value="{{ $p['id'] }}">{{ $p['name'] }}</option>@endforeach</select></div>
                <div class="hr-field"><label for="q-luas">Perkiraan luas <span>(m², opsional)</span></label><input id="q-luas" name="luas" type="number" min="1" max="10000" inputmode="numeric"><p class="hr-field__err" data-err></p></div>
                <div class="hr-field"><label for="q-budget">Kisaran anggaran</label>
                    <select id="q-budget" name="anggaran"><option value="">Belum menentukan</option>@foreach ($cfg['select']['budgets'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                <div class="hr-field hr-field--full"><label for="q-note">Kebutuhan Anda</label><textarea id="q-note" name="kebutuhan" rows="4" required minlength="10" placeholder="Contoh: renovasi dapur dan kamar mandi, atap bocor di ruang tamu…"></textarea><p class="hr-field__err" data-err></p></div>
            </div>
            <button class="hr-btn hr-btn--primary hr-btn--lg" type="submit">{{ $i('whatsapp') }}<span>Kirim via WhatsApp</span></button>
            <p class="hr-form__hint">Formulir akan membuka WhatsApp dengan pesan yang sudah terisi. Anda tinggal menekan kirim.</p>
            <div class="hr-form__ok" data-form-ok hidden role="status">{{ $i('check-circle') }}<div><strong>WhatsApp dibuka.</strong><span>Jika tidak terbuka otomatis, <a data-form-link href="#" target="_blank" rel="noopener noreferrer">klik di sini</a>.</span></div></div>
        </form>

        <aside class="hr-side">
            <div class="hr-side__card" data-reveal>
                <h3>Hubungi kami langsung</h3>
                <ul class="hr-contact">
                    <li>{{ $i('phone') }}<a href="{{ $cfg['site']['phone_href'] }}">{{ $cfg['site']['phone'] }}</a></li>
                    <li>{{ $i('mail') }}<a href="mailto:{{ $cfg['site']['email'] }}">{{ $cfg['site']['email'] }}</a></li>
                    <li>{{ $i('pin') }}<span>{{ $cfg['site']['address'] }}</span></li>
                    <li>{{ $i('clock') }}<span>{{ $cfg['site']['hours'] }}</span></li>
                </ul>
            </div>
            <div class="hr-side__card hr-side__card--dark" data-reveal>
                <h3>Setelah Anda mengirim</h3>
                <ol class="hr-mini">
                    <li>Tim menghubungi Anda untuk memahami kebutuhan.</li>
                    <li>Jadwal survei lokasi disepakati bersama.</li>
                    <li>Penawaran harga tertulis dikirim setelah survei.</li>
                </ol>
                <a class="hr-btn hr-btn--sage hr-btn--sm" href="{{ $go('booking-survei') }}"><span>Langsung booking survei</span>{{ $i('arrow') }}</a>
            </div>
        </aside>
    </div>
</section>
@endsection
