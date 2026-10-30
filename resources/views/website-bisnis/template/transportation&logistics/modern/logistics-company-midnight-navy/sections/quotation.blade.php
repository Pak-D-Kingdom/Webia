@php
    $q    = $site['quotation'];
    $rp   = $site['route_prefix'];
    $img  = fn ($f) => asset($site['paths']['images'] . $f);
    $full = $full ?? false;
@endphp
@if (! $full)
    <div class="lc-quote">
        <img class="lc-quote__img" src="{{ $img($q['image']) }}" alt="" loading="lazy" width="460" height="432">
        <div class="lc-quote__body">
            <h2 class="lc-quote__title"><a href="{{ route($rp . 'quotation') }}">{{ $q['title'] }}</a></h2>
            <p>{{ $q['subtitle'] }}</p>
            <a class="lc-btn lc-btn--outline lc-btn--sm" href="{{ route($rp . 'quotation') }}">{{ $q['button'] }}
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
            </a>
        </div>
    </div>
@else
    <form class="lc-form" data-lc-wa-form data-wa="https://wa.me/{{ $site['contact']['whatsapp'] }}" data-title="Permintaan penawaran {{ $site['brand']['name'] }}" novalidate>
        <div class="lc-form__grid">
            <div class="lc-field">
                <label for="lc-q-name">Nama lengkap <abbr title="wajib">*</abbr></label>
                <input id="lc-q-name" name="Nama" type="text" autocomplete="name" required>
            </div>
            <div class="lc-field">
                <label for="lc-q-company">Perusahaan</label>
                <input id="lc-q-company" name="Perusahaan" type="text" autocomplete="organization">
            </div>
            <div class="lc-field">
                <label for="lc-q-email">Email</label>
                <input id="lc-q-email" name="Email" type="email" autocomplete="email">
            </div>
            <div class="lc-field">
                <label for="lc-q-phone">Nomor telepon / WhatsApp <abbr title="wajib">*</abbr></label>
                <input id="lc-q-phone" name="Telepon" type="tel" inputmode="tel" autocomplete="tel" required>
            </div>
            <div class="lc-field">
                <label for="lc-q-service">Jenis layanan <abbr title="wajib">*</abbr></label>
                <div class="lc-select" data-lc-select>
                    <select id="lc-q-service" name="Layanan" required>
                        <option value="">Pilih layanan</option>
                        @foreach ($site['services']['items'] as $it)
                            <option value="{{ $it['title'] }}" data-icon="{{ $it['icon'] }}">{{ $it['title'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <fieldset class="lc-field lc-field--modes">
                <legend>Moda pengiriman</legend>
                <div class="lc-modes">
                    @foreach ($q['modes'] as $i => $m)
                        <label class="lc-mode"><input type="radio" name="Moda" value="{{ $m }}"{{ $i === 0 ? ' checked' : '' }}><span>{{ $m }}</span></label>
                    @endforeach
                </div>
            </fieldset>
            <div class="lc-field">
                <label for="lc-q-from">Kota / negara asal <abbr title="wajib">*</abbr></label>
                <input id="lc-q-from" name="Asal" type="text" required>
            </div>
            <div class="lc-field">
                <label for="lc-q-to">Kota / negara tujuan <abbr title="wajib">*</abbr></label>
                <input id="lc-q-to" name="Tujuan" type="text" required>
            </div>
            <div class="lc-field lc-field--wide">
                <label for="lc-q-cargo">Jenis barang, berat, dan volume</label>
                <textarea id="lc-q-cargo" name="Detail barang" rows="4" placeholder="Contoh: suku cadang mesin, 2 ton, 6 m³"></textarea>
            </div>
        </div>
        <p class="lc-form__err" role="alert" data-lc-form-err hidden></p>
        <button class="lc-btn lc-btn--primary" type="submit">{{ $q['button'] }}
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
        </button>
        <p class="lc-form__hint">Permintaan akan dikirim ke tim kami melalui WhatsApp.</p>
    </form>
@endif
