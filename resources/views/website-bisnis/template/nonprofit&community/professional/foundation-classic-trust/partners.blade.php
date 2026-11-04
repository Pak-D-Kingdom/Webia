@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Mitra & Sponsor — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Mitra & Sponsor', 'lead' => 'Bersama dengan berbagai pihak terpercaya untuk memperluas manfaat bagi masyarakat.'])

<section class="fd-section">
    <div class="fd-wrap">
        <div class="fd-grid" style="grid-template-columns:repeat(auto-fit,minmax(190px,1fr))">
            @foreach ($fd['partners'] as $p)
                <div class="fd-panel fd-reveal" style="text-align:center;padding:18px">
                    <img src="{{ $i($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" style="margin:0 auto 12px;width:150px;aspect-ratio:72/48;object-fit:contain;animation:fd-floaty 6s ease-in-out {{ $loop->index * -1.1 }}s infinite">
                    <b style="color:var(--fd-navy)">{{ $p['name'] }}</b><br><span class="fd-tag" style="margin-top:6px">{{ $p['type'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="fd-section fd-section--tint">
    <div class="fd-wrap">
        <div class="fd-sectionhead fd-reveal"><h2>Cara Berkolaborasi</h2><p>Tiga jalur kemitraan yang dapat disesuaikan dengan tujuan perusahaan Anda.</p></div>
        <div class="fd-grid fd-grid--3">
            <div class="fd-panel fd-value fd-reveal"><h3>Program CSR</h3><p>Danai atau adopsi satu program selama periode tertentu, lengkap dengan laporan dampak.</p></div>
            <div class="fd-panel fd-value fd-reveal"><h3>Donasi Barang &amp; Jasa</h3><p>Salurkan produk, teknologi, atau keahlian karyawan untuk mendukung kegiatan lapangan.</p></div>
            <div class="fd-panel fd-value fd-reveal"><h3>Kemitraan Kegiatan</h3><p>Berkolaborasi pada acara bersama seperti aksi tanam pohon dan layanan kesehatan gratis.</p></div>
        </div>
    </div>
</section>

<section class="fd-section" style="padding-top:8px">
    <div class="fd-wrap">
        <div class="fd-cta fd-reveal">
            <div><h3>Tertarik menjadi mitra?</h3><p>Ceritakan rencana Anda; tim kami akan menghubungi melalui WhatsApp.</p></div>
            <a class="fd-btn fd-btn--gold" target="_blank" rel="noopener" href="https://wa.me/{{ $fd['contact']['whatsapp'] }}?text={{ rawurlencode('Halo, kami tertarik menjadi mitra/sponsor Harapan Untuk Negeri Foundation.') }}">Hubungi Kami <svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg></a>
        </div>
    </div>
</section>
@endsection
