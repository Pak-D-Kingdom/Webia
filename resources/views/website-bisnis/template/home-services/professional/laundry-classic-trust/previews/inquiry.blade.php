<section class="card b-inq" aria-labelledby="pv-inq">
    <header class="card__head card__head--ic">
        <span class="round"><svg class="ic"><use href="#i-form"/></svg></span>
        <div><h2 id="pv-inq">Order Inquiry</h2><p>Hubungi kami untuk informasi &amp; pemesanan.</p></div>
    </header>
    <ul class="inq">
        <li><svg class="ic"><use href="#i-whatsapp"/></svg><span>WhatsApp</span><a href="{{ $wa() }}" target="_blank" rel="noopener">{{ $c['contact']['phone'] }}</a></li>
        <li><svg class="ic"><use href="#i-phone"/></svg><span>Telepon</span><a href="tel:{{ $c['contact']['phone_tel'] }}">{{ $c['contact']['phone'] }}</a></li>
        <li><svg class="ic"><use href="#i-mail"/></svg><span>Email</span><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
    </ul>
    <a class="btn btn--navy btn--sm" href="{{ $url('contact') }}">Hubungi Kami <svg class="ic"><use href="#i-arrow"/></svg></a>
</section>
