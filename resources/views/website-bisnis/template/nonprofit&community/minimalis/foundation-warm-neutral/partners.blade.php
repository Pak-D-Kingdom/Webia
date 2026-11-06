@extends($v.'.layouts.app')

@section('title', 'Mitra & Sponsor - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-partners')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Mitra', 'title' => 'Mitra & Sponsor', 'lead' => $f['partners']['subtitle'], 'eyebrow' => 'Bergerak bersama', 'image' => 'volunteer-page.jpg', 'alt' => 'Tangan-tangan bertumpuk menandakan kemitraan', 'cta_label' => 'Jadi Mitra', 'cta_href' => route($rp.'donation'), 'chip_a_value' => '120+', 'chip_a_label' => 'Mitra & sponsor', 'chip_b_value' => '5', 'chip_b_label' => 'Mitra utama'])

    <div class="hf-container hf-page">
        <section class="hf-section hf-section--tight" data-reveal>
            <ul class="hf-grid hf-grid--3 hf-partnerlist" data-stagger>
                @foreach($f['partners']['items'] as $p)
                    <li class="hf-card hf-card--pad hf-partner" id="{{ $p['key'] }}">
                        <div class="hf-logo-tile hf-logo-tile--lg"><svg viewBox="0 0 120 40" role="img" aria-label="{{ $p['name'] }}"><use href="#logo-{{ $p['key'] }}"/></svg></div>
                        <span class="hf-eyebrow">{{ $p['field'] }}</span>
                        <h2 class="hf-h3">{{ $p['name'] }}</h2>
                        <p>{{ $p['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="hf-section" data-reveal>
            <header class="hf-section__head"><span class="hf-eyebrow">Bermitra dengan kami</span><h2 class="hf-h2">Cara terlibat sebagai mitra</h2></header>
            <ul class="hf-grid hf-grid--3" data-stagger>
                @foreach($f['partners']['ways'] as $w)
                    <li class="hf-card hf-card--pad hf-value"><svg class="hf-i hf-value__icon" aria-hidden="true"><use href="#i-heart"/></svg><h3 class="hf-h3">{{ $w['title'] }}</h3><p>{{ $w['text'] }}</p></li>
                @endforeach
            </ul>
        </section>

        <section class="hf-cta" data-reveal>
            <div><h2 class="hf-h2">Tertarik menjadi mitra atau sponsor?</h2><p>Hubungi tim kemitraan kami untuk membahas bentuk kerja sama.</p></div>
            <div class="hf-cta__actions">
                <a class="hf-btn hf-btn--dark" href="https://wa.me/{{ $f['contact']['whatsapp'] }}?text={{ rawurlencode('Halo HopeTogether Foundation, kami tertarik menjadi mitra atau sponsor.') }}" target="_blank" rel="noopener"><svg class="hf-i hf-i--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg> Hubungi via WhatsApp</a>
            </div>
        </section>
    </div>
@endsection
