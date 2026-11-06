{{-- Halaman Mitra & Sponsor --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <h2>Mitra Kami</h2>
            <p>Terima kasih kepada para mitra yang bergerak bersama kami.</p>
        </div>
        <ul class="fh-partners">
            @foreach ($cfg['partners']['list'] as $p)
                <li class="fh-panel fh-reveal">
                    <div class="fh-partners__logo"><img src="{{ $img($p['logo']) }}" alt="{{ $p['name'] }}" width="148" height="84" loading="lazy"></div>
                    <span class="fh-tag">{{ $p['field'] }}</span>
                    <p>{{ $p['text'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <h2>Mengapa Bermitra dengan GreenHope</h2>
            <p>Kerja sama yang jelas tujuannya, terukur hasilnya.</p>
        </div>
        <ul class="fh-grid fh-grid--3">
            @foreach ($cfg['partners']['benefits'] as $b)
                <li class="fh-panel fh-reveal">
                    <span class="fh-panel__ic">{{ $icon(['sparkle', 'leaf', 'users'][$loop->index] ?? 'leaf') }}</span>
                    <h3>{{ $b['title'] }}</h3>
                    <p>{{ $b['text'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<section class="fh-sec">
    <div class="fh-wrap fh-split fh-split--even">
        <div class="fh-reveal">
            <div class="fh-sec__head fh-sec__head--left">
                <h2>Cara Bermitra</h2>
                <p>Tiga langkah untuk memulai kerja sama.</p>
            </div>
            <ol class="fh-steps fh-steps--col">
                @foreach ($cfg['partners']['steps'] as $s)
                    <li><span class="fh-steps__n">{{ $loop->iteration }}</span><div><h3>{{ $s['title'] }}</h3><p>{{ $s['text'] }}</p></div></li>
                @endforeach
            </ol>
        </div>
        <form class="fh-form fh-panel fh-reveal" data-fh-wa-form data-wa-title="Halo GreenHope, kami tertarik bermitra / menjadi sponsor:">
            <h3>Ajukan kemitraan</h3>
            <div class="fh-field">
                <label for="mtr-org">Nama perusahaan / organisasi</label>
                <input id="mtr-org" name="organisasi" type="text" required maxlength="100" autocomplete="organization" data-label="Organisasi">
            </div>
            <div class="fh-field">
                <label for="mtr-nama">Nama kontak</label>
                <input id="mtr-nama" name="nama" type="text" required maxlength="80" autocomplete="name" data-label="Kontak">
            </div>
            <div class="fh-field">
                <label for="mtr-minat">Bidang yang diminati</label>
                <select id="mtr-minat" name="minat" data-label="Minat program">
                    @foreach ($cfg['programs'] as $p)
                        <option>{{ $p['title'] }}</option>
                    @endforeach
                    <option>Belum menentukan</option>
                </select>
            </div>
            <div class="fh-field">
                <label for="mtr-pesan">Pesan</label>
                <textarea id="mtr-pesan" name="pesan" rows="3" maxlength="400" data-label="Pesan"></textarea>
            </div>
            <button class="fh-btn fh-btn--dark" type="submit">{{ $icon('whatsapp') }}Kirim via WhatsApp</button>
        </form>
    </div>
</section>
