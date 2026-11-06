{{-- Form Inquiry. Statis: validasi + pesan sukses di JS. Backend dapat memakai event "coral:form-valid" atau mengisi action. --}}
<section class="panel inquiry" id="contact" aria-labelledby="inq-title">
  <h2 class="panel__title" id="inq-title">Ajukan Pertanyaan / Inquire</h2>
  <p class="panel__sub">Tertarik dengan properti ini? Tim kami siap membantu Anda!</p>
  <form class="form" action="#" method="post" novalidate data-validate-form data-form-name="inquiry"
        data-whatsapp="{{ $site['contact']['whatsapp_leads'] }}"
        data-wa-intro="Halo Coral Homes, saya ingin mengajukan pertanyaan (Inquiry)."
        data-success="WhatsApp dibuka dengan pesan Anda. Tekan tombol kirim di WhatsApp untuk menyelesaikan.">
    @csrf
    <div class="field" data-field>
      <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-user"/></svg></span>
      <label class="sr-only" for="inq-name">Nama Lengkap</label>
      <input id="inq-name" name="name" type="text" placeholder="Nama Lengkap" required minlength="3" autocomplete="name">
      <small class="field__error" role="alert"></small>
    </div>
    <div class="field" data-field>
      <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-mail"/></svg></span>
      <label class="sr-only" for="inq-email">Email</label>
      <input id="inq-email" name="email" type="email" placeholder="Email" required autocomplete="email" inputmode="email">
      <small class="field__error" role="alert"></small>
    </div>
    <div class="field" data-field>
      <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-phone"/></svg></span>
      <label class="sr-only" for="inq-phone">No. Telepon</label>
      <input id="inq-phone" name="phone" type="tel" placeholder="No. Telepon" required data-type="phone" autocomplete="tel" inputmode="tel">
      <small class="field__error" role="alert"></small>
    </div>
    <div class="field field--area" data-field>
      <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-pencil"/></svg></span>
      <label class="sr-only" for="inq-msg">Pesan / Pertanyaan</label>
      <textarea id="inq-msg" name="message" rows="2" placeholder="Pesan / Pertanyaan" required minlength="10"></textarea>
      <small class="field__error" role="alert"></small>
    </div>
    <button class="btn btn--primary btn--block" type="submit"><span>Kirim Pesan</span> <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
    <p class="form__note"><svg class="icon" aria-hidden="true"><use href="#i-whatsapp"/></svg>Pesan Anda akan dikirim melalui WhatsApp</p>
    <p class="form__status" role="status" aria-live="polite" hidden></p>
  </form>
</section>
