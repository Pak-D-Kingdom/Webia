@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Transparansi Keuangan — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Laporan Transparansi Keuangan', 'lead' => $fd['financial']['summary']])

<section class="fd-section">
    <div class="fd-wrap fd-split" style="align-items:start">
        <div class="fd-panel fd-reveal">
            <h3>Alokasi Penggunaan Dana</h3>
            <p style="margin-bottom:18px">Gambaran umum penggunaan dana donasi tahun berjalan.</p>
            <div class="fd-meter">
                @foreach ($fd['financial']['allocation'] as $a)
                    <div><header><span>{{ $a[0] }}</span><b>{{ $a[1] }}%</b></header><span class="fd-meter__bar"><i data-w="{{ $a[1] }}"></i></span></div>
                @endforeach
            </div>
        </div>
        <div class="fd-media fd-media--sm fd-reveal"><img src="{{ $i('report.jpg') }}" alt="Dokumen laporan keuangan dengan grafik dan kaca pembesar" loading="lazy" style="aspect-ratio:3/2"></div>
    </div>
</section>

<section class="fd-section fd-section--tint">
    <div class="fd-wrap">
        <div class="fd-sectionhead fd-reveal"><h2>Ringkasan Tahunan</h2><p>Penerimaan dan penyaluran dana per tahun beserta opini auditor.</p></div>
        <div class="fd-table-wrap fd-reveal">
            <table class="fd-table">
                <thead><tr><th>Tahun</th><th>Total Penerimaan</th><th>Total Penyaluran</th><th>Status Audit</th></tr></thead>
                <tbody>
                    @foreach ($fd['financial']['years'] as $y)
                        <tr><td><b>{{ $y[0] }}</b></td><td>{{ $y[1] }}</td><td>{{ $y[2] }}</td><td><span class="fd-tag">{{ $y[3] }}</span></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="fd-note" style="margin-top:10px">Angka pada halaman ini adalah contoh tampilan; ganti dengan data resmi yayasan.</p>
    </div>
</section>

<section class="fd-section">
    <div class="fd-wrap">
        <div class="fd-sectionhead fd-reveal"><h2>Unduh Dokumen Laporan</h2></div>
        <div class="fd-grid fd-grid--2">
            @foreach ($fd['financial']['reports'] as $d)
                <a class="fd-doc fd-reveal" href="#" data-fd-toast="Dokumen akan tersedia setelah file laporan diunggah.">
                    <span class="fd-card__ico"><svg class="fd-ico"><use href="#fd-i-doc"/></svg></span>
                    <span><b>{{ $d[0] }}</b><small>{{ $d[1] }}</small></span>
                    <svg class="fd-ico"><use href="#fd-i-download"/></svg>
                </a>
            @endforeach
        </div>
    </div>
</section>
@include($fdBase . '.partials.cta', ['heading' => 'Percaya, lalu berbagi', 'text' => 'Setiap rupiah dapat dilacak penggunaannya.', 'label' => 'Donasi Sekarang', 'route' => 'donation'])
@endsection
