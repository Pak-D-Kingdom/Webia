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
        <form class="fd-formcard fd-form fd-reveal" data-fd-wa-form data-fd-donation data-title="Halo, saya ingin berdonasi melalui Harapan Untuk Negeri Foundation." novalidate>
            <header class="fd-formcard__head">
                <span class="fd-formcard__ico"><svg class="fd-ico fd-ico--fill"><use href="#fd-i-heart"/></svg></span>
                <div><h3>Formulir Donasi</h3><p>Pilih jenis donasi — kolom di bawah menyesuaikan otomatis. Konfirmasi lewat WhatsApp.</p></div>
            </header>
            <div class="fd-progress" aria-live="polite"><span class="fd-progress__bar"><i data-fd-progress-bar></i></span><small data-fd-progress-text>Lengkapi data wajib</small></div>

            <fieldset class="fd-field fd-step">
                <legend><span class="fd-step__n">1</span>Pilih jenis donasi</legend>
                <div class="fd-optgrid">
                    @foreach ($fd['donation']['options'] as $k => $o)
                        <label class="fd-opt">
                            <input type="radio" name="jenis" value="{{ $o['key'] }}" data-label="Jenis donasi" data-v="{{ $o['title'] }}" @checked($k === 0)>
                            <span class="fd-opt__box"><img src="{{ $i($o['icon']) }}" alt="" width="48" height="48"><b>{{ $o['title'] }}</b><small>{{ $o['sub'] }}</small><i class="fd-opt__check"><svg class="fd-ico"><use href="#fd-i-check"/></svg></i></span>
                        </label>
                    @endforeach
                </div>
                <p class="fd-typehint" data-fd-typehint></p>
            </fieldset>

            {{-- Sekarang · Rutin · Program: nominal --}}
            <fieldset class="fd-field fd-step fd-dyn" data-fd-for="sekarang rutin program">
                <legend><span class="fd-step__n">2</span><span data-fd-nominal-title>Pilih nominal</span></legend>
                <div class="fd-amounts">
                    @foreach ($fd['donation']['amounts'] as $k => $a)
                        <label class="fd-amount"><input type="radio" name="nominal" value="{{ $a }}" data-label="Nominal" @checked($k === 1)><span>Rp {{ number_format($a, 0, ',', '.') }}</span></label>
                    @endforeach
                </div>
                <div class="fd-input fd-input--prefix"><em>Rp</em><input type="text" inputmode="numeric" name="nominal_lain" data-label="Nominal lainnya" placeholder="Atau tulis nominal lain, mis. 75000" aria-label="Nominal lainnya"></div>
            </fieldset>

            {{-- Rutin: jadwal --}}
            <div class="fd-step fd-dyn" data-fd-for="rutin" hidden>
                <div class="fd-step--plain"><span class="fd-step__n">3</span><b>Jadwal donasi rutin</b></div>
                <div class="fd-form__row">
                    <div class="fd-field"><label for="fd-tgl">Tanggal donasi setiap bulan</label>
                        <div class="fd-input"><svg class="fd-ico"><use href="#fd-i-calendar"/></svg>
                            <select id="fd-tgl" name="tanggal" data-label="Tanggal donasi">@foreach ([1, 5, 10, 15, 20, 25, 28] as $t)<option value="Setiap tanggal {{ $t }}" @selected($t === 5)>Setiap tanggal {{ $t }}</option>@endforeach</select>
                        </div>
                    </div>
                    <fieldset class="fd-field"><legend class="fd-lbl">Durasi</legend>
                        <div class="fd-amounts fd-amounts--sm">
                            @foreach (['3 bulan', '6 bulan', '12 bulan', 'Sampai dihentikan'] as $k => $d)
                                <label class="fd-amount"><input type="radio" name="durasi" value="{{ $d }}" data-label="Durasi" @checked($k === 2)><span>{{ $d }}</span></label>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            </div>

            {{-- Barang --}}
            <div class="fd-step fd-dyn" data-fd-for="barang" hidden>
                <div class="fd-step--plain"><span class="fd-step__n">2</span><b>Detail barang</b></div>
                <fieldset class="fd-field"><legend class="fd-lbl">Jenis barang</legend>
                    <div class="fd-amounts fd-amounts--sm">
                        @foreach (['Buku & alat tulis', 'Pakaian layak', 'Alat kesehatan', 'Kebutuhan pokok', 'Lainnya'] as $k => $d)
                            <label class="fd-amount"><input type="radio" name="barang" value="{{ $d }}" data-label="Jenis barang" @checked($k === 0)><span>{{ $d }}</span></label>
                        @endforeach
                    </div>
                </fieldset>
                <div class="fd-field"><label for="fd-rincian">Jumlah &amp; rincian barang <i>*</i></label><div class="fd-input fd-input--area"><svg class="fd-ico"><use href="#fd-i-tag"/></svg><textarea id="fd-rincian" name="rincian" data-label="Rincian barang" required placeholder="Contoh: 40 buku cerita anak, kondisi baik"></textarea></div><span class="fd-err">Tuliskan jumlah dan rincian barang.</span></div>
                <div class="fd-form__row">
                    <fieldset class="fd-field"><legend class="fd-lbl">Cara penyaluran</legend>
                        <div class="fd-amounts fd-amounts--sm">
                            <label class="fd-amount"><input type="radio" name="metode" value="Dijemput tim yayasan" data-label="Penyaluran" checked><span>Dijemput tim</span></label>
                            <label class="fd-amount"><input type="radio" name="metode" value="Diantar sendiri" data-label="Penyaluran"><span>Diantar sendiri</span></label>
                        </div>
                    </fieldset>
                    <div class="fd-field"><label for="fd-lokasi">Kota / alamat <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-pin"/></svg><input id="fd-lokasi" name="lokasi" data-label="Kota / alamat" required placeholder="Kota atau alamat lengkap"></div><span class="fd-err">Kota atau alamat wajib diisi.</span></div>
                </div>
            </div>

            {{-- Sekarang · Rutin · Program: arahkan ke program --}}
            <div class="fd-field fd-step fd-dyn" data-fd-for="sekarang rutin program">
                <label for="fd-program"><span class="fd-step__n" data-fd-prog-n>3</span><span data-fd-prog-title>Arahkan ke program</span></label>
                <div class="fd-input"><svg class="fd-ico"><use href="#fd-i-grid"/></svg>
                    <select id="fd-program" name="program" data-label="Program">
                        @foreach ($fd['donation']['programs'] as $p)<option>{{ $p }}</option>@endforeach
                    </select>
                </div>
            </div>

            <div class="fd-step fd-step--plain"><span class="fd-step__n" data-fd-data-n>4</span><b>Data Anda</b></div>
            <div class="fd-form__row">
                <div class="fd-field"><label for="fd-nama">Nama lengkap <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-user"/></svg><input id="fd-nama" name="nama" data-label="Nama" required autocomplete="name" placeholder="Nama Anda"></div><span class="fd-err">Nama wajib diisi.</span></div>
                <div class="fd-field"><label for="fd-hp">Nomor WhatsApp <i>*</i></label><div class="fd-input"><svg class="fd-ico"><use href="#fd-i-phone"/></svg><input id="fd-hp" name="whatsapp" data-label="WhatsApp" type="tel" required autocomplete="tel" placeholder="08xxxxxxxxxx"></div><span class="fd-err">Masukkan nomor yang valid.</span></div>
            </div>
            <div class="fd-field"><label for="fd-pesan">Pesan / doa <small>(opsional)</small></label><div class="fd-input fd-input--area"><svg class="fd-ico"><use href="#fd-i-message"/></svg><textarea id="fd-pesan" name="pesan" data-label="Pesan" placeholder="Tulis pesan atau doa Anda…"></textarea></div></div>

            <div class="fd-summary" aria-live="polite">
                <span class="fd-summary__ico"><svg class="fd-ico"><use href="#fd-i-circle-check"/></svg></span>
                <div><small>Ringkasan donasi</small><b data-fd-summary>Donasi Sekarang · Rp 100.000</b></div>
            </div>
            <button class="fd-btn fd-btn--gold fd-btn--lg fd-btn--block" type="submit"><svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg>Lanjutkan via WhatsApp</button>
            <p class="fd-ok" data-fd-form-ok hidden><svg class="fd-ico"><use href="#fd-i-circle-check"/></svg>Terima kasih! Jendela WhatsApp akan terbuka dengan data donasi Anda.</p>
            <p class="fd-note"><svg class="fd-ico"><use href="#fd-i-lock"/></svg>Data tidak disimpan di situs ini; pesan dikirim langsung ke WhatsApp tim kami.</p>
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
