@extends($v . '.layouts.app')

@section('active', 'appointment')
@section('title', 'Appointment — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', [
        'heading' => 'Booking Appointment',
        'lead'    => 'Pesan jadwal perawatan Anda sekarang.',
    ])

    <div class="cg-container cg-inner">
        <div class="cg-appt-layout">
            @include($v . '.sections.appointment', ['full' => true])

            <aside class="cg-appt-aside" aria-label="Informasi booking">
                <figure class="cg-appt-photo">
                    <img src="{{ $img }}/clinic-facility.jpg" alt="Ruang klinik {{ $c['brand']['name'] }}" width="512" height="656" loading="lazy" decoding="async">
                </figure>

                <div class="cg-card">
                    <h2 class="cg-card__title">Cara Booking</h2>
                    <ol class="cg-steps">
                        <li><strong>Isi formulir</strong><span>Pilih layanan, dokter, tanggal, dan jam.</span></li>
                        <li><strong>Kirim lewat WhatsApp</strong><span>Pesan booking Anda terisi otomatis.</span></li>
                        <li><strong>Tunggu konfirmasi</strong><span>Tim kami memastikan jadwal dan menjawab pertanyaan Anda.</span></li>
                    </ol>
                </div>

                <div class="cg-card">
                    <h2 class="cg-card__title">Jam Operasional</h2>
                    <ul class="cg-hours" data-cg-hours>
                        @foreach ($c['schedule']['hours'] as $h)
                            <li class="cg-hours__row" data-days="{{ implode(',', $h['days']) }}" data-open="{{ $h['open'] }}" data-close="{{ $h['close'] }}">
                                <span class="cg-hours__day"><i class="bi {{ $h['icon'] }}" aria-hidden="true"></i> {{ $h['label'] }}</span>
                                <span class="cg-hours__time">{{ str_replace(':', '.', $h['open']) }} - {{ str_replace(':', '.', $h['close']) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="cg-contact-list">
                        <li><i class="bi bi-telephone" aria-hidden="true"></i> <a href="tel:{{ $c['contact']['phone_raw'] }}">{{ $c['contact']['phone'] }}</a></li>
                        <li><i class="bi bi-geo-alt" aria-hidden="true"></i> {{ $c['contact']['address'] }}</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection
