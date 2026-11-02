{{-- QUOTATION REQUEST --}}
@php $preview = $preview ?? false; $q = $cfg['quotation']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--mini fm-card" data-fm-reveal>
        <span class="fm-pv__miniico"><img src="{{ $img($q['image']) }}" alt="" loading="lazy" decoding="async"></span>
        <div class="fm-pv__minibody">
            <h2 class="fm-h5">{{ $q['title'] }}</h2>
            <p>{{ $q['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--xs" href="{{ $route('quotation') }}">{{ $q['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
    </article>
@else
    <section class="fm-section">
        <div class="fm-container fm-formlayout">
            <form class="fm-form fm-card" data-fm-wa-form="quotation" novalidate>
                <h2 class="fm-h4">Data permintaan penawaran</h2>
                <div class="fm-grid2">
                    <div class="fm-fg"><label for="qt-nama">Nama lengkap <b>*</b></label><input id="qt-nama" name="nama" type="text" autocomplete="name" required><p class="fm-err" data-fm-err></p></div>
                    <div class="fm-fg"><label for="qt-org">Perusahaan / instansi</label><input id="qt-org" name="org" type="text" autocomplete="organization"></div>
                    <div class="fm-fg"><label for="qt-wa">No. WhatsApp <b>*</b></label><input id="qt-wa" name="wa" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx" required><p class="fm-err" data-fm-err></p></div>
                    <div class="fm-fg"><label for="qt-email">Email</label><input id="qt-email" name="email" type="email" autocomplete="email"><p class="fm-err" data-fm-err></p></div>
                </div>

                <fieldset class="fm-fieldset fm-fieldset--plain" data-fm-need>
                    <legend>Kebutuhan furniture <b>*</b></legend>
                    <div class="fm-checks">
                        @foreach ($cfg['catalog']['items'] as $it)
                            <label class="fm-chip fm-chip--check"><input type="checkbox" name="need[]" value="{{ $it['name'] }}" data-slug="{{ $it['slug'] }}"><span>{{ $it['name'] }}</span></label>
                        @endforeach
                    </div>
                    <p class="fm-err" data-fm-err></p>
                </fieldset>

                <div class="fm-grid2">
                    <div class="fm-fg"><label for="qt-qty">Perkiraan jumlah item</label><input id="qt-qty" name="qty" type="number" min="1" max="9999" inputmode="numeric" placeholder="mis. 6"></div>
                    <div class="fm-fg"><label for="qt-budget">Perkiraan anggaran</label>
                        <select id="qt-budget" name="budget"><option value="">Pilih anggaran</option>
                            @foreach ($cfg['custom_order']['budgets'] as $b)<option>{{ $b }}</option>@endforeach
                        </select></div>
                    <div class="fm-fg"><label for="qt-time">Target waktu</label>
                        <select id="qt-time" name="timeline"><option value="">Pilih target waktu</option>
                            @foreach ($q['timelines'] as $t)<option>{{ $t }}</option>@endforeach
                        </select></div>
                    <div class="fm-fg"><label for="qt-kota">Lokasi pengiriman <b>*</b></label><input id="qt-kota" name="kota" type="text" autocomplete="address-level2" required><p class="fm-err" data-fm-err></p></div>
                </div>
                <div class="fm-fg"><label for="qt-note">Detail kebutuhan</label><textarea id="qt-note" name="note" rows="4" maxlength="600" placeholder="Jelaskan ukuran, gaya, material, atau referensi yang Anda inginkan..."></textarea></div>

                <button type="submit" class="fm-btn fm-btn--dark fm-btn--lg fm-btn--block"><svg class="fm-i" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim Permintaan via WhatsApp</button>
                <p class="fm-note">Tim kami akan membalas melalui WhatsApp dengan penawaran sesuai kebutuhan Anda.</p>
            </form>

            <aside class="fm-aside">
                <div class="fm-card fm-aside__card">
                    <img class="fm-aside__art" src="{{ $img($q['image']) }}" alt="" loading="lazy" decoding="async">
                    <h3 class="fm-h4">{{ $q['title'] }}</h3>
                    <p>{{ $q['text'] }}</p>
                    <ul class="fm-checklist">
                        <li><svg class="fm-i" aria-hidden="true"><use href="#i-check"/></svg>Konsultasi desain gratis</li>
                        <li><svg class="fm-i" aria-hidden="true"><use href="#i-check"/></svg>Penawaran sesuai ukuran &amp; material</li>
                        <li><svg class="fm-i" aria-hidden="true"><use href="#i-check"/></svg>Garansi &amp; layanan purna jual</li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endif
