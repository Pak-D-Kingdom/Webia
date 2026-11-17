@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'branding')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Branding Showcase')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'ink', 'crumb' => 'Branding Showcase', 'title' => 'Identitas, dari tanda sampai panduan.', 'lead' => 'Kumpulan identitas merek demo: logo, tipografi, warna, kemasan, stationery, dan brand guidelines.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-bs-boards">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Brand identity</span><h2 class="bca-h2" id="bca-bs-boards">Tiga papan identitas.</h2></div>
            @foreach($site['showcase']['boards'] as $b)
                <article class="bca-board bca-reveal">
                    <div class="bca-board__txt">
                        <span class="bca-chip">{{ $b['type'] }}</span>
                        <h3 style="margin:14px 0 10px">{{ $b['title'] }}</h3>
                        <p class="bca-p">{{ $b['note'] }}</p>
                    </div>
                    <div class="bca-board__img"><img src="{{ asset($site['asset_base'] . $b['image']) }}" width="1400" height="962" loading="lazy" alt="Papan identitas {{ $b['title'] }}: logo, palet, tipografi, dan aplikasi"></div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bca-section bca-tone-tint" aria-labelledby="bca-bs-logo">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Logo</span><h2 class="bca-h2" id="bca-bs-logo">Delapan tanda, delapan karakter.</h2></div>
            <ul class="bca-logos">
                @foreach($site['showcase']['logos'] as $l)
                    <li class="bca-logo bca-reveal" style="--bca-d:{{ ($loop->index % 4) * 0.07 }}s"><div class="bca-logo__img"><img src="{{ asset($site['asset_base'] . $l['image']) }}" width="640" height="640" loading="lazy" alt="{{ $l['alt'] }}"></div><b>{{ $l['name'] }}</b></li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-bs-col">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Warna</span><h2 class="bca-h2" id="bca-bs-col">Palet yang dibangun dari cerita merek.</h2><p class="bca-muted">Klik atau tekan warna untuk menyalin kode hex.</p></div>
            @foreach($site['showcase']['palettes'] as $pal)
                <div class="bca-pal">
                    <h3>{{ $pal['brand'] }}</h3>
                    <div class="bca-pal__row">
                        @foreach($pal['colors'] as $c)
                            <button type="button" class="bca-sw" style="background:{{ $c['hex'] }};color:{{ $c['on'] }}" data-bca-copy="{{ $c['hex'] }}" aria-label="Salin warna {{ $c['name'] }} {{ $c['hex'] }}">{{ $c['name'] }}<small>{{ $c['hex'] }}</small></button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bca-section bca-tone-yellow" aria-labelledby="bca-bs-type">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Tipografi</span><h2 class="bca-h2" id="bca-bs-type">Huruf yang membawa suara merek.</h2></div>
            <div class="bca-specs">
                @foreach($site['showcase']['typography'] as $t)
                    <article class="bca-spec bca-reveal">
                        <div class="bca-spec__aa {{ $t['class'] }}" aria-hidden="true">Aa</div>
                        <div class="bca-spec__chars {{ $t['class'] }}" aria-hidden="true">Abcdefghijklmnopqrstuvwxyz 0123456789</div>
                        <div><strong>{{ $t['face'] }}</strong><br><span class="bca-muted">{{ $t['brand'] }}: {{ $t['role'] }}</span></div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bca-section bca-tone-cobalt" aria-labelledby="bca-bs-app">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Aplikasi</span><h2 class="bca-h2" id="bca-bs-app">Kemasan, stationery, dan brand guidelines.</h2></div>
            <div class="bca-apps">
                @foreach($site['showcase']['applications'] as $a)
                    <article class="bca-app bca-reveal" style="--bca-d:{{ $loop->index * 0.08 }}s">
                        <div class="bca-app__img"><img src="{{ asset($site['asset_base'] . $a['image']) }}" width="1400" height="1000" loading="lazy" alt="{{ $a['alt'] }}"></div>
                        <h3>{{ $a['title'] }}</h3>
                        <p>{{ $a['text'] }}</p>
                    </article>
                @endforeach
            </div>
            <p class="bca-muted" style="margin-top:32px">Seluruh visual adalah render grafis demo dengan merek fiktif, bukan foto proyek nyata.</p>
        </div>
    </section>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.pager', ['prev_route' => 'portfolio', 'prev_label' => 'Portfolio', 'next_route' => 'process', 'next_label' => 'Our Process'])
@endsection
