<section class="rf-section">
    <div class="rf-container rf-formgrid">
        <form class="rf-card rf-form" data-rf-wa-form="quote" novalidate>
            <h2>Quotation Request</h2>
            <p class="rf-form__lead">Susun daftar produk, lalu kirim permintaan penawaran ke tim kami.</p>

            <div class="rf-qlist" data-rf-quote-list aria-live="polite"></div>
            <a class="rf-btn rf-btn--ghost rf-btn--sm" href="{{ $r('catalog') }}">{!! $icon('plus') !!} Tambah produk dari katalog</a>

            <div class="rf-form__row">
                <label class="rf-field">Nama lengkap *<input type="text" name="nama" required autocomplete="name"></label>
                <label class="rf-field">Perusahaan / instansi<input type="text" name="perusahaan" autocomplete="organization"></label>
            </div>
            <div class="rf-form__row">
                <label class="rf-field">Nomor WhatsApp *<input type="tel" name="wa" required inputmode="tel" autocomplete="tel"></label>
                <label class="rf-field">Email<input type="email" name="email" autocomplete="email"></label>
            </div>
            <div class="rf-form__row">
                <label class="rf-field">Kota & alamat pengiriman *<input type="text" name="kota" required></label>
                <label class="rf-field">Perkiraan anggaran
                    <select name="budget"><option value="">Belum menentukan</option>@foreach ($f['quotation']['budget'] as $b)<option>{{ $b }}</option>@endforeach</select>
                </label>
            </div>
            <label class="rf-check"><input type="checkbox" name="instalasi" value="ya"> <span>Saya membutuhkan layanan instalasi</span></label>
            <label class="rf-field">Kebutuhan tambahan<textarea name="catatan" rows="4" placeholder="Contoh: butuh 6 meja kafe ukuran 80×80, finishing walnut..."></textarea></label>

            <p class="rf-form__error" data-rf-form-error role="alert" hidden></p>
            <button class="rf-btn rf-btn--solid rf-btn--lg" type="submit">{!! $icon('whatsapp') !!} Kirim Permintaan Penawaran</button>
        </form>

        <aside class="rf-card rf-aside">
            <span class="rf-icondisc">{!! $icon('doc') !!}</span>
            <h2>Ketentuan penawaran</h2>
            <ul class="rf-ticks">
                @foreach ($f['quotation']['terms'] as $t)<li>{!! $icon('check') !!}<span>{{ $t }}</span></li>@endforeach
            </ul>
            <a class="rf-btn rf-btn--ghost" href="{{ $r('lead-time') }}">Lihat estimasi waktu {!! $icon('arrow-right') !!}</a>
        </aside>
    </div>
</section>
