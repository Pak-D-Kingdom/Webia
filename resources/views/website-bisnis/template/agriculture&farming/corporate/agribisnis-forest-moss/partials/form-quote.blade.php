{{-- Formulir permintaan penawaran harga (statis, divalidasi JS). --}}
<form class="form form--full form--light" data-form="quote" data-wa="{{ $cfg['site']['whatsapp'] }}" data-wa-title="Permintaan Penawaran Harga — Green Harvest" novalidate>
    <div class="form__grid">
        <div class="field">
            <label for="qtNama">Nama Lengkap</label>
            <input id="qtNama" name="nama" type="text" placeholder="Nama lengkap" autocomplete="name" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtPerusahaan">Nama Perusahaan</label>
            <input id="qtPerusahaan" name="perusahaan" type="text" placeholder="Nama perusahaan" autocomplete="organization" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtEmail">Email</label>
            <input id="qtEmail" name="email" type="email" placeholder="email@perusahaan.com" autocomplete="email" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtTelp">No. WhatsApp / Telepon</label>
            <input id="qtTelp" name="telepon" type="tel" placeholder="+62 8xx xxxx xxxx" autocomplete="tel" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtKomoditas">Komoditas</label>
            <select id="qtKomoditas" name="komoditas" required>
                <option value="">Pilih komoditas</option>
                @foreach($cfg['commodities'] as $c)
                    <option value="{{ $c['name'] }}">{{ $c['name'] }} — {{ $c['variant'] }}</option>
                @endforeach
            </select>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtVolume">Estimasi Volume</label>
            <select id="qtVolume" name="volume" required>
                <option value="">Pilih volume</option>
                @foreach($cfg['form']['volumes'] as $v)
                    <option value="{{ $v }}">{{ $v }}</option>
                @endforeach
            </select>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtIncoterm">Syarat Pengiriman</label>
            <select id="qtIncoterm" name="incoterm">
                <option value="">Pilih (opsional)</option>
                @foreach($cfg['form']['incoterms'] as $v)
                    <option value="{{ $v }}">{{ $v }}</option>
                @endforeach
            </select>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="qtTujuan">Tujuan Pengiriman</label>
            <input id="qtTujuan" name="tujuan" type="text" placeholder="Kota / negara tujuan" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field field--wide field--msg">
            <label for="qtCatatan">Catatan Tambahan</label>
            <textarea id="qtCatatan" name="catatan" rows="4" placeholder="Spesifikasi, grade, kemasan, atau kebutuhan lain"></textarea>
            <small class="field__err" data-err></small>
        </div>
    </div>
    <button class="btn btn--lime" type="submit"><span>{{ $cfg['quote']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></button>
    <p class="form__note"><svg class="ic" aria-hidden="true"><use href="#i-wa-fill"/></svg>Pesan akan dikirim ke tim kami melalui WhatsApp.</p>
    <div class="form__ok" data-ok role="status" hidden>
        <p>Terima kasih! WhatsApp akan terbuka dengan pesan Anda yang sudah terisi. Tekan tombol kirim di WhatsApp untuk menyelesaikan.</p>
        <a class="form__wa" data-wa-link href="#" target="_blank" rel="noopener"><svg class="ic" aria-hidden="true"><use href="#i-wa-fill"/></svg>Buka WhatsApp</a>
    </div>
</form>
