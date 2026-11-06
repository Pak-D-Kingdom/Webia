{{-- Halaman Transparansi Keuangan --}}
@include($v('partials.page-header'))

@php
    $acc = 0;
    $stops = [];
    foreach ($cfg['finance']['allocation'] as $a) {
        $from = $acc;
        $acc += $a['value'];
        $stops[] = $a['color'].' '.$from.'% '.$acc.'%';
    }
    $conic = 'conic-gradient('.implode(', ', $stops).')';
@endphp

<section class="fh-sec">
    <div class="fh-wrap">
        <ul class="fh-fincards">
            @foreach ($cfg['finance']['cards'] as $c)
                <li class="fh-panel fh-reveal"><span>{{ $c['label'] }}</span><strong>{{ $c['value'] }}</strong></li>
            @endforeach
        </ul>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap fh-split fh-split--even">
        <div class="fh-reveal">
            <div class="fh-sec__head fh-sec__head--left">
                <h2>Alokasi Dana 2025</h2>
                <p>Sebagian besar donasi disalurkan langsung ke program sosial.</p>
            </div>
            <div class="fh-alloc">
                <div class="fh-donut" style="--donut: {{ $conic }}" role="img" aria-label="Diagram alokasi dana: program sosial 82 persen, operasional 11 persen, pengembangan 7 persen">
                    <span><strong>82%</strong>ke program</span>
                </div>
                <ul class="fh-legend">
                    @foreach ($cfg['finance']['allocation'] as $a)
                        <li><i style="background: {{ $a['color'] }}"></i><span>{{ $a['label'] }}</span><strong>{{ $a['value'] }}%</strong></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="fh-reveal">
            <div class="fh-sec__head fh-sec__head--left">
                <h2>Prinsip Keuangan Kami</h2>
                <p>Cara kami menjaga amanah para donatur.</p>
            </div>
            <ul class="fh-principles">
                @foreach ($cfg['finance']['principles'] as $p)
                    <li>
                        <span class="fh-panel__ic">{{ $icon(['shield', 'file', 'check'][$loop->index] ?? 'check') }}</span>
                        <div><h3>{{ $p['title'] }}</h3><p>{{ $p['text'] }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<section class="fh-sec">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <h2>Laporan Keuangan Tahunan</h2>
            <p>Ringkasan pemasukan dan penyaluran dana, siap diunduh.</p>
        </div>
        <ul class="fh-fintable fh-reveal">
            <li class="fh-fintable__head" aria-hidden="true"><span>Laporan</span><span>Pemasukan</span><span>Penyaluran</span><span></span></li>
            @foreach ($cfg['finance']['reports'] as $r)
                <li>
                    <span class="fh-fintable__title"><b>{{ $r['year'] }}</b>{{ $r['title'] }}<small>{{ $r['size'] }}</small></span>
                    <span data-label="Pemasukan">{{ $r['income'] }}</span>
                    <span data-label="Penyaluran">{{ $r['spent'] }}</span>
                    <a class="fh-btn fh-btn--dark fh-btn--sm" href="#" data-fh-noop="Tautkan tombol ini ke berkas {{ $r['title'] }}.">{{ $icon('download') }}Unduh</a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include($v('partials.cta-band'), [
    'ctaTitle' => 'Donasi Anda, tercatat dan terlaporkan',
    'ctaText' => 'Berbagi dengan tenang karena setiap rupiah dilaporkan secara terbuka.',
    'ctaLabel' => 'Donasi Sekarang', 'ctaUrl' => $url('donasi'),
])
