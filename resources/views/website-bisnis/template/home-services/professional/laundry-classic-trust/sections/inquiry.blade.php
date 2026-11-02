<section class="sec">
    <div class="lw-wrap inqp">
        <div class="inqp__side">
            <a class="card card--pad cbox" href="{{ $wa() }}" target="_blank" rel="noopener"><span class="bub bub--sm bub--dark"><svg class="ic"><use href="#i-whatsapp"/></svg></span><div><strong>WhatsApp</strong><span>{{ $c['contact']['phone'] }}</span></div></a>
            <a class="card card--pad cbox" href="tel:{{ $c['contact']['phone_tel'] }}"><span class="bub bub--sm bub--dark"><svg class="ic"><use href="#i-phone"/></svg></span><div><strong>Telepon</strong><span>{{ $c['contact']['phone'] }}</span></div></a>
            <a class="card card--pad cbox" href="mailto:{{ $c['contact']['email'] }}"><span class="bub bub--sm bub--dark"><svg class="ic"><use href="#i-mail"/></svg></span><div><strong>Email</strong><span>{{ $c['contact']['email'] }}</span></div></a>
            <div class="card card--pad cbox"><span class="bub bub--sm bub--dark"><svg class="ic"><use href="#i-pin"/></svg></span><div><strong>Alamat</strong><span>{{ $c['contact']['address'] }}</span></div></div>
            <div class="mascot"><img src="{{ $img('bunny-freshbot.png') }}" alt="" loading="lazy"></div>
        </div>

        <form class="card card--pad form" data-wa-form data-wa="{{ $c['whatsapp']['number'] }}" novalidate>
            <h2>Kirim Pesanan via WhatsApp</h2>
            <p class="form__lead">Isi data berikut, lalu pesan Anda akan terbuka di WhatsApp untuk dikirim ke tim kami.</p>
            <div class="form__grid">
                <label class="field"><span>Nama lengkap</span><input type="text" name="nama" required autocomplete="name"></label>
                <label class="field"><span>Nomor WhatsApp</span><input type="tel" name="telp" required inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx"></label>
                <label class="field"><span>Layanan</span>
                    <select name="layanan" required>
                        <option value="">Pilih layanan</option>
                        @foreach ($c['services'] as $s)<option value="{{ $s['slug'] }}" data-label="{{ $s['name'] }} ({{ $s['variant'] }})">{{ $s['name'] }} ({{ $s['variant'] }})</option>@endforeach
                    </select></label>
                <label class="field"><span>Area penjemputan</span>
                    <select name="area" required>
                        <option value="">Pilih area</option>
                        @foreach ($c['areas'] as $a)<option value="{{ $a['name'] }}">{{ $a['name'] }}</option>@endforeach
                    </select></label>
            </div>
            <fieldset class="field field--group"><legend>Service option (opsional)</legend>
                <div class="chips">@foreach ($c['options'] as $o)<label><input type="checkbox" name="opsi" value="{{ $o['name'] }}"><span>{{ $o['name'] }}</span></label>@endforeach</div>
            </fieldset>
            <label class="field"><span>Alamat lengkap</span><textarea name="alamat" rows="3" required></textarea></label>
            <label class="field"><span>Catatan (opsional)</span><textarea name="catatan" rows="2" placeholder="Mis. ada noda di kemeja putih"></textarea></label>
            <p class="form__err" data-form-error role="alert" hidden></p>
            <button class="btn btn--wa" type="submit"><svg class="ic"><use href="#i-whatsapp"/></svg>Kirim via WhatsApp</button>
        </form>
    </div>
</section>
