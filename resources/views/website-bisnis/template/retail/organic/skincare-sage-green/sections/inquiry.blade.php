{{-- Inquiry. $full = false → preview beranda, true → halaman inquiry lengkap. Semua form dikirim ke WhatsApp. --}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $full ??= false;
@endphp
<section class="{{ $full ? 'container section inquiry inquiry--full' : 'section section--tint inquiry inquiry--preview' }}" id="inquiry">
    <div class="{{ $full ? '' : 'container' }}">
        <div class="inquiry__layout">
            <div class="inquiry__info">
                <p class="eyebrow">Inquiry</p>
                <h2>{{ $full ? 'Kirim Pertanyaan atau Permintaan Penawaran' : 'Ada Pertanyaan? Tanyakan Langsung' }}</h2>
                <p>Tanyakan produk, harga, ketersediaan stok, pre-order, hingga kerja sama reseller. Tim kami membalas lewat WhatsApp pada jam operasional.</p>

                <ul class="contact-cards">
                    <li>
                        <span class="contact-cards__ico"><svg class="ico"><use href="#i-whatsapp"/></svg></span>
                        <div><strong>WhatsApp</strong><a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}" target="_blank" rel="noopener noreferrer">{{ $cfg['whatsapp']['display'] }}</a></div>
                    </li>
                    <li>
                        <span class="contact-cards__ico"><svg class="ico"><use href="#i-clock"/></svg></span>
                        <div><strong>Jam Layanan</strong><span>{{ $cfg['whatsapp']['hours'] }}</span></div>
                    </li>
                    @if($full)
                        <li>
                            <span class="contact-cards__ico"><svg class="ico"><use href="#i-mail"/></svg></span>
                            <div><strong>Email</strong><a href="mailto:{{ $cfg['contact']['email'] }}">{{ $cfg['contact']['email'] }}</a></div>
                        </li>
                        <li>
                            <span class="contact-cards__ico"><svg class="ico"><use href="#i-pin"/></svg></span>
                            <div><strong>Alamat</strong><span>{{ $cfg['contact']['address'] }}</span></div>
                        </li>
                    @endif
                </ul>

                @if($full)
                    <button type="button" class="btn btn--soft" data-ai-open><svg class="ico"><use href="#i-sparkles"/></svg> Tanya AI Beauty Assistant dulu</button>
                @endif
            </div>

            <form class="form card-form" data-wa-form data-wa-subject="Halo PureGlow, saya mengirim inquiry lewat website." novalidate>
                <h3>Form Inquiry</h3>

                <div class="field">
                    <label for="{{ $full ? 'inq-nama' : 'pv-nama' }}">Nama Lengkap</label>
                    <input id="{{ $full ? 'inq-nama' : 'pv-nama' }}" type="text" name="nama" data-label="Nama" placeholder="Nama kamu" required autocomplete="name">
                </div>
                <div class="field">
                    <label for="{{ $full ? 'inq-wa' : 'pv-wa' }}">No. WhatsApp</label>
                    <input id="{{ $full ? 'inq-wa' : 'pv-wa' }}" type="tel" name="whatsapp" data-label="No. WhatsApp" placeholder="08xx xxxx xxxx" required inputmode="tel" autocomplete="tel">
                </div>

                @if($full)
                    <div class="field-row">
                        <div class="field">
                            <label for="inq-email">Email <span class="muted">(opsional)</span></label>
                            <input id="inq-email" type="email" name="email" data-label="Email" placeholder="nama@email.com" autocomplete="email">
                        </div>
                        <div class="field">
                            <label for="inq-jenis">Jenis Inquiry</label>
                            <select id="inq-jenis" name="jenis" data-label="Jenis Inquiry" required>
                                @foreach($cfg['inquiry_types'] as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="inq-produk">Produk yang Diminati</label>
                        <select id="inq-produk" name="produk" data-label="Produk" data-product-select>
                            <option value="">Belum menentukan</option>
                            @foreach($cfg['products'] as $p)
                                <option value="{{ $p['name'] }}">{{ $p['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="field">
                    <label for="{{ $full ? 'inq-pesan' : 'pv-pesan' }}">Pesan</label>
                    <textarea id="{{ $full ? 'inq-pesan' : 'pv-pesan' }}" name="pesan" data-label="Pesan" rows="{{ $full ? 5 : 3 }}" placeholder="Tulis pertanyaan atau kebutuhanmu..." required></textarea>
                </div>

                <p class="form-error" data-form-error hidden></p>
                <button type="submit" class="btn btn--primary btn--block btn--lg"><svg class="ico"><use href="#i-whatsapp"/></svg> Kirim via WhatsApp</button>
                <p class="form-hint">Pesan akan terbuka di WhatsApp ke {{ $cfg['whatsapp']['display'] }}.</p>
            </form>
        </div>
    </div>
</section>
