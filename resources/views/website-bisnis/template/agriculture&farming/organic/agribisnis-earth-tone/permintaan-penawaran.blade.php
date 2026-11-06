@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Permintaan Penawaran - ' . $data['brand']['name'])
@section('page_key', 'penawaran')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'penawaran',
        'bannerTitle' => $data['quotation']['title'],
        'bannerText'  => $data['quotation']['text'],
    ])

    <section class="inner">
        <div class="inner__wrap">
            <div class="split split--form">
                <aside class="card card--quote card--quote-side">
                    <div class="card--quote__stack">
                        <span class="metric__icon metric__icon--orange"><svg class="ico"><use href="#i-doc"></use></svg></span>
                        <h2>Proses penawaran</h2>
                        <ol class="steps">
                            <li><strong>Isi formulir</strong><span>Sebutkan komoditas, jumlah, dan tujuan pengiriman.</span></li>
                            <li><strong>Tim kami meninjau</strong><span>Kami mencocokkan kebutuhan dengan stok dan jadwal panen.</span></li>
                            <li><strong>Terima penawaran</strong><span>Harga, kondisi pengiriman, dan estimasi waktu dikirim melalui WhatsApp.</span></li>
                        </ol>
                        <p class="muted">Pesanan minimum mulai dari {{ $data['moq']['value'] }}. Lihat <a href="{{ $u['moq'] }}">detail pesanan minimum</a>.</p>
                    </div>
                </aside>

                <form class="card form" id="quoteForm" data-wa-form data-wa-title="PERMINTAAN PENAWARAN" novalidate>
                    <h2>Formulir Permintaan Penawaran</h2>
                    <p>Pesan akan terbuka di WhatsApp tim kami dengan data yang sudah terisi.</p>
                    <div class="form-grid">
                        <div class="field"><label for="qName">Nama</label><input type="text" id="qName" name="nama" data-label="Nama" required autocomplete="name"></div>
                        <div class="field"><label for="qCompany">Perusahaan</label><input type="text" id="qCompany" name="perusahaan" data-label="Perusahaan" autocomplete="organization"></div>
                        <div class="field"><label for="qPhone">Nomor telepon / WhatsApp</label><input type="tel" id="qPhone" name="telepon" data-label="Telepon" required autocomplete="tel" inputmode="tel"></div>
                        <div class="field"><label for="qEmail">Email</label><input type="email" id="qEmail" name="email" data-label="Email" autocomplete="email"></div>
                        <div class="field">
                            <label for="qComm">Komoditas</label>
                            <select id="qComm" name="komoditas" data-label="Komoditas" data-prefill="komoditas" required>
                                <option value="">Pilih komoditas</option>
                                @foreach ($data['commodities'] as $c)<option value="{{ $c['name'] }}" data-slug="{{ $c['slug'] }}">{{ $c['name'] }}</option>@endforeach
                            </select>
                        </div>
                        <div class="field">
                            <label for="qGrade">Grade</label>
                            <select id="qGrade" name="grade" data-label="Grade"><option>Grade A</option><option>Grade B</option><option>Campuran A / B</option></select>
                        </div>
                        <div class="field"><label for="qQty">Jumlah</label><input type="number" id="qQty" name="jumlah" data-prefill="jumlah" data-label="Jumlah" min="1" step="any" required inputmode="decimal"></div>
                        <div class="field">
                            <label for="qUnit">Satuan</label>
                            <select id="qUnit" name="satuan" data-label="Satuan">@foreach ($data['quotation']['units'] as $x)<option>{{ $x }}</option>@endforeach</select>
                        </div>
                        <div class="field">
                            <label for="qInco">Skema pengiriman</label>
                            <select id="qInco" name="incoterm" data-label="Skema pengiriman">@foreach ($data['quotation']['incoterms'] as $x)<option>{{ $x }}</option>@endforeach</select>
                        </div>
                        <div class="field">
                            <label for="qPack">Kemasan</label>
                            <select id="qPack" name="kemasan" data-label="Kemasan">@foreach ($data['quotation']['packaging'] as $x)<option>{{ $x }}</option>@endforeach</select>
                        </div>
                        <div class="field"><label for="qDest">Kota / negara tujuan</label><input type="text" id="qDest" name="tujuan" data-label="Tujuan" required></div>
                        <div class="field"><label for="qDate">Target pengiriman</label><input type="date" id="qDate" name="tanggal" data-label="Target pengiriman"></div>
                        <div class="field field--full"><label for="qNote">Catatan</label><textarea id="qNote" name="catatan" data-label="Catatan" rows="3" placeholder="Spesifikasi khusus, sertifikasi yang dibutuhkan, dll."></textarea></div>
                    </div>
                    <button class="btn btn--accent" type="submit">Kirim via WhatsApp <svg class="ico"><use href="#i-whatsapp"></use></svg></button>
                    <p class="form-status" role="status" aria-live="polite"></p>
                </form>
            </div>
        </div>
    </section>

    @include($v . '.partials.explore', ['exploreKeys' => ['moq', 'spesifikasi', 'b2b']])
@endsection
