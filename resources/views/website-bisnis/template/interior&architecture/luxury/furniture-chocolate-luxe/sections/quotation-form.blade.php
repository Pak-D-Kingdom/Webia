@php
    $f = $furniture;
    $q = $f['quotation'];
@endphp
<section class="lf-section">
    <div class="lf-container lf-formgrid">
        <form class="lf-form lf-card--paper" data-wa-form="quotation" novalidate>
            <h2 class="lf-form__title lf-serif">Data Proyek</h2>
            <p class="lf-form__lead">Isi kebutuhan Anda, tim kami akan mengirim rincian penawaran melalui WhatsApp.</p>

            <div class="lf-fields">
                <div class="lf-field">
                    <label for="q-nama">Nama lengkap</label>
                    <input id="q-nama" name="nama" data-label="Nama" type="text" autocomplete="name" required>
                </div>
                <div class="lf-field">
                    <label for="q-instansi">Perusahaan / instansi <span>(opsional)</span></label>
                    <input id="q-instansi" name="instansi" data-label="Perusahaan" type="text" autocomplete="organization">
                </div>
                <div class="lf-field">
                    <label for="q-wa">Nomor WhatsApp</label>
                    <input id="q-wa" name="whatsapp" data-label="WhatsApp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required>
                </div>
                <div class="lf-field">
                    <label for="q-email">Email <span>(opsional)</span></label>
                    <input id="q-email" name="email" data-label="Email" type="email" autocomplete="email">
                </div>
                <div class="lf-field">
                    <label for="q-proyek">Jenis proyek</label>
                    <select id="q-proyek" name="proyek" data-label="Jenis proyek" required>
                        <option value="">Pilih jenis proyek</option>
                        @foreach ($q['project_types'] as $opt)<option>{{ $opt }}</option>@endforeach
                    </select>
                </div>
                <div class="lf-field">
                    <label for="q-lokasi">Lokasi proyek</label>
                    <input id="q-lokasi" name="lokasi" data-label="Lokasi" type="text" autocomplete="address-level2" required>
                </div>
                <fieldset class="lf-field lf-field--full">
                    <legend>Produk yang dibutuhkan</legend>
                    <div class="lf-checkgrid">
                        @foreach ($f['catalog']['categories'] as $cat)
                            <label class="lf-check"><input type="checkbox" name="produk" value="{{ $cat['name'] }}" data-label="Produk"><span>{{ $cat['name'] }}</span></label>
                        @endforeach
                    </div>
                </fieldset>
                <div class="lf-field">
                    <label for="q-budget">Perkiraan anggaran</label>
                    <select id="q-budget" name="anggaran" data-label="Anggaran">
                        <option value="">Belum menentukan</option>
                        @foreach ($q['budgets'] as $opt)<option>{{ $opt }}</option>@endforeach
                    </select>
                </div>
                <div class="lf-field">
                    <label for="q-waktu">Target waktu</label>
                    <select id="q-waktu" name="waktu" data-label="Target waktu">
                        @foreach ($q['timelines'] as $opt)<option>{{ $opt }}</option>@endforeach
                    </select>
                </div>
                <div class="lf-field lf-field--full">
                    <label for="q-catatan">Catatan tambahan</label>
                    <textarea id="q-catatan" name="catatan" data-label="Catatan" rows="4" placeholder="Jumlah item, ukuran ruang, gaya yang diinginkan, atau referensi lainnya"></textarea>
                </div>
            </div>

            <button class="lf-btn lf-btn--gold lf-btn--block" type="submit"><svg class="ic"><use href="#i-whatsapp"/></svg> Kirim Permintaan Penawaran</button>
            <p class="lf-form-msg" data-form-msg role="status" aria-live="polite"></p>
        </form>

        <aside class="lf-aside lf-aside--plain">
            <div class="lf-aside__body">
                <h2 class="lf-serif">Cara kerja penawaran</h2>
                <ol class="lf-steps">
                    @foreach ($q['steps'] as $i => $step)
                        <li><span class="lf-steps__num">{{ $i + 1 }}</span><div><strong>{{ $step['title'] }}</strong><p>{{ $step['text'] }}</p></div></li>
                    @endforeach
                </ol>
                <p class="lf-aside__contact"><svg class="ic"><use href="#i-phone"/></svg> {{ $f['contact']['phone'] }}<br><svg class="ic"><use href="#i-mail"/></svg> {{ $f['contact']['email'] }}</p>
            </div>
        </aside>
    </div>
</section>
