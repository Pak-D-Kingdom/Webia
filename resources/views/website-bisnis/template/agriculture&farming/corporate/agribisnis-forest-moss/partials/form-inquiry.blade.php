{{-- Formulir Inquiry B2B (statis, divalidasi JS). $full = true untuk halaman penuh. --}}
<form class="form @if($full) form--full @endif" data-form="inquiry" novalidate>
    <div class="form__grid">
        <div class="field">
            <label for="inqNama{{ $suffix }}">Nama @if($full) Lengkap @endif</label>
            <input id="inqNama{{ $suffix }}" name="nama" type="text" placeholder="Nama" autocomplete="name" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="inqEmail{{ $suffix }}">Email</label>
            <input id="inqEmail{{ $suffix }}" name="email" type="email" placeholder="Email" autocomplete="email" required>
            <small class="field__err" data-err></small>
        </div>
        <div class="field">
            <label for="inqPerusahaan{{ $suffix }}">Nama Perusahaan</label>
            <input id="inqPerusahaan{{ $suffix }}" name="perusahaan" type="text" placeholder="Nama Perusahaan" autocomplete="organization" required>
            <small class="field__err" data-err></small>
        </div>
        @if($full)
            <div class="field">
                <label for="inqTelp{{ $suffix }}">No. WhatsApp / Telepon</label>
                <input id="inqTelp{{ $suffix }}" name="telepon" type="tel" placeholder="+62 8xx xxxx xxxx" autocomplete="tel" required>
                <small class="field__err" data-err></small>
            </div>
            <div class="field field--wide">
                <label for="inqKomoditas{{ $suffix }}">Komoditas yang Diminati</label>
                <select id="inqKomoditas{{ $suffix }}" name="komoditas" required>
                    <option value="">Pilih komoditas</option>
                    @foreach($cfg['commodities'] as $c)
                        <option value="{{ $c['name'] }}">{{ $c['name'] }} — {{ $c['variant'] }}</option>
                    @endforeach
                </select>
                <small class="field__err" data-err></small>
            </div>
        @endif
        <div class="field field--wide field--msg">
            <label for="inqPesan{{ $suffix }}">Pesan</label>
            <textarea id="inqPesan{{ $suffix }}" name="pesan" rows="3" placeholder="Pesan" required></textarea>
            <small class="field__err" data-err></small>
        </div>
    </div>
    <button class="btn btn--lime" type="submit"><span>{{ $cfg['inquiry']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></button>
    <p class="form__ok" data-ok role="status" hidden>Terima kasih! Inquiry Anda sudah kami terima. Tim kami akan menghubungi Anda secepatnya.</p>
</form>
