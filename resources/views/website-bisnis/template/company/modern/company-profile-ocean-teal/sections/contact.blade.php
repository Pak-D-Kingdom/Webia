@php $t = $z['topbar']; $a = $z['ai_faq']; @endphp
<section class="ot-contact" id="kontak" aria-labelledby="ot-contact-title">
    <div class="ot-contact__info">
        <h2 id="ot-contact-title">{{ $z['contact']['title'] }}</h2>
        <ul>
            <li><svg class="ot-ic" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ $t['phone_href'] }}">{{ $t['phone'] }}</a></li>
            <li><svg class="ot-ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $t['email'] }}">{{ $t['email'] }}</a></li>
            <li><svg class="ot-ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $t['address'] }}</span></li>
        </ul>
    </div>
    <div class="ot-contact__ai">
        <img src="{{ $img('mascot.png') }}" alt="Maskot asisten AI" loading="lazy" width="147" height="110">
        <div>
            <h3>{{ $a['title'] }}</h3>
            <p class="ot-bubble"><span>{{ $a['bubble'][0] }}</span><small>{{ $a['bubble'][1] }}</small></p>
            <button class="ot-btn ot-btn--primary ot-btn--sm" type="button" data-open="chat">{{ $a['button'] }}<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        </div>
    </div>
</section>
