@extends($v.'.layouts.app')

@section('title', 'Pilihan Donasi - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-donation')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Donasi', 'title' => 'Pilihan Donasi', 'lead' => $f['donation']['subtitle'], 'eyebrow' => 'Berbagi kebaikan', 'image' => 'kids-center.jpg', 'alt' => 'Anak-anak tersenyum bahagia', 'cta_label' => 'Isi Form Donasi', 'cta_href' => '#form-donasi', 'chip_a_value' => 'Rp 25rb', 'chip_a_label' => 'Mulai dari', 'chip_b_value' => '82%', 'chip_b_label' => 'Dana ke program'])

    <div class="hf-container hf-page">
        <section class="hf-section hf-section--tight" data-reveal>
            <ul class="hf-grid hf-grid--4 hf-donoptions" data-stagger>
                @foreach($f['donation']['options'] as $o)
                    <li class="hf-card hf-card--pad hf-donoption" id="{{ $o['key'] }}">
                        <svg class="hf-art hf-art--lg" viewBox="0 0 48 48" aria-hidden="true"><use href="#{{ $o['icon'] }}"/></svg>
                        <h2 class="hf-h3">{{ $o['title'] }} <small>{{ $o['sub'] }}</small></h2>
                        <p>{{ $o['text'] }}</p>
                        <button class="hf-btn hf-btn--ghost hf-btn--sm" type="button" data-donation-type="{{ $o['key'] }}">Pilih jenis ini</button>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="hf-split hf-split--form" data-reveal>
            <form class="hf-card hf-card--pad hf-form" id="form-donasi" data-wa-form="donasi" data-wa="{{ $f['contact']['whatsapp'] }}" novalidate>
                <h2 class="hf-h2">Form donasi</h2>
                <p class="hf-form__note">Isi data singkat, lalu lanjutkan konfirmasi lewat WhatsApp. Kami akan mengirimkan detail pembayaran.</p>

                <div class="hf-field">
                    <label for="don-type">Jenis donasi</label>
                    <select id="don-type" name="type" class="hf-select" data-label="Jenis donasi" required>
                        @foreach($f['donation']['options'] as $o)
                            <option value="{{ $o['key'] }}">{{ $o['title'] }} {{ $o['sub'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="hf-field" data-amount-field>
                    <label for="don-amount">Nominal donasi (Rp)</label>
                    <div class="hf-chips">
                        @foreach($f['donation']['amounts'] as $a)
                            <button class="hf-chip hf-chip--amt" type="button" data-amount="{{ $a }}">Rp {{ number_format($a, 0, ',', '.') }}</button>
                        @endforeach
                    </div>
                    <div class="hf-input hf-input--money"><span class="hf-input__prefix" aria-hidden="true">Rp</span><input id="don-amount" name="amount" inputmode="numeric" placeholder="Atau tulis nominal lain" data-label="Nominal" data-money></div>
                    <small class="hf-field__error" data-error></small>
                </div>

                <div class="hf-field">
                    <label for="don-program">Program tujuan</label>
                    <select id="don-program" name="program" class="hf-select" data-label="Program tujuan">
                        <option value="Program yang paling membutuhkan">Program yang paling membutuhkan</option>
                        @foreach($f['programs']['items'] as $p)
                            <option value="{{ $p['title'] }}">{{ $p['title'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="hf-fieldrow">
                    <div class="hf-field">
                        <label for="don-name">Nama lengkap</label>
                        <div class="hf-input"><svg class="hf-i" aria-hidden="true"><use href="#i-user"/></svg><input id="don-name" name="name" autocomplete="name" placeholder="Nama Anda" data-label="Nama" required></div>
                        <small class="hf-field__error" data-error></small>
                    </div>
                    <div class="hf-field">
                        <label for="don-phone">Nomor WhatsApp</label>
                        <div class="hf-input"><svg class="hf-i" aria-hidden="true"><use href="#i-phone"/></svg><input id="don-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" data-label="WhatsApp" required></div>
                        <small class="hf-field__error" data-error></small>
                    </div>
                </div>

                <div class="hf-field">
                    <label for="don-note">Pesan (opsional)</label>
                    <textarea id="don-note" name="note" rows="3" data-label="Pesan"></textarea>
                </div>

                <button class="hf-btn hf-btn--dark hf-btn--lg" type="submit"><svg class="hf-i hf-i--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg> Lanjutkan via WhatsApp</button>
            </form>

            <aside class="hf-stack">
                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Cara berdonasi</h2>
                    <ol class="hf-steps">
                        @foreach($f['donation']['steps'] as $s)
                            <li><span class="hf-steps__num">{{ $loop->iteration }}</span><div><strong>{{ $s['title'] }}</strong><p>{{ $s['text'] }}</p></div></li>
                        @endforeach
                    </ol>
                </div>
                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Metode pembayaran</h2>
                    <ul class="hf-tags">
                        @foreach($f['donation']['methods'] as $m)
                            <li>{{ $m }}</li>
                        @endforeach
                    </ul>
                    <p class="hf-form__note">Detail rekening dan kode pembayaran dikirim oleh tim kami setelah konfirmasi.</p>
                </div>
            </aside>
        </section>
    </div>
@endsection
