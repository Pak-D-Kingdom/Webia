{{-- Booking inquiry. $mode: preview (beranda: form + ilustrasi + preview AI) | page --}}
@php $full = ($mode ?? 'preview') === 'page'; @endphp

@if (! $full)
    <section class="ta-band" aria-labelledby="ta-inq-title">
        <div class="ta-container ta-band__in">
            <div class="ta-band__content">
                @include($ns . '.partials.section-head', [
                    'ico' => 'suitcase', 'id' => 'ta-inq-title', 'title' => 'Booking Inquiry',
                    'sub' => 'Kirim pertanyaan atau permintaan booking Anda.',
                ])
                <p class="ta-band__lead">Ceritakan destinasi dan tanggal impian Anda. Tim kami akan menghubungi lewat WhatsApp untuk konfirmasi.</p>
                <ol class="ta-band__steps">
                    <li><b>1</b>Kirim inquiry</li>
                    <li><b>2</b>Konfirmasi WhatsApp</li>
                    <li><b>3</b>Bayar DP &amp; berangkat</li>
                </ol>
                <a class="ta-btn ta-btn--light ta-btn--lg" href="{{ $routes['inquiry'] }}">Kirim Inquiry {{ $icon('arrow') }}</a>
            </div>
            <div class="ta-band__art">
                <img src="{{ $img('luggage.jpg') }}" alt="Koper, paspor, dan peta untuk liburan" loading="lazy">
            </div>
            @include($ns . '.partials.ai-preview')
        </div>
    </section>
@else
    <section class="ta-section" aria-label="Form booking inquiry">
        <div class="ta-container ta-inq-layout">
            <div class="ta-panel ta-panel--form">
                @include($ns . '.partials.section-head', [
                    'ico' => 'suitcase', 'title' => 'Kirim Inquiry',
                    'sub' => 'Isi data di bawah, kami hubungi Anda lewat WhatsApp.',
                ])
                @include($ns . '.partials.inquiry-form', ['variant' => 'full', 'uid' => 'page'])
            </div>

            <aside class="ta-inq-side">
                <div class="ta-panel">
                    <h2 class="ta-h3">Cara booking</h2>
                    <ol class="ta-steps">
                        <li><strong>Kirim inquiry</strong><span>Isi nama, destinasi, dan tanggal.</span></li>
                        <li><strong>Konfirmasi</strong><span>Tim kami menghubungi lewat WhatsApp.</span></li>
                        <li><strong>Bayar DP</strong><span>Kursi Anda terkunci setelah DP.</span></li>
                        <li><strong>Berangkat</strong><span>Pelunasan, lalu nikmati perjalanan.</span></li>
                    </ol>
                </div>
                <div class="ta-panel ta-contact">
                    <h2 class="ta-h3">Hubungi langsung</h2>
                    <ul>
                        <li>{{ $icon('whatsapp') }}<a href="https://wa.me/{{ $ta['contact']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">WhatsApp {{ $ta['contact']['phone'] }}</a></li>
                        <li>{{ $icon('mail') }}<a href="mailto:{{ $ta['contact']['email'] }}">{{ $ta['contact']['email'] }}</a></li>
                        <li>{{ $icon('clock') }}<span>{{ $ta['contact']['hours'] }}</span></li>
                        <li>{{ $icon('pin') }}<span>{{ $ta['contact']['address'] }}</span></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endif
