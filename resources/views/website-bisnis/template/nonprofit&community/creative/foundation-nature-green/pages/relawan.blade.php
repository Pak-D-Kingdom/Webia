{{-- Halaman Pendaftaran Relawan --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap fh-split">
        <div class="fh-reveal">
            <figure class="fh-figure">
                <img src="{{ $img('volunteer-hands.jpg') }}" alt="Tangan para relawan bertumpuk menjadi satu" width="418" height="288" loading="lazy">
            </figure>
            <div class="fh-sec__head fh-sec__head--left">
                <h2>Mengapa Menjadi Relawan</h2>
                <p>{{ $cfg['volunteer']['text'] }}</p>
            </div>
            <ul class="fh-principles">
                @foreach ($cfg['volunteer']['benefits'] as $b)
                    <li>
                        <span class="fh-panel__ic">{{ $icon(['leaf', 'users', 'shield'][$loop->index] ?? 'leaf') }}</span>
                        <div><h3>{{ $b['title'] }}</h3><p>{{ $b['text'] }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>

        <form class="fh-form fh-panel fh-reveal" id="formulir" data-fh-wa-form data-wa-title="Halo GreenHope, saya ingin mendaftar sebagai relawan:">
            <h2>Formulir Relawan</h2>
            <div class="fh-field">
                <label for="rlw-nama">Nama lengkap</label>
                <input id="rlw-nama" name="nama" type="text" required maxlength="80" autocomplete="name" data-label="Nama">
            </div>
            <div class="fh-field-row">
                <div class="fh-field">
                    <label for="rlw-wa">Nomor WhatsApp</label>
                    <input id="rlw-wa" name="wa" type="tel" required inputmode="tel" pattern="[0-9+\s\-]{8,16}" maxlength="16" autocomplete="tel" placeholder="08xxxxxxxxxx" data-label="WhatsApp">
                </div>
                <div class="fh-field">
                    <label for="rlw-kota">Kota domisili</label>
                    <input id="rlw-kota" name="kota" type="text" required maxlength="60" autocomplete="address-level2" data-label="Kota">
                </div>
            </div>
            <div class="fh-field">
                <label for="rlw-email">Email (opsional)</label>
                <input id="rlw-email" name="email" type="email" maxlength="100" autocomplete="email" data-label="Email">
            </div>
            <div class="fh-field-row">
                <div class="fh-field">
                    <label for="rlw-minat">Bidang yang diminati</label>
                    <select id="rlw-minat" name="minat" data-label="Minat">
                        @foreach ($cfg['volunteer']['interests'] as $i)
                            <option>{{ $i }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="fh-field">
                    <label for="rlw-waktu">Ketersediaan waktu</label>
                    <select id="rlw-waktu" name="waktu" data-label="Waktu">
                        @foreach ($cfg['volunteer']['availability'] as $a)
                            <option>{{ $a }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="fh-field">
                <label for="rlw-motivasi">Mengapa ingin bergabung?</label>
                <textarea id="rlw-motivasi" name="motivasi" rows="4" maxlength="400" data-label="Motivasi"></textarea>
            </div>
            <label class="fh-check">
                <input type="checkbox" required>
                <span>Saya bersedia dihubungi tim GreenHope melalui WhatsApp.</span>
            </label>
            <button class="fh-btn fh-btn--dark" type="submit">{{ $icon('whatsapp') }}Daftar via WhatsApp</button>
        </form>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <h2>Alur Pendaftaran</h2>
            <p>Dari mengisi formulir sampai turun ke lapangan.</p>
        </div>
        <ol class="fh-steps">
            @foreach ($cfg['volunteer']['steps'] as $s)
                <li class="fh-reveal"><span class="fh-steps__n">{{ $loop->iteration }}</span><h3>{{ $s['title'] }}</h3><p>{{ $s['text'] }}</p></li>
            @endforeach
        </ol>
    </div>
</section>
