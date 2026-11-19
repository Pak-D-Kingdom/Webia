@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Persyaratan Pendaftaran — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'PENDAFTARAN', 'title' => 'Persyaratan Pendaftaran', 'desc' => 'Siapkan dokumen yang dibutuhkan untuk kelancaran proses pendaftaran Anda.', 'bg' => 'hero.svg', 'chips' => ['Dokumen mudah disiapkan', 'Pendaftaran via WhatsApp', 'Konsultasi gratis']])

<section class="uh-section">
    <div class="uh-container">
        <div class="uh-reqgrid">
            @foreach ($d['requirements'] as $i => $q)
                <article class="uh-req" data-reveal style="--d:{{ ($i % 3) * .07 }}s">
                    <span class="uh-req__ico"><svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $q[0] }}"/></svg></span>
                    <h3>{{ $q[1] }}</h3>
                    <p>{{ $q[2] }}</p>
                </article>
            @endforeach
        </div>

        <div class="uh-secthead" data-reveal>
            <small>Alur Pendaftaran</small>
            <h2>Langkah Pendaftaran</h2>
            <p>Empat langkah mudah menuju Tanah Suci.</p>
            <i class="uh-orn"></i>
        </div>
        <ol class="uh-steps uh-steps--4">
            @foreach ($d['register_steps'] as $i => $s)
                <li data-reveal style="--d:{{ $i * .07 }}s"><span class="uh-steps__n">{{ $i + 1 }}</span><h3>{{ $s[0] }}</h3><p>{{ $s[1] }}</p></li>
            @endforeach
        </ol>

        <div class="uh-secthead" id="form-pendaftaran" data-reveal>
            <small>Formulir Pendaftaran</small>
            <h2>Daftar Sekarang</h2>
            <p>Isi data singkat di bawah ini. Pesan Anda akan terkirim langsung ke WhatsApp tim kami.</p>
            <i class="uh-orn"></i>
        </div>

        <div class="uh-form" data-reveal>
            <aside class="uh-form__aside">
                <img class="uh-form__bot" src="{{ $img('bot.svg') }}" alt="" loading="lazy">
                <h3>Dibantu langsung oleh tim kami</h3>
                <ul>
                    <li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>Konsultasi gratis tanpa komitmen</li>
                    <li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>Respon cepat di jam operasional</li>
                    <li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>Bantuan dokumen hingga visa</li>
                </ul>
                <a class="uh-form__tel" href="{{ $wa($d['contact']['wa_text']) }}" target="_blank" rel="noopener"><svg class="uh-ico" aria-hidden="true"><use href="#i-whatsapp"/></svg><span><small>WhatsApp</small>{{ $d['contact']['phone'] }}</span></a>
                <p class="uh-form__hours">{{ $d['contact']['hours'] }}</p>
            </aside>

            <form class="uh-form__main" data-wa-form action="{{ $wa() }}" method="get" target="_blank" rel="noopener" novalidate>
                <input type="hidden" name="text" value="" data-wa-text>

                <div class="uh-field">
                    <label for="f-nama">Nama Lengkap <b>*</b></label>
                    <input id="f-nama" type="text" data-field="nama" autocomplete="name" placeholder="Sesuai paspor / KTP" maxlength="80">
                    <small class="uh-field__err" hidden>Isi nama lengkap (minimal 3 karakter).</small>
                </div>
                <div class="uh-field">
                    <label for="f-hp">No. WhatsApp <b>*</b></label>
                    <input id="f-hp" type="tel" inputmode="tel" data-field="hp" autocomplete="tel" placeholder="Contoh: 08xx xxxx xxxx" maxlength="20">
                    <small class="uh-field__err" hidden>Isi nomor WhatsApp yang valid (9–15 angka).</small>
                </div>
                <div class="uh-field">
                    <span class="uh-label" id="lbl-paket">Pilihan Paket <b>*</b></span>
                    <div class="uh-select" data-select>
                        <button type="button" class="uh-select__btn" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="lbl-paket"><span class="uh-select__label is-placeholder">Pilih paket</span><svg class="uh-ico uh-select__caret" aria-hidden="true"><use href="#i-caret"/></svg></button>
                        <input type="hidden" data-field="paket" value="">
                        <ul class="uh-select__menu" role="listbox" aria-labelledby="lbl-paket">
                            <li role="option" tabindex="-1" aria-selected="true" data-value="" data-label="Pilih paket" data-placeholder="1"><span>Pilih paket</span><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                            @foreach ($d['packages'] as $p)
                                <li role="option" tabindex="-1" aria-selected="false" data-value="{{ $p['name'] }}" data-label="{{ $p['name'] }}"><span>{{ $p['name'] }}</span><small>{{ $rp($p['price']) }}</small><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                            @endforeach
                        </ul>
                    </div>
                    <small class="uh-field__err" hidden>Pilih salah satu paket.</small>
                </div>
                <div class="uh-field">
                    <span class="uh-label" id="lbl-jadwal">Jadwal Keberangkatan</span>
                    <div class="uh-select" data-select>
                        <button type="button" class="uh-select__btn" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="lbl-jadwal"><span class="uh-select__label is-placeholder">Belum menentukan</span><svg class="uh-ico uh-select__caret" aria-hidden="true"><use href="#i-caret"/></svg></button>
                        <input type="hidden" data-field="jadwal" value="">
                        <ul class="uh-select__menu" role="listbox" aria-labelledby="lbl-jadwal">
                            <li role="option" tabindex="-1" aria-selected="true" data-value="" data-label="Belum menentukan" data-placeholder="1"><span>Belum menentukan</span><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                            @foreach ($d['schedules'] as $sc)
                                @if ($sc['status'] !== 'Penuh')
                                    <li role="option" tabindex="-1" aria-selected="false" data-value="{{ $sc['date'] }} — {{ $sc['pkg'] }}" data-label="{{ $sc['date'] }}"><span>{{ $sc['date'] }}</span><small>{{ $sc['pkg'] }}</small><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="uh-field">
                    <label for="f-jml">Jumlah Jamaah</label>
                    <input id="f-jml" type="number" data-field="jumlah" min="1" max="50" value="1" inputmode="numeric">
                </div>
                <div class="uh-field uh-field--wide">
                    <label for="f-cat">Catatan (opsional)</label>
                    <textarea id="f-cat" data-field="catatan" rows="3" maxlength="300" placeholder="Contoh: berangkat bersama orang tua, butuh kursi roda, dll."></textarea>
                </div>

                <div class="uh-form__foot">
                    <button type="submit" class="uh-btn uh-btn--gold uh-btn--lg"><svg class="uh-ico" aria-hidden="true"><use href="#i-whatsapp"/></svg>Kirim via WhatsApp</button>
                    <p>Pesan dikirim ke WhatsApp {{ $d['contact']['phone'] }}. Anda tetap bisa mengubahnya sebelum menekan kirim di WhatsApp.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
