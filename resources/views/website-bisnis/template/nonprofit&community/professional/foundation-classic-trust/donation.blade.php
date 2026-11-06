@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Pilihan Donasi — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Pilihan Donasi', 'lead' => 'Pilih cara terbaik untuk berbagi kebaikan. Konfirmasi donasi Anda melalui WhatsApp dan tim kami akan memandu langkah berikutnya.'])

<section class="fd-section">
    <div class="fd-wrap fd-split fd-split--form">
        <form class="fd-panel fd-form fd-reveal" data-fd-wa-form data-title="Halo, saya ingin berdonasi melalui Harapan Untuk Negeri Foundation." novalidate>
            <fieldset class="fd-field">
                <legend>1. Pilih jenis donasi</legend>
                <div class="fd-grid fd-grid--4" style="margin-top:8px">
                    @foreach ($fd['donation']['options'] as $k => $o)
                        <label class="fd-opt">
                            <input type="radio" name="jenis" value="{{ $o['key'] }}" data-label="Jenis donasi" data-v="{{ $o['title'] }}" @checked($k === 0)>
                            <span class="fd-opt__box"><img src="{{ $i($o['icon']) }}" alt="" width="46" height="46"><b>{{ $o['title'] }}</b><small>({{ $o['sub'] }})</small></span>
                        </label>
                    @endforeach
                </div>
            </fieldset>
            <fieldset class="fd-field">
                <legend>2. Pilih nominal</legend>
                <div class="fd-amounts" style="margin:8px 0">
                    @foreach ($fd['donation']['amounts'] as $k => $a)
                        <label class="fd-amount"><input type="radio" name="nominal" value="{{ $a }}" data-label="Nominal" @checked($k === 1)><span>Rp {{ number_format($a, 0, ',', '.') }}</span></label>
                    @endforeach
                </div>
                <input type="text" inputmode="numeric" name="nominal_lain" data-label="Nominal lainnya" placeholder="Atau tulis nominal lain (angka), mis. 75000" aria-label="Nominal lainnya">
            </fieldset>
            <div class="fd-field">
                <label for="fd-program">3. Arahkan ke program</label>
                <select id="fd-program" name="program" data-label="Program">
                    @foreach ($fd['donation']['programs'] as $p)<option>{{ $p }}</option>@endforeach
                </select>
            </div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="fd-nama">Nama lengkap *</label><input id="fd-nama" name="nama" data-label="Nama" required autocomplete="name"><span class="fd-err">Nama wajib diisi.</span></div>
                <div class="fd-field"><label for="fd-hp">Nomor WhatsApp *</label><input id="fd-hp" name="whatsapp" data-label="WhatsApp" type="tel" required autocomplete="tel" placeholder="08xxxxxxxxxx"><span class="fd-err">Masukkan nomor yang valid.</span></div>
            </div>
            <div class="fd-field"><label for="fd-pesan">Pesan / doa (opsional)</label><textarea id="fd-pesan" name="pesan" data-label="Pesan"></textarea></div>
            <button class="fd-btn fd-btn--gold fd-btn--block" type="submit">Lanjutkan via WhatsApp <svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg></button>
            <p class="fd-ok" data-fd-form-ok hidden>Terima kasih! Jendela WhatsApp akan terbuka dengan data donasi Anda.</p>
            <p class="fd-note">Data tidak disimpan di situs ini; pesan dikirim langsung ke WhatsApp tim kami.</p>
        </form>

        <aside class="fd-grid fd-reveal">
            <div class="fd-panel">
                <h3>Mengapa berdonasi di sini?</h3>
                <ul class="fd-list">
                    <li><span class="fd-tick"><svg class="fd-ico"><use href="#fd-i-check"/></svg></span><span>Laporan keuangan teraudit dan terbuka untuk publik.</span></li>
                    <li><span class="fd-tick"><svg class="fd-ico"><use href="#fd-i-check"/></svg></span><span>Sekitar 84% dana disalurkan langsung ke program.</span></li>
                    <li><span class="fd-tick"><svg class="fd-ico"><use href="#fd-i-check"/></svg></span><span>Donasi rutin dapat diubah atau dihentikan kapan saja.</span></li>
                </ul>
                <a class="fd-btn fd-btn--outline fd-btn--sm" style="margin-top:16px" href="{{ $r('financial') }}">Lihat Laporan <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
            <div class="fd-panel">
                <h3>Pertanyaan seputar donasi?</h3>
                <p style="margin-bottom:12px">Tanyakan langsung ke HarapanBot.</p>
                <div class="fd-pill-row">
                    <button type="button" class="fd-chip" data-fd-chat-ask="Bagaimana cara berdonasi?">Cara berdonasi</button>
                    <button type="button" class="fd-chip" data-fd-chat-ask="Apakah donasi bisa dilakukan rutin setiap bulan?">Donasi rutin</button>
                    <button type="button" class="fd-chip" data-fd-chat-ask="Bagaimana laporan penggunaan dana?">Laporan dana</button>
                </div>
            </div>
        </aside>
    </div>
</section>
@endsection
