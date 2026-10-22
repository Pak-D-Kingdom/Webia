@php $waBase = 'https://wa.me/'.$t['contact']['whatsapp']; @endphp
<section class="panel side-card inquiry" id="inquiry" aria-labelledby="h-inquiry">
    <header class="side-card__head">
        <span class="side-card__ico"><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg></span>
        <div><h2 id="h-inquiry" class="side-card__title">Inquiry</h2><p class="panel__sub">Tanyakan informasi lebih lanjut</p></div>
    </header>

    {{-- Pesan dikirim ke WhatsApp (data-wa). Untuk backend: hapus data-wa, isi data-endpoint. --}}
    <form class="form-grid form-grid--stack" method="post" action="#" data-form data-wa="{{ $waBase }}" data-wa-title="Inquiry" data-success="WhatsApp terbuka dengan pesan Anda. Tekan kirim di WhatsApp untuk menyelesaikan.">
        @csrf
        <label class="field"><span class="sr-only">Nama lengkap</span><svg class="i" aria-hidden="true"><use href="#i-user"/></svg><input name="nama" required autocomplete="name" maxlength="80" placeholder="Nama Lengkap"></label>
        <label class="field"><span class="sr-only">Email</span><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><input name="email" type="email" required autocomplete="email" maxlength="120" placeholder="Email"></label>
        <label class="field"><span class="sr-only">Nomor telepon</span><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><input name="telepon" type="tel" required autocomplete="tel" pattern="[0-9+\s\-]{8,16}" title="Gunakan 8–16 digit angka" placeholder="No. Telepon"></label>
        <label class="field field--ta"><span class="sr-only">Pesan atau pertanyaan</span><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg><textarea name="pesan" rows="3" required maxlength="500" placeholder="Pesan / Pertanyaan"></textarea></label>
        <div>
            <button class="btn btn--primary btn--block" type="submit">Kirim Inquiry <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            <p class="form-note"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg>Pesan Anda akan dikirim melalui WhatsApp.</p>
            <p class="form-status" role="status" data-form-status></p>
        </div>
    </form>
</section>
