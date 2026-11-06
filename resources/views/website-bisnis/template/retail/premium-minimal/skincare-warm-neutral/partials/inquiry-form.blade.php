@php $compact = $compact ?? false; $p = $fid ?? 'iq'; @endphp
<form class="form" data-wa-form data-prefill data-wa-title="Halo {{ $skin['name'] }}, saya ingin inquiry & konsultasi produk." novalidate>
    <div class="form__grid">
        <div class="field">
            <label for="{{ $p }}-nama">Nama lengkap <em>*</em></label>
            <input id="{{ $p }}-nama" name="nama" data-label="Nama" type="text" autocomplete="name" placeholder="Nama kamu" required>
        </div>
        <div class="field">
            <label for="{{ $p }}-wa">No. WhatsApp <em>*</em></label>
            <input id="{{ $p }}-wa" name="whatsapp" data-label="No. WhatsApp" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" data-type="phone" required>
        </div>
        @unless ($compact)
            <div class="field">
                <label for="{{ $p }}-email">Email</label>
                <input id="{{ $p }}-email" name="email" data-label="Email" type="email" autocomplete="email" placeholder="nama@email.com" data-type="email">
            </div>
            <div class="field">
                <label for="{{ $p }}-kulit">Jenis kulit</label>
                <select id="{{ $p }}-kulit" name="jenis_kulit" data-label="Jenis kulit">
                    @foreach ($skin['skin_types'] as $t)<option>{{ $t }}</option>@endforeach
                </select>
            </div>
        @endunless
        <div class="field field--full">
            <label for="{{ $p }}-produk">Produk yang diminati</label>
            <select id="{{ $p }}-produk" name="produk" data-label="Produk">
                @foreach ($skin['products'] as $pr)<option>{{ $pr['name'] }}</option>@endforeach
                <option>Produk lain / konsultasi</option>
            </select>
        </div>
        <div class="field field--full">
            <label for="{{ $p }}-pesan">Pesan <em>*</em></label>
            <textarea id="{{ $p }}-pesan" name="pesan" data-label="Pesan" rows="{{ $compact ? 3 : 5 }}" placeholder="Tulis pertanyaan atau kebutuhan kulitmu..." required></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn--block btn--lg"><i class="bi bi-whatsapp"></i> Kirim via WhatsApp</button>
    <p class="form-msg" data-form-msg hidden></p>
</form>
