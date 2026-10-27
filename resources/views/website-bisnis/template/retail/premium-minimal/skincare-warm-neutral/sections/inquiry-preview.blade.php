<section class="section" id="inquiry-preview">
    <div class="container iq-prev">
        <div class="iq-prev__info" data-reveal>
            <p class="kicker"><span></span>INQUIRY</p>
            <h2 class="sec-title">Konsultasi &amp; Pertanyaan Produk</h2>
            <p class="sec-sub">Ceritakan kebutuhan kulitmu, tim kami akan membalas lewat WhatsApp.</p>
            <ul class="contact-list">
                <li><i class="bi bi-geo-alt-fill"></i><span>{{ $skin['contact']['address'] }}</span></li>
                <li><i class="bi bi-telephone-fill"></i><span>{{ $skin['contact']['phone'] }}</span></li>
                <li><i class="bi bi-clock-fill"></i><span>Layanan {{ $skin['contact']['hours'] }}</span></li>
            </ul>
            <a class="link" href="{{ route('skincare-warm-neutral.inquiry') }}">Buka halaman Inquiry <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="panel" data-reveal>
            @include($ns . '.partials.inquiry-form', ['compact' => true, 'fid' => 'pv'])
        </div>
    </div>
</section>
