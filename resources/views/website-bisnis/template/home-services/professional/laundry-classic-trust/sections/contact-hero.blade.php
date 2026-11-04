{{-- Hero khusus halaman Order Inquiry --}}
<section class="phero chero">
    <img class="phero__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true">
    <div class="lw-wrap chero__in">
        <div class="chero__txt">
            <nav class="crumb" aria-label="Breadcrumb"><a href="{{ $url('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Order Inquiry</span></nav>
            <h1>Order Inquiry</h1>
            <p>Hubungi kami untuk informasi dan pemesanan. Tim {{ $c['brand']['name'] }} siap membantu Anda setiap hari.</p>
            <div class="chero__act">
                <a class="btn btn--wa" href="{{ $wa() }}" target="_blank" rel="noopener"><svg class="ic"><use href="#i-whatsapp"/></svg>Chat WhatsApp</a>
                <a class="btn btn--ghost" href="tel:{{ $c['contact']['phone_tel'] }}"><svg class="ic"><use href="#i-phone"/></svg>Telepon</a>
                <a class="btn btn--ghost" href="mailto:{{ $c['contact']['email'] }}"><svg class="ic"><use href="#i-mail"/></svg>Email</a>
            </div>
            <ul class="chero__chips">
                <li><svg class="ic"><use href="#i-pin"/></svg>{{ implode(', ', array_column($c['areas'], 'name')) }}</li>
                <li><svg class="ic"><use href="#i-timer"/></svg>Express {{ $c['turnaround'][1]['time'] }}</li>
                <li><svg class="ic"><use href="#i-check"/></svg>Konfirmasi lewat WhatsApp</li>
            </ul>
        </div>
        <div class="chero__art">
            <img src="{{ $img('bunny-freshbot.png') }}" alt="Maskot FreshWash dengan keranjang laundry" loading="eager">
            <p class="chero__bubble">Halo! Ada yang bisa kami bantu?</p>
            <p class="chero__badge"><span class="status" data-open-status><span class="status__dot"></span><span data-open-text>Memeriksa...</span></span><small>Setiap hari {{ $c['hours']['open'] }} - {{ $c['hours']['close'] }}</small></p>
        </div>
    </div>
</section>
