{{-- Halaman Laporan Dampak --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap">
        <ul class="fh-bignums">
            @foreach ($cfg['impact']['stats'] as $s)
                <li class="fh-reveal">
                    <img src="{{ $img($s['icon']) }}" alt="" width="56" height="50" loading="lazy">
                    <strong data-fh-count="{{ $s['value'] >= 1000 ? $s['value'] / 1000 : $s['value'] }}" data-fh-suffix="{{ $s['suffix'] }}">{{ $s['display'] }}</strong>
                    <span>{{ $s['label'] }}</span>
                </li>
            @endforeach
            @foreach ($cfg['impact']['more'] as $m)
                <li class="fh-reveal fh-bignums__plain">
                    <strong>{{ $m['display'] }}</strong>
                    <span>{{ $m['label'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap fh-split fh-split--even">
        <div class="fh-reveal">
            <div class="fh-sec__head fh-sec__head--left">
                <span class="fh-eyebrow">Pertumbuhan</span>
                <h2>Penerima Manfaat per Tahun</h2>
                <p>Jumlah kumulatif penerima manfaat (dalam ribuan orang).</p>
            </div>
            @php
                $chartMax = max(array_column($cfg["impact"]["chart"], "value"));
            @endphp
            <ul class="fh-bars" role="img" aria-label="Grafik batang penerima manfaat kumulatif per tahun">
                @foreach ($cfg['impact']['chart'] as $c)
                    <li style="--h: {{ round($c['value'] / $chartMax, 2) }}">
                        <span class="fh-bars__val">{{ $c['value'] }}K</span>
                        <span class="fh-bars__bar"></span>
                        <span class="fh-bars__year">{{ $c['year'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="fh-reveal">
            <div class="fh-sec__head fh-sec__head--left">
                <span class="fh-eyebrow">Capaian</span>
                <h2>Dampak per Program</h2>
                <p>Capaian utama dari empat program kami.</p>
            </div>
            <ul class="fh-progs">
                @foreach ($cfg['programs'] as $p)
                    <li>
                        <img src="{{ $img($p['icon']) }}" alt="" width="40" height="40" loading="lazy">
                        <div><strong>{{ $p['stat'] }}</strong> <span>{{ $p['stat_label'] }}</span><small>{{ $p['title'] }}</small></div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<section class="fh-sec" id="laporan">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <span class="fh-eyebrow">Unduh</span>
            <h2>Laporan Dampak Tahunan</h2>
            <p>Unduh laporan lengkap untuk melihat capaian dan cerita di baliknya.</p>
        </div>
        <ul class="fh-grid fh-grid--3">
            @foreach ($cfg['impact']['reports'] as $r)
                <li class="fh-panel fh-report fh-reveal">
                    <span class="fh-report__year">{{ $r['year'] }}</span>
                    <h3>{{ $r['title'] }}</h3>
                    <p>{{ $r['text'] }}</p>
                    <div class="fh-report__foot">
                        <small>{{ $r['size'] }}</small>
                        <a class="fh-btn fh-btn--dark fh-btn--sm" href="#" data-fh-noop="Tautkan tombol ini ke berkas {{ $r['title'] }}.">{{ $icon('download') }}Unduh</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include($v('partials.cta-band'), [
    'ctaTitle' => 'Jadi bagian dari angka berikutnya',
    'ctaText' => 'Donasi dan waktu Anda membantu kami menjangkau lebih banyak orang tahun ini.',
    'ctaLabel' => 'Donasi Sekarang', 'ctaUrl' => $url('donasi'),
    'ctaLabel2' => 'Lihat Transparansi', 'ctaUrl2' => $url('transparansi'),
])
