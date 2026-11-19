@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Harga Paket — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'HARGA TRANSPARAN', 'title' => 'Harga Paket', 'desc' => 'Harga terbaik dengan fasilitas lengkap untuk kenyamanan ibadah Anda.', 'bg' => 'price-tower.svg', 'chips' => ['Harga transparan', 'DP mulai Rp 5 juta', 'Cicilan fleksibel']])

<section class="uh-section">
    <div class="uh-container">
        <div class="uh-secthead" data-reveal>
            <small>Harga Per Orang</small>
            <h2>Pilih Paket Sesuai Kebutuhan</h2>
            <p>Harga per orang. Pilih tipe kamar yang paling nyaman untuk Anda.</p>
            <i class="uh-orn"></i>
        </div>

        <div class="uh-pricegrid">
            @foreach ($d['price_tiers'] as $i => $t)
                <article class="uh-pricecard {{ $i === 0 ? 'is-featured' : '' }}" data-reveal style="--d:{{ $i * .07 }}s">
                    @if ($i === 0)<span class="uh-badge">Paling Diminati</span>@endif
                    <h3>{{ $t['pkg'] }}</h3>
                    <small>Mulai dari</small>
                    <strong>{{ $rp($t['quad']) }}</strong>
                    <span>/ pax (quad)</span>
                    <ul>
                        <li><span>Quad (4 orang)</span><b>{{ $rp($t['quad']) }}</b></li>
                        <li><span>Triple (3 orang)</span><b>{{ $rp($t['triple']) }}</b></li>
                        <li><span>Double (2 orang)</span><b>{{ $rp($t['double']) }}</b></li>
                    </ul>
                    <a class="uh-btn {{ $i === 0 ? 'uh-btn--gold' : 'uh-btn--dark' }} uh-btn--block" href="{{ $wa('Assalamu\'alaikum, saya ingin menanyakan harga ' . $t['pkg'] . '.') }}" target="_blank" rel="noopener">Pesan Sekarang</a>
                </article>
            @endforeach
        </div>

        <div class="uh-twocol">
            <div class="uh-card" data-reveal>
                <h3 class="uh-card__title">Harga Sudah Termasuk</h3>
                <ul class="uh-list uh-list--ok">
                    @foreach ($d['price_includes'] as $x)<li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $x }}</li>@endforeach
                </ul>
            </div>
            <div class="uh-card" data-reveal style="--d:.08s">
                <h3 class="uh-card__title">Belum Termasuk</h3>
                <ul class="uh-list uh-list--no">
                    @foreach ($d['price_excludes'] as $x)<li><svg class="uh-ico" aria-hidden="true"><use href="#i-x"/></svg>{{ $x }}</li>@endforeach
                </ul>
            </div>
        </div>

        <div class="uh-secthead" data-reveal>
            <small>Mudah & Fleksibel</small>
            <h2>Skema Pembayaran</h2>
            <p>Mudah dan fleksibel agar perjalanan ibadah Anda lebih ringan.</p>
            <i class="uh-orn"></i>
        </div>
        <ol class="uh-steps uh-steps--3">
            @foreach ($d['payment_steps'] as $i => $s)
                <li data-reveal style="--d:{{ $i * .08 }}s"><span class="uh-steps__n">{{ $i + 1 }}</span><h3>{{ $s[0] }}</h3><p>{{ $s[1] }}</p></li>
            @endforeach
        </ol>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
