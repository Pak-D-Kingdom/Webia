@php
    $f = $furniture;
    $r = fn ($key) => route($f['routes'][$key]);
    $c = $f['contact'];
    $wa = 'https://wa.me/' . $c['whatsapp'] . '?text=' . rawurlencode('Halo ' . $f['brand']['name'] . ', saya ingin berkonsultasi tentang furniture.');
@endphp
<div class="lf-topbar">
    <div class="lf-container lf-topbar__inner">
        <ul class="lf-topbar__info">
            <li><svg class="ic"><use href="#i-pin"/></svg><span>{{ $c['address'] }}</span></li>
            <li class="lf-hide-md"><svg class="ic"><use href="#i-clock"/></svg><span>{{ $c['hours'] }}</span></li>
            <li><svg class="ic"><use href="#i-phone"/></svg><a href="tel:{{ preg_replace('/[^0-9+]/', '', $c['phone']) }}">{{ $c['phone'] }}</a></li>
            <li class="lf-hide-lg"><svg class="ic"><use href="#i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
        </ul>
        <a class="lf-btn lf-btn--gold lf-btn--sm" href="{{ $wa }}" target="_blank" rel="noopener"><svg class="ic"><use href="#i-whatsapp"/></svg> Hubungi Kami</a>
    </div>
</div>
