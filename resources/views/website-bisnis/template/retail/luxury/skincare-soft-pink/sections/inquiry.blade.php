@php $full = $full ?? false; $c = $cfg['contact']; @endphp
<section id="inquiry" class="panel inq {{ $full ? 'panel--full' : 'panel--preview' }}">
    <div class="inq__grid">
        <div class="inq__info">
            <h2>Inquiry Produk</h2>
            <p>Tanyakan produk, stok, harga, atau kerja sama reseller. Tim Belleza membalas langsung lewat WhatsApp pada jam layanan.</p>
            <ul class="inq__list">
                <li><i class="bi bi-whatsapp" aria-hidden="true"></i><span><strong>WhatsApp</strong><a href="https://wa.me/{{ $c['whatsapp'] }}" target="_blank" rel="noopener">Chat sekarang</a></span></li>
                <li><i class="bi bi-envelope" aria-hidden="true"></i><span><strong>Email</strong><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></span></li>
                <li><i class="bi bi-clock" aria-hidden="true"></i><span><strong>Jam layanan</strong>{{ $c['hours'] }}</span></li>
                @if ($full)
                    <li><i class="bi bi-geo-alt" aria-hidden="true"></i><span><strong>Alamat</strong>{{ $c['address'] }}</span></li>
                @endif
            </ul>
            @unless ($full)
                <a class="more" href="{{ route($rp . 'inquiry') }}">Buka halaman inquiry <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            @endunless
        </div>
        <div class="inq__form">
            @include($ns . '.partials.inquiry-form', ['compact' => ! $full])
        </div>
    </div>
</section>
