@extends($v . '.layout')

@section('title', 'Quotation Request — AgroTrade')
@section('description', 'Minta penawaran harga komoditas AgroTrade sesuai kebutuhan, volume, dan negara tujuan Anda.')

@section('content')
@php $img = fn ($f) => asset($agro['img_path'] . '/' . $f); $q = $agro['quotation']; @endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Quotation Request',
    'ph_lead'  => $q['text'],
    'ph_icon'  => 'docs',
])

<section class="container section">
    <div class="split split--form">
        <aside class="side">
            <h2>Cara kerja penawaran</h2>
            <ol class="timeline timeline--compact">
                @foreach ($q['steps'] as $i => $s)
                    <li>
                        <span class="timeline__ico"><b>{{ $i + 1 }}</b></span>
                        <div><h3>{{ $s[0] }}</h3><p>{{ $s[1] }}</p></div>
                    </li>
                @endforeach
            </ol>
            <div class="card contact-mini">
                <h3>Perlu bantuan cepat?</h3>
                <p>Tanyakan langsung ke AgroBot soal harga, spesifikasi, atau minimum order.</p>
                <button type="button" class="btn btn--green btn--sm" data-chat-open>
                    <svg class="i" aria-hidden="true"><use href="#i-chat"/></svg> Tanya AgroBot
                </button>
            </div>
        </aside>

        <div class="card formcard">
            <h2>Formulir Penawaran</h2>
            <p class="formcard__sub">Kolom bertanda <span class="req">*</span> wajib diisi. Permintaan akan dikirim melalui WhatsApp tim penjualan kami.</p>

            <form class="form" id="quoteForm" data-wa-form data-wa-title="QUOTATION REQUEST — AgroTrade" novalidate>
                <div class="form__grid">
                    <div class="field">
                        <label for="q_nama">Nama lengkap <span class="req">*</span></label>
                        <input type="text" id="q_nama" name="nama" data-label="Nama" required autocomplete="name" placeholder="Nama Anda">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q_perusahaan">Perusahaan</label>
                        <input type="text" id="q_perusahaan" name="perusahaan" data-label="Perusahaan" autocomplete="organization" placeholder="Nama perusahaan (jika ada)">
                    </div>
                    <div class="field">
                        <label for="q_email">Email <span class="req">*</span></label>
                        <input type="email" id="q_email" name="email" data-label="Email" required autocomplete="email" placeholder="nama@perusahaan.com">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q_wa">No. WhatsApp / telepon <span class="req">*</span></label>
                        <input type="tel" id="q_wa" name="telepon" data-label="Telepon" required data-type="phone" autocomplete="tel" inputmode="tel" placeholder="08xx atau +62xx">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q_komoditas">Komoditas <span class="req">*</span></label>
                        <select id="q_komoditas" name="komoditas" data-label="Komoditas" required class="select">
                            <option value="" selected disabled>Pilih komoditas</option>
                            @foreach ($agro['commodities'] as $c)<option value="{{ $c['slug'] }}">{{ $c['name'] }}</option>@endforeach
                        </select>
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q_grade">Grade / jenis</label>
                        <select id="q_grade" name="grade" data-label="Grade/Jenis" class="select">
                            <option value="" selected>Belum menentukan</option>
                            @foreach ($q['grades'] as $g)<option value="{{ $g }}">{{ $g }}</option>@endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="q_jumlah">Jumlah <span class="req">*</span></label>
                        <input type="number" id="q_jumlah" name="jumlah" data-label="Jumlah" required min="1" step="any" inputmode="decimal" placeholder="Mis. 20">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="q_satuan">Satuan</label>
                        <select id="q_satuan" name="satuan" data-label="Satuan" class="select">
                            @foreach ($q['units'] as $u)<option value="{{ $u }}" @if ($loop->first) selected @endif>{{ $u }}</option>@endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="q_frek">Frekuensi pembelian</label>
                        <select id="q_frek" name="frekuensi" data-label="Frekuensi" class="select">
                            @foreach ($q['frequencies'] as $u)<option value="{{ $u }}" @if ($loop->first) selected @endif>{{ $u }}</option>@endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="q_inco">Incoterms</label>
                        <select id="q_inco" name="incoterms" data-label="Incoterms" class="select">
                            @foreach ($q['incoterms'] as $u)<option value="{{ $u }}" @if ($loop->last) selected @endif>{{ $u }}</option>@endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="q_tujuan">Negara / pelabuhan tujuan</label>
                        <input type="text" id="q_tujuan" name="tujuan" data-label="Tujuan" placeholder="Mis. Rotterdam, Belanda">
                    </div>
                    <div class="field">
                        <label for="q_tanggal">Target pengiriman</label>
                        <input type="date" id="q_tanggal" name="tanggal" data-label="Target Pengiriman">
                    </div>
                    <div class="field field--full">
                        <label for="q_catatan">Catatan tambahan</label>
                        <textarea id="q_catatan" name="catatan" data-label="Catatan" rows="3" placeholder="Spesifikasi khusus, kemasan, kebutuhan sampel, dll."></textarea>
                    </div>
                </div>

                <div class="form__foot">
                    <button type="submit" class="btn btn--amber btn--lg">
                        <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim via WhatsApp
                    </button>
                    <p class="form__hint">Penawaran resmi dikirim maksimal 1 x 24 jam kerja.</p>
                </div>
                <div class="form__ok" hidden role="status">
                    <span class="tick"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg></span>
                    <p><b>WhatsApp sudah dibuka.</b> Jika tidak muncul, <a href="#" data-wa-retry target="_blank" rel="noopener">klik di sini untuk mengirim pesan</a>.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
