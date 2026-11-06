@extends($v.'.layouts.app')

@section('title', 'Daftar Relawan - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-volunteer')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Relawan', 'title' => 'Daftar Relawan', 'lead' => $f['volunteer']['summary']])

    <div class="hf-container hf-page">
        <section class="hf-split hf-split--form" data-reveal>
            <aside class="hf-stack">
                <div class="hf-media hf-media--volunteer">
                    <img src="{{ asset($img.'/volunteer-hands.jpg') }}" width="600" height="438" alt="Tangan-tangan relawan bertumpuk menandakan kebersamaan" loading="lazy">
                </div>
                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Yang Anda dapatkan</h2>
                    <ul class="hf-checklist">
                        @foreach($f['volunteer']['benefits'] as $b)
                            <li><svg class="hf-i" aria-hidden="true"><use href="#i-check"/></svg><span><strong>{{ $b['title'] }}.</strong> {{ $b['text'] }}</span></li>
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

            <form class="hf-card hf-card--pad hf-form" id="form-relawan" data-wa-form="relawan" data-wa="{{ $f['contact']['whatsapp'] }}" novalidate>
                <h2 class="hf-h2">Formulir pendaftaran relawan</h2>
                <p class="hf-form__note">Setelah mengirim, kami akan menghubungi Anda melalui WhatsApp.</p>

                <div class="hf-fieldrow">
                    <div class="hf-field">
                        <label for="vol-name">Nama lengkap</label>
                        <input id="vol-name" name="name" autocomplete="name" data-label="Nama" required>
                        <small class="hf-field__error" data-error></small>
                    </div>
                    <div class="hf-field">
                        <label for="vol-phone">Nomor WhatsApp</label>
                        <input id="vol-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" data-label="WhatsApp" required>
                        <small class="hf-field__error" data-error></small>
                    </div>
                </div>

                <div class="hf-fieldrow">
                    <div class="hf-field">
                        <label for="vol-email">Email</label>
                        <input id="vol-email" name="email" type="email" autocomplete="email" data-label="Email" required>
                        <small class="hf-field__error" data-error></small>
                    </div>
                    <div class="hf-field">
                        <label for="vol-city">Kota domisili</label>
                        <input id="vol-city" name="city" autocomplete="address-level2" data-label="Kota" required>
                        <small class="hf-field__error" data-error></small>
                    </div>
                </div>

                <div class="hf-fieldrow">
                    <div class="hf-field">
                        <label for="vol-area">Bidang yang diminati</label>
                        <select id="vol-area" name="area" data-label="Bidang">
                            @foreach($f['volunteer']['areas'] as $a)
                                <option value="{{ $a }}">{{ $a }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hf-field">
                        <label for="vol-time">Ketersediaan waktu</label>
                        <select id="vol-time" name="time" data-label="Ketersediaan">
                            @foreach($f['volunteer']['availability'] as $a)
                                <option value="{{ $a }}">{{ $a }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="hf-field">
                    <label for="vol-why">Mengapa ingin menjadi relawan?</label>
                    <textarea id="vol-why" name="why" rows="4" data-label="Motivasi"></textarea>
                </div>

                <button class="hf-btn hf-btn--dark hf-btn--lg" type="submit"><svg class="hf-i hf-i--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim Pendaftaran</button>
            </form>
        </section>
    </div>
@endsection
