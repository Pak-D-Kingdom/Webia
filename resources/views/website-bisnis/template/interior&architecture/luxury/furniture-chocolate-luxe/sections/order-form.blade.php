@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $o = $f['order'];
@endphp
<section class="lf-section">
    <div class="lf-container lf-formgrid">
        <form class="lf-form lf-card--paper" data-wa-form="order" novalidate>
            <h2 class="lf-form__title lf-serif">Detail Pesanan</h2>
            <p class="lf-form__lead">Semakin lengkap informasinya, semakin cepat kami menyiapkan sketsa dan estimasi untuk Anda.</p>

            <div class="lf-fields">
                <div class="lf-field">
                    <label for="o-nama">Nama lengkap</label>
                    <input id="o-nama" name="nama" data-label="Nama" type="text" autocomplete="name" required>
                </div>
                <div class="lf-field">
                    <label for="o-wa">Nomor WhatsApp</label>
                    <input id="o-wa" name="whatsapp" data-label="WhatsApp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required>
                </div>
                <div class="lf-field">
                    <label for="o-email">Email <span>(opsional)</span></label>
                    <input id="o-email" name="email" data-label="Email" type="email" autocomplete="email">
                </div>
                <div class="lf-field">
                    <label for="o-kota">Kota pengiriman</label>
                    <input id="o-kota" name="kota" data-label="Kota pengiriman" type="text" autocomplete="address-level2" required>
                </div>
                <div class="lf-field">
                    <label for="o-jenis">Jenis furniture</label>
                    <select id="o-jenis" name="jenis" data-label="Jenis furniture" required>
                        <option value="">Pilih jenis furniture</option>
                        @foreach ($o['furniture_types'] as $opt)<option>{{ $opt }}</option>@endforeach
                    </select>
                </div>
                <div class="lf-field">
                    <label for="o-jumlah">Jumlah</label>
                    <input id="o-jumlah" name="jumlah" data-label="Jumlah" type="number" min="1" value="1" required>
                </div>
                <div class="lf-field">
                    <label for="o-material">Material</label>
                    <select id="o-material" name="material" data-label="Material">
                        @foreach ($o['materials'] as $opt)<option>{{ $opt }}</option>@endforeach
                    </select>
                </div>
                <div class="lf-field">
                    <label for="o-finishing">Finishing</label>
                    <select id="o-finishing" name="finishing" data-label="Finishing">
                        @foreach ($o['finishings'] as $opt)<option>{{ $opt }}</option>@endforeach
                    </select>
                </div>
                <fieldset class="lf-field lf-field--full lf-field--size">
                    <legend>Ukuran yang diinginkan <span>(cm, opsional)</span></legend>
                    <div class="lf-size">
                        <label><span>Panjang</span><input name="panjang" data-label="Panjang (cm)" type="number" min="1" inputmode="numeric" placeholder="P"></label>
                        <label><span>Lebar</span><input name="lebar" data-label="Lebar (cm)" type="number" min="1" inputmode="numeric" placeholder="L"></label>
                        <label><span>Tinggi</span><input name="tinggi" data-label="Tinggi (cm)" type="number" min="1" inputmode="numeric" placeholder="T"></label>
                    </div>
                </fieldset>
                <div class="lf-field lf-field--full">
                    <label for="o-catatan">Deskripsi desain / catatan</label>
                    <textarea id="o-catatan" name="catatan" data-label="Catatan desain" rows="4" placeholder="Ceritakan gaya, warna, atau referensi yang Anda inginkan"></textarea>
                </div>
            </div>

            <button class="lf-btn lf-btn--gold lf-btn--block" type="submit"><svg class="ic"><use href="#i-whatsapp"/></svg> Kirim Pesanan via WhatsApp</button>
            <p class="lf-form-msg" data-form-msg role="status" aria-live="polite"></p>
        </form>

        <aside class="lf-aside" style="background-image:url('{{ $a($o['image']) }}')">
            <div class="lf-aside__shade"></div>
            <div class="lf-aside__body">
                <h2 class="lf-serif">Kenapa pesan custom di {{ $f['brand']['name'] }}?</h2>
                <ul class="lf-checks">
                    @foreach ($o['perks'] as $perk)
                        <li><svg class="ic"><use href="#i-check"/></svg><span>{{ $perk }}</span></li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>
