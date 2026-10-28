{{-- CUSTOM ORDER FORM --}}
@php $preview = $preview ?? false; $o = $cfg['custom_order']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--mini fm-card" data-fm-reveal>
        <span class="fm-pv__miniico"><img src="{{ $img($o['image']) }}" alt="" loading="lazy" decoding="async"></span>
        <div class="fm-pv__minibody">
            <h2 class="fm-h5">{{ $o['title'] }}</h2>
            <p>{{ $o['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--xs" href="{{ $route('custom-order') }}">{{ $o['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
    </article>
@else
    <section class="fm-section">
        <div class="fm-container fm-formlayout">
            <form class="fm-form fm-card" data-fm-wa-form="custom-order" novalidate>
                <h2 class="fm-h4">Detail pesanan custom</h2>
                <div class="fm-grid2">
                    <div class="fm-fg"><label for="co-nama">Nama lengkap <b>*</b></label><input id="co-nama" name="nama" type="text" autocomplete="name" required><p class="fm-err" data-fm-err></p></div>
                    <div class="fm-fg"><label for="co-wa">No. WhatsApp <b>*</b></label><input id="co-wa" name="wa" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx" required><p class="fm-err" data-fm-err></p></div>
                    <div class="fm-fg"><label for="co-email">Email</label><input id="co-email" name="email" type="email" autocomplete="email"><p class="fm-err" data-fm-err></p></div>
                    <div class="fm-fg"><label for="co-kota">Kota / lokasi pengiriman <b>*</b></label><input id="co-kota" name="kota" type="text" autocomplete="address-level2" required><p class="fm-err" data-fm-err></p></div>
                </div>

                <div class="fm-grid2">
                    <div class="fm-fg"><label for="co-type">Jenis furniture <b>*</b></label>
                        <select id="co-type" name="type" required><option value="">Pilih jenis</option>
                            @foreach ($cfg['catalog']['items'] as $it)<option value="{{ $it['name'] }}" data-slug="{{ $it['slug'] }}">{{ $it['name'] }}</option>@endforeach
                        </select><p class="fm-err" data-fm-err></p></div>
                    <div class="fm-fg"><label for="co-style">Gaya</label>
                        <select id="co-style" name="style"><option value="">Pilih gaya</option>
                            @foreach ($cfg['catalog']['styles'] as $st)<option>{{ $st }}</option>@endforeach
                        </select></div>
                    <div class="fm-fg"><label for="co-material">Material</label>
                        <select id="co-material" name="material"><option value="">Pilih material</option>
                            @foreach ($cfg['materials']['items'] as $m)<option>{{ $m['name'] }}</option>@endforeach
                        </select></div>
                    <div class="fm-fg"><label for="co-finish">Finishing</label>
                        <select id="co-finish" name="finishing"><option value="">Pilih finishing</option>
                            @foreach ($cfg['materials']['finishes'] as $f)<option>{{ $f['name'] }}</option>@endforeach
                        </select></div>
                    <div class="fm-fg"><label for="co-color">Warna</label>
                        <select id="co-color" name="color"><option value="">Pilih warna</option>
                            @foreach ($cfg['custom_design']['colors'] as $co)<option>{{ $co['name'] }}</option>@endforeach
                        </select></div>
                    <div class="fm-fg"><label for="co-qty">Jumlah <b>*</b></label><input id="co-qty" name="qty" type="number" min="1" max="999" value="1" inputmode="numeric" required><p class="fm-err" data-fm-err></p></div>
                </div>

                <fieldset class="fm-fieldset fm-fieldset--plain">
                    <legend>Ukuran yang diinginkan (cm)</legend>
                    <div class="fm-grid3">
                        <div class="fm-fg"><label for="co-w">Panjang</label><input id="co-w" name="w" type="number" min="0" inputmode="numeric"></div>
                        <div class="fm-fg"><label for="co-d">Lebar / dalam</label><input id="co-d" name="d" type="number" min="0" inputmode="numeric"></div>
                        <div class="fm-fg"><label for="co-h">Tinggi</label><input id="co-h" name="h" type="number" min="0" inputmode="numeric"></div>
                    </div>
                </fieldset>

                <div class="fm-fg"><label for="co-budget">Perkiraan anggaran</label>
                    <select id="co-budget" name="budget"><option value="">Pilih anggaran</option>
                        @foreach ($o['budgets'] as $b)<option>{{ $b }}</option>@endforeach
                    </select></div>
                <div class="fm-fg"><label for="co-note">Catatan tambahan</label><textarea id="co-note" name="note" rows="4" maxlength="600" placeholder="Ceritakan detail kebutuhan atau referensi desain Anda..."></textarea></div>

                <button type="submit" class="fm-btn fm-btn--dark fm-btn--lg fm-btn--block"><svg class="fm-i" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim via WhatsApp</button>
                <p class="fm-note">Form akan membuka WhatsApp dengan pesan yang sudah terisi. Anda dapat melampirkan foto referensi langsung di chat.</p>
            </form>

            <aside class="fm-aside">
                <div class="fm-card fm-aside__card">
                    <img class="fm-aside__art" src="{{ $img($o['image']) }}" alt="" loading="lazy" decoding="async">
                    <h3 class="fm-h4">Alur pemesanan</h3>
                    <ol class="fm-mini-steps">
                        @foreach ($cfg['lead_time']['stages'] as $st)<li><strong>{{ $st[0] }}</strong><span>{{ $st[2] }}</span></li>@endforeach
                    </ol>
                </div>
            </aside>
        </div>
    </section>
@endif
