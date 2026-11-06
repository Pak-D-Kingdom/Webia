@extends($v.'.layouts.app')

@section('title', 'Daftar Relawan - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-volunteer')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Relawan', 'title' => 'Daftar Relawan', 'lead' => $f['volunteer']['summary'], 'eyebrow' => 'Jadi bagian dari kebaikan', 'image' => 'kids-left.jpg', 'alt' => 'Dua anak tertawa bahagia', 'cta_label' => 'Isi Formulir', 'cta_href' => '#form-relawan', 'chip_a_value' => '3.200+', 'chip_a_label' => 'Relawan aktif', 'chip_b_value' => '6', 'chip_b_label' => 'Bidang kegiatan'])

    <div class="hf-container hf-page">
        <section class="hf-split hf-split--form" data-reveal>
            <aside class="hf-stack hf-vol__aside">
                <figure class="hf-vol__photo">
                    <img src="{{ asset($img.'/volunteer-page.jpg') }}" width="910" height="600" alt="Tangan-tangan relawan bertumpuk menandakan kebersamaan" loading="lazy">
                    <span class="hf-vol__badge"><strong>3.200+</strong> relawan aktif</span>
                    <figcaption>
                        <svg class="hf-i" aria-hidden="true"><use href="#i-heart"/></svg>
                        <span>Satu tangan membantu, banyak tangan mengubah.</span>
                    </figcaption>
                </figure>

                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Yang Anda dapatkan</h2>
                    <ul class="hf-perks">
                        @foreach($f['volunteer']['benefits'] as $b)
                            <li>
                                <span class="hf-perks__icon"><svg class="hf-i" aria-hidden="true"><use href="#i-sparkle"/></svg></span>
                                <div><strong>{{ $b['title'] }}</strong><p>{{ $b['text'] }}</p></div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Alur pendaftaran</h2>
                    <ol class="hf-steps">
                        @foreach($f['volunteer']['steps'] as $s)
                            <li><span class="hf-steps__num">{{ $loop->iteration }}</span><div><strong>{{ $s['title'] }}</strong><p>{{ $s['text'] }}</p></div></li>
                        @endforeach
                    </ol>
                </div>
            </aside>

            <form class="hf-card hf-form hf-form--vol" id="form-relawan" data-wa-form="relawan" data-wa="{{ $f['contact']['whatsapp'] }}" novalidate>
                <header class="hf-form__head">
                    <svg class="hf-art hf-art--lg" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-people"/></svg>
                    <div>
                        <h2 class="hf-h2">Formulir pendaftaran relawan</h2>
                        <p class="hf-form__note">Hanya butuh sekitar 2 menit. Setelah mengirim, kami menghubungi Anda melalui WhatsApp.</p>
                    </div>
                </header>

                <fieldset class="hf-fieldset">
                    <legend><span>1</span> Data diri</legend>
                    <div class="hf-fieldrow">
                        <div class="hf-field">
                            <label for="vol-name">Nama lengkap</label>
                            <div class="hf-input"><svg class="hf-i" aria-hidden="true"><use href="#i-user"/></svg><input id="vol-name" name="name" autocomplete="name" placeholder="Nama sesuai identitas" data-label="Nama" required></div>
                            <small class="hf-field__error" data-error></small>
                        </div>
                        <div class="hf-field">
                            <label for="vol-phone">Nomor WhatsApp</label>
                            <div class="hf-input"><svg class="hf-i" aria-hidden="true"><use href="#i-phone"/></svg><input id="vol-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" data-label="WhatsApp" required></div>
                            <small class="hf-field__error" data-error></small>
                        </div>
                    </div>
                    <div class="hf-fieldrow">
                        <div class="hf-field">
                            <label for="vol-email">Email</label>
                            <div class="hf-input"><svg class="hf-i" aria-hidden="true"><use href="#i-mail"/></svg><input id="vol-email" name="email" type="email" autocomplete="email" placeholder="nama@email.com" data-label="Email" required></div>
                            <small class="hf-field__error" data-error></small>
                        </div>
                        <div class="hf-field">
                            <label for="vol-city">Kota domisili</label>
                            <div class="hf-input"><svg class="hf-i" aria-hidden="true"><use href="#i-pin"/></svg><input id="vol-city" name="city" autocomplete="address-level2" placeholder="Contoh: Surabaya" data-label="Kota" required></div>
                            <small class="hf-field__error" data-error></small>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="hf-fieldset">
                    <legend><span>2</span> Minat dan waktu</legend>
                    <div class="hf-fieldrow">
                        <div class="hf-field">
                            <label for="vol-area">Bidang yang diminati</label>
                            <select id="vol-area" name="area" class="hf-select" data-label="Bidang">
                                @foreach($f['volunteer']['areas'] as $a)
                                    <option value="{{ $a }}">{{ $a }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="hf-field">
                            <label for="vol-time">Ketersediaan waktu</label>
                            <select id="vol-time" name="time" class="hf-select" data-label="Ketersediaan">
                                @foreach($f['volunteer']['availability'] as $a)
                                    <option value="{{ $a }}">{{ $a }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="hf-fieldset">
                    <legend><span>3</span> Motivasi</legend>
                    <div class="hf-field">
                        <label for="vol-why">Mengapa ingin menjadi relawan? <em>(opsional)</em></label>
                        <textarea id="vol-why" name="why" rows="4" maxlength="300" placeholder="Ceritakan singkat alasan dan pengalaman Anda..." data-label="Motivasi" data-count-target="vol-why-count"></textarea>
                        <span class="hf-counter" id="vol-why-count">0/300</span>
                    </div>
                </fieldset>

                <p class="hf-form__privacy"><svg class="hf-i" aria-hidden="true"><use href="#i-lock"/></svg> Data Anda hanya dipakai untuk keperluan pendaftaran relawan.</p>
                <button class="hf-btn hf-btn--dark hf-btn--lg hf-form__submit" type="submit"><svg class="hf-i hf-i--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim Pendaftaran</button>
            </form>
        </section>
    </div>
@endsection
