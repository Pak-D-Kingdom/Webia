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
            <header class="hr-form__head">
                <h2>Formulir penawaran</h2>
                <div class="hr-progressbar" role="progressbar" aria-label="Kelengkapan formulir" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-form-progress>
                    <span><i data-form-bar></i></span><b data-form-pct>0%</b>
                </div>
            </header>

            <fieldset class="hr-fs">
                <legend><span class="hr-fs__no">1</span>Data Anda</legend>
                <div class="hr-form__grid">
                    <div class="hr-field"><label for="q-nama">Nama lengkap</label>
                        <div class="hr-input">{{ $i('user') }}<input id="q-nama" name="nama" type="text" autocomplete="name" placeholder="Nama Anda" required minlength="3"></div><p class="hr-field__err" data-err></p></div>
                    <div class="hr-field"><label for="q-wa">Nomor WhatsApp</label>
                        <div class="hr-input">{{ $i('phone') }}<input id="q-wa" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required></div><p class="hr-field__err" data-err></p></div>
                    <div class="hr-field hr-field--full"><label for="q-email">Email <span>(opsional)</span></label>
                        <div class="hr-input">{{ $i('mail') }}<input id="q-email" name="email" type="email" autocomplete="email" placeholder="nama@email.com"></div><p class="hr-field__err" data-err></p></div>
                </div>
            </fieldset>

            <fieldset class="hr-fs">
                <legend><span class="hr-fs__no">2</span>Kebutuhan renovasi</legend>
                <div class="hr-field hr-field--full">
                    <p class="hr-field__label" id="lbl-layanan">Jenis layanan</p>
                    <div class="hr-choice" role="radiogroup" aria-labelledby="lbl-layanan" data-group="layanan" data-required>
                        @foreach ($cfg['services'] as $s)
                            <label class="hr-opt"><input type="radio" name="layanan" value="{{ $s['id'] }}" data-text="{{ $s['title'] }}"><span class="hr-opt__card">{{ $i($s['icon']) }}<b>{{ $s['title'] }}</b></span></label>
                        @endforeach
                    </div>
                    <p class="hr-field__err" data-err></p>
                </div>
                <div class="hr-field hr-field--full">
                    <p class="hr-field__label" id="lbl-paket">Paket yang diminati <span>(opsional)</span></p>
                    <div class="hr-choice hr-choice--pkg" role="radiogroup" aria-labelledby="lbl-paket" data-group="paket">
                        @foreach ($cfg['packages'] as $p)
                            <label class="hr-opt"><input type="radio" name="paket" value="{{ $p['id'] }}" data-text="{{ $p['name'] }}"><span class="hr-opt__card">{{ $i($p['icon']) }}<b>{{ $p['name'] }}</b><small>{{ $p['price'] }}</small></span></label>
                        @endforeach
                    </div>
                </div>
                <div class="hr-form__grid">
                    <div class="hr-field"><label for="q-kota">Wilayah</label>
                        <select id="q-kota" name="wilayah" data-select data-placeholder="Pilih wilayah…" required><option value="">Pilih wilayah…</option>@foreach ($cfg['select']['cities'] as $o)<option>{{ $o }}</option>@endforeach</select><p class="hr-field__err" data-err></p></div>
                    <div class="hr-field"><label for="q-budget">Kisaran anggaran</label>
                        <select id="q-budget" name="anggaran" data-select data-placeholder="Belum menentukan"><option value="">Belum menentukan</option>@foreach ($cfg['select']['budgets'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
                    <div class="hr-field"><label for="q-luas">Perkiraan luas <span>(m², opsional)</span></label>
                        <div class="hr-input">{{ $i('ruler') }}<input id="q-luas" name="luas" type="number" min="1" max="10000" inputmode="numeric" placeholder="Contoh: 36"></div><p class="hr-field__err" data-err></p></div>
                </div>
            </fieldset>

            <fieldset class="hr-fs">
                <legend><span class="hr-fs__no">3</span>Ceritakan detailnya</legend>
                <div class="hr-field hr-field--full"><label for="q-note">Kebutuhan Anda</label>
                    <textarea id="q-note" name="kebutuhan" rows="4" required minlength="10" maxlength="400" data-count placeholder="Contoh: renovasi dapur dan kamar mandi, atap bocor di ruang tamu…"></textarea>
                    <div class="hr-field__foot"><p class="hr-field__err" data-err></p><span class="hr-count" data-count-out>0/400</span></div></div>
            </fieldset>

            <button class="hr-btn hr-btn--primary hr-btn--lg hr-btn--block hr-submit" type="submit">{{ $i('whatsapp') }}<span>Kirim via WhatsApp</span></button>
            <p class="hr-form__hint">{{ $i('info') }}<span>Dikirim ke WhatsApp {{ $cfg['site']['whatsapp_display'] }}. Pesan sudah terisi, Anda tinggal menekan kirim.</span></p>
            <div class="hr-form__ok" data-form-ok hidden role="status">{{ $i('check-circle') }}<div><strong>WhatsApp dibuka.</strong><span>Jika tidak terbuka otomatis, <a data-form-link href="#" target="_blank" rel="noopener noreferrer">klik di sini</a>.</span></div></div>
        </form>

        <aside class="hr-side">
            <div class="hr-wapreview" data-reveal aria-label="Pratinjau pesan WhatsApp">
                <div class="hr-wapreview__bar"><span class="hr-wapreview__av">R</span><div><strong>Renovaku</strong><small>{{ $cfg['site']['whatsapp_display'] }}</small></div>{{ $i('whatsapp') }}</div>
                <div class="hr-wapreview__chat"><p class="hr-wapreview__bubble" data-wa-preview>Pratinjau pesan Anda akan muncul di sini saat Anda mengisi formulir.</p></div>
            </div>
            <div class="hr-side__card" data-reveal>
                <h3>Hubungi kami langsung</h3>
                <ul class="hr-contact">
                    <li>{{ $i('whatsapp') }}<a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $cfg['site']['whatsapp_display'] }}</a></li>
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
