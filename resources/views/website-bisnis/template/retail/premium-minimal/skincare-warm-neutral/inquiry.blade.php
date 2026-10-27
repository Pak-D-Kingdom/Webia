@extends($ns . '.layouts.app')

@section('title', 'Inquiry — ' . $skin['name'])
@section('description', 'Kirim pertanyaan atau permintaan produk GlowEra melalui WhatsApp.')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Inquiry', 'text' => 'Ceritakan kebutuhan kulitmu, tim kami akan membalas melalui WhatsApp.'])

    <section class="section section--pt0">
        <div class="container iq-layout">
            <div class="panel">
                <h2 class="panel__title">Formulir Inquiry</h2>
                <p class="panel__sub">Formulir ini dikirim langsung ke WhatsApp admin {{ $skin['name'] }}.</p>
                @include($ns . '.partials.inquiry-form', ['compact' => false, 'fid' => 'pg'])
            </div>

            <aside class="iq-side">
                <div class="panel">
                    <h2 class="panel__title panel__title--sm">Kontak Kami</h2>
                    <ul class="contact-list">
                        <li><i class="bi bi-geo-alt-fill"></i><span>{{ $skin['contact']['address'] }}</span></li>
                        <li><i class="bi bi-telephone-fill"></i><span>{{ $skin['contact']['phone'] }}</span></li>
                        <li><i class="bi bi-envelope-fill"></i><span>{{ $skin['contact']['email'] }}</span></li>
                        <li><i class="bi bi-clock-fill"></i><span>Layanan {{ $skin['contact']['hours'] }}</span></li>
                    </ul>
                    <a class="btn btn--block" href="https://wa.me/{{ $skin['whatsapp'] }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> Chat Langsung</a>
                </div>
                <div class="promo promo--static">
                    <img src="{{ asset($skin['img'] . '/promo-model.jpg') }}" alt="" width="170" height="268" loading="lazy">
                    <div class="promo__txt">
                        <h3>Konsultasi<br>Skincare</h3>
                        <p>Tanyakan produk yang cocok untuk jenis kulitmu.</p>
                    </div>
                </div>
            </aside>
        </div>
    </section>
@endsection
