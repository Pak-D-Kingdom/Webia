@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'process')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Our Process')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'cobalt', 'crumb' => 'Our Process', 'title' => 'Proses yang bisa Anda ikuti.', 'lead' => 'Enam tahap kerja dengan keluaran yang jelas di setiap akhir tahap, supaya Anda selalu tahu kita berada di mana.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-pp-h">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Enam tahap</span><h2 class="bca-h2" id="bca-pp-h">Dari obrolan pertama sampai serah terima.</h2></div>
            @foreach($site['process'] as $s)
                <article class="bca-pstep bca-reveal">
                    <div>
                        <span class="bca-pstep__n" aria-hidden="true">0{{ $loop->iteration }}</span>
                        <h3>{{ $s['title'] }}</h3>
                        <span class="bca-chip bca-chip--fill">{{ $s['time'] }}</span>
                        <p class="bca-p" style="margin-top:14px">{{ $s['text'] }}</p>
                    </div>
                    <div class="bca-pstep__cols">
                        <div class="bca-pbox"><h4>Yang kami lakukan</h4><ul>@foreach($s['we'] as $x)<li>{{ $x }}</li>@endforeach</ul></div>
                        <div class="bca-pbox"><h4>Yang kami minta dari Anda</h4><ul>@foreach($s['you'] as $x)<li>{{ $x }}</li>@endforeach</ul></div>
                        <div class="bca-pbox bca-pbox--out"><h4>Hasil tahap ini</h4><p>{{ $s['out'] }}</p></div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bca-section bca-tone-tint" aria-labelledby="bca-pc-h">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Sistem kolaborasi</span><h2 class="bca-h2" id="bca-pc-h">Cara kita bekerja bersama.</h2></div>
            <div class="bca-collab">
                @foreach($site['collab'] as $c)
                    <article class="bca-reveal" style="--bca-d:{{ $loop->index * 0.07 }}s"><h3>{{ $c['title'] }}</h3><p>{{ $c['text'] }}</p></article>
                @endforeach
            </div>
        </div>
    </section>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.pager', ['prev_route' => 'branding', 'prev_label' => 'Branding Showcase', 'next_route' => 'team', 'next_label' => 'Our Team'])
@endsection
