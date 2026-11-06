@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
@endphp
<aside class="newsletter" aria-labelledby="nl-title">
    <svg class="deco deco--news" aria-hidden="true"><use href="#i-branch"/></svg>
    <h2 id="nl-title">Dapatkan Info &amp; Promo Terbaru</h2>
    <form class="newsletter__form" data-wa-form data-wa-subject="Saya ingin menerima info & promo terbaru PureGlow." novalidate>
        <label class="sr-only" for="nl-email">Email</label>
        <input id="nl-email" type="email" name="email" data-label="Email" placeholder="Masukkan email kamu..." required autocomplete="email">
        <button type="submit" class="round-btn" aria-label="Kirim"><svg class="ico"><use href="#i-send"/></svg></button>
    </form>
    <p class="form-error" data-form-error hidden></p>
</aside>
