@php
    $c  = $t['contact'];
    $wa = 'https://wa.me/'.$c['whatsapp'].'?text='.rawurlencode('Halo GreenEstate, saya ingin menjadwalkan viewing properti.');
@endphp
<section class="panel info" aria-labelledby="h-info">
    <svg class="deco info__deco" aria-hidden="true"><use href="#i-branch"/></svg>
    <h2 id="h-info" class="panel__title">Informasi Viewing</h2>
    <p class="panel__sub">Kami siap menemani kunjungan Anda</p>

    <ul class="info-list">
        <li><span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg></span><span><small>Jam Operasional</small><b>{{ $c['hours'] }}</b></span></li>
        <li><span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg></span><span><small>Kantor Kami</small><b>{{ $c['address'] }}</b></span></li>
        <li><span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg></span><span><small>Telepon</small><b><a href="tel:{{ $c['phone_tel'] }}">{{ $c['phone'] }}</a></b></span></li>
        <li><span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg></span><span><small>Email</small><b><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></b></span></li>
    </ul>
</section>

<section class="panel" aria-labelledby="h-steps">
    <h2 id="h-steps" class="panel__title">Cara Kerjanya</h2>
    <ol class="steps">
        @foreach ($t['booking']['steps'] as $step)
            <li><b>{{ $step['title'] }}</b><span>{{ $step['text'] }}</span></li>
        @endforeach
    </ol>
    <a class="btn btn--primary btn--block" href="{{ $wa }}" target="_blank" rel="noopener"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg> Tanya via WhatsApp</a>
</section>
