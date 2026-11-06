<section class="rf-section">
    <div class="rf-container rf-formgrid">
        <form class="rf-card rf-form" data-rf-wa-form="order" novalidate>
            <h2>Form Custom Order</h2>
            <p class="rf-form__lead">Ceritakan furniture impian Anda. Data akan dikirim ke tim kami lewat WhatsApp.</p>

            <div class="rf-form__row">
                <label class="rf-field">Nama lengkap *<input type="text" name="nama" required autocomplete="name"></label>
                <label class="rf-field">Nomor WhatsApp *<input type="tel" name="wa" required inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx"></label>
            </div>
            <div class="rf-form__row">
                <label class="rf-field">Email<input type="email" name="email" autocomplete="email"></label>
                <label class="rf-field">Kota pengiriman *<input type="text" name="kota" required autocomplete="address-level2"></label>
            </div>
            <div class="rf-form__row">
                <label class="rf-field">Jenis furniture *
                    <select name="jenis" required>
                        <option value="">Pilih jenis</option>
                        @foreach ($f['custom']['models'] as $m)<option>{{ $m['label'] }}</option>@endforeach
                    </select>
                </label>
                <label class="rf-field">Jumlah *<input type="number" name="jumlah" min="1" value="1" required inputmode="numeric"></label>
            </div>
            <div class="rf-form__row rf-form__row--3">
                <label class="rf-field">Panjang (cm)<input type="number" name="p" min="1" inputmode="numeric"></label>
                <label class="rf-field">Lebar (cm)<input type="number" name="l" min="1" inputmode="numeric"></label>
                <label class="rf-field">Tinggi (cm)<input type="number" name="t" min="1" inputmode="numeric"></label>
            </div>
            <div class="rf-form__row">
                <label class="rf-field">Material
                    <select name="material"><option value="">Belum menentukan</option>@foreach ($f['materials'] as $m)<option>{{ $m['name'] }}</option>@endforeach</select>
                </label>
                <label class="rf-field">Finishing
                    <select name="finishing"><option value="">Belum menentukan</option>@foreach ($f['finishings'] as $m)<option>{{ $m['name'] }}</option>@endforeach</select>
                </label>
            </div>
            <div class="rf-form__row">
                <label class="rf-field">Dibutuhkan sebelum<input type="date" name="tanggal"></label>
                <label class="rf-field">Perkiraan anggaran
                    <select name="budget"><option value="">Belum menentukan</option>@foreach ($f['quotation']['budget'] as $b)<option>{{ $b }}</option>@endforeach</select>
                </label>
            </div>
            <label class="rf-field">Catatan & detail desain<textarea name="catatan" rows="4" placeholder="Ceritakan gaya, fungsi, atau referensi yang Anda inginkan..."></textarea></label>
            <label class="rf-field rf-file">Foto / sketsa referensi
                <input type="file" name="referensi" accept="image/*,.pdf" multiple data-rf-file>
                <span>{!! $icon('upload') !!} <em data-rf-file-label>Pilih file</em></span>
                <small>Berkas dilampirkan manual di chat WhatsApp setelah formulir terkirim.</small>
            </label>

            <p class="rf-form__error" data-rf-form-error role="alert" hidden></p>
            <button class="rf-btn rf-btn--solid rf-btn--lg" type="submit">{!! $icon('whatsapp') !!} Kirim via WhatsApp</button>
        </form>

        <aside class="rf-card rf-aside">
            <span class="rf-icondisc">{!! $icon('house') !!}</span>
            <h2>Cara kerjanya</h2>
            <ol class="rf-steps">
                <li>Isi formulir dan kirim lewat WhatsApp.</li>
                <li>Tim kami menghubungi Anda untuk memastikan detail.</li>
                <li>Gambar kerja dan penawaran dikirim untuk disetujui.</li>
                <li>Produksi dimulai setelah uang muka diterima.</li>
            </ol>
            <a class="rf-btn rf-btn--ghost" href="{{ $r('lead-time') }}">Lihat estimasi waktu {!! $icon('arrow-right') !!}</a>
        </aside>
    </div>
</section>
