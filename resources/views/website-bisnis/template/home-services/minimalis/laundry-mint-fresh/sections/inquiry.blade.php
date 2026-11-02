<article class="lw-card lw-card--inquiry">
    <header class="lw-card__head lw-card__head--ico">
        <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-chat"/></svg></span>
        <div>
            <h2 class="lw-card__title lw-card__title--sm">{{ $c['inquiry']['title'] }}</h2>
            <p>{{ $c['inquiry']['sub'] }}</p>
        </div>
    </header>
    <ul class="lw-contact-rows">
        <li><span class="lw-ico lw-ico--wa"><svg class="lw-i"><use href="#i-whatsapp"/></svg></span><span>WhatsApp</span><a href="https://wa.me/{{ $c['contact']['whatsapp'] }}" target="_blank" rel="noopener">{{ $c['contact']['phone'] }}</a></li>
        <li><span class="lw-ico lw-ico--wa"><svg class="lw-i"><use href="#i-phone"/></svg></span><span>Telepon</span><a href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}">{{ $c['contact']['phone'] }}</a></li>
        <li><span class="lw-ico lw-ico--wa"><svg class="lw-i"><use href="#i-mail"/></svg></span><span>Email</span><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
    </ul>
    <a class="lw-btn lw-btn--sm" href="{{ $r('inquiry') }}">{{ $c['inquiry']['cta'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
</article>
