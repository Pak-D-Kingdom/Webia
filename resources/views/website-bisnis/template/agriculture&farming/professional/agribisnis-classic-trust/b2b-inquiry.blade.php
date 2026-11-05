@extends($v . '.layout')

@section('title', 'B2B Inquiry — AgroTrade')
@section('description', 'Ajukan kemitraan bisnis dengan AgroTrade: importir, distributor, pabrik pengolahan, retail, dan eksportir.')

@section('content')
@php $img = fn ($f) => asset($agro['img_path'] . '/' . $f); $b = $agro['b2b']; @endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'B2B Inquiry',
    'ph_lead'  => $b['text'] . ' Isi formulir berikut dan tim kemitraan kami akan menghubungi Anda.',
    'ph_icon'  => 'handshake',
])

<section class="container section">
    <div class="split split--form">
        <aside class="side">
            <h2>Mengapa bermitra dengan AgroTrade?</h2>
            <ul class="benefits">
                @foreach ($b['benefits'] as $x)
                    <li>
                        <span class="tick"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg></span>
                        <div><b>{{ $x[0] }}</b><p>{{ $x[1] }}</p></div>
                    </li>
                @endforeach
            </ul>
            <div class="card contact-mini">
                <h3>Hubungi langsung</h3>
                <ul>
                    <li><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:+622155558888">+62 21 5555 8888</a></li>
                    <li><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:info@agrotrade.co.id">info@agrotrade.co.id</a></li>
                    <li><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg><span>Senin – Jumat, 08:00 – 17:00 WIB</span></li>
                </ul>
            </div>
        </aside>

        <div class="card formcard">
            <h2>Formulir Inquiry</h2>
            <p class="formcard__sub">Kolom bertanda <span class="req">*</span> wajib diisi. Pesan akan dikirim melalui WhatsApp tim kemitraan kami.</p>

            <form class="form" id="b2bForm" data-wa-form data-wa-title="B2B INQUIRY — AgroTrade" novalidate>
                <div class="form__grid">
                    <div class="field">
                        <label for="b_nama">Nama lengkap <span class="req">*</span></label>
                        <input type="text" id="b_nama" name="nama" data-label="Nama" required autocomplete="name" placeholder="Nama Anda">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="b_perusahaan">Nama perusahaan <span class="req">*</span></label>
                        <input type="text" id="b_perusahaan" name="perusahaan" data-label="Perusahaan" required autocomplete="organization" placeholder="PT / CV / Koperasi">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="b_email">Email <span class="req">*</span></label>
                        <input type="email" id="b_email" name="email" data-label="Email" required autocomplete="email" placeholder="nama@perusahaan.com">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="b_wa">No. WhatsApp / telepon <span class="req">*</span></label>
                        <input type="tel" id="b_wa" name="telepon" data-label="Telepon" required data-type="phone" autocomplete="tel" inputmode="tel" placeholder="08xx atau +62xx">
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="b_jenis">Jenis kemitraan <span class="req">*</span></label>
                        <select id="b_jenis" name="jenis" data-label="Jenis Kemitraan" required class="select">
                            <option value="" selected disabled>Pilih jenis kemitraan</option>
                            @foreach ($b['types'] as $t)<option value="{{ $t }}">{{ $t }}</option>@endforeach
                        </select>
                        <p class="field__err" hidden></p>
                    </div>
                    <div class="field">
                        <label for="b_komoditas">Komoditas diminati</label>
                        <select id="b_komoditas" name="komoditas" data-label="Komoditas" class="select">
                            <option value="" selected>Semua komoditas</option>
                            @foreach ($agro['commodities'] as $c)<option value="{{ $c['slug'] }}">{{ $c['name'] }}</option>@endforeach
                        </select>
                    </div>
                    <div class="field field--full">
                        <label for="b_negara">Negara / kota perusahaan</label>
                        <input type="text" id="b_negara" name="lokasi" data-label="Lokasi" autocomplete="off" placeholder="Mis. Surabaya, Indonesia">
                    </div>
                    <div class="field field--full">
                        <label for="b_pesan">Pesan / kebutuhan <span class="req">*</span></label>
                        <textarea id="b_pesan" name="pesan" data-label="Pesan" rows="4" required placeholder="Ceritakan kebutuhan komoditas, volume, dan rencana kerja sama Anda"></textarea>
                        <p class="field__err" hidden></p>
                    </div>
                </div>

                <div class="form__foot">
                    <button type="submit" class="btn btn--amber btn--lg">
                        <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim via WhatsApp
                    </button>
                    <p class="form__hint">Dengan mengirim, Anda menyetujui dihubungi oleh tim AgroTrade.</p>
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
