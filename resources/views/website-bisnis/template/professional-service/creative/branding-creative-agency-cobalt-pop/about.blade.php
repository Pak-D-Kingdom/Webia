@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'about')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'About Us')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'cobalt', 'crumb' => 'About Us', 'title' => 'Studio kecil, keyakinan besar.', 'lead' => 'Sepuluh tahun membangun merek dengan cara yang sama: dengarkan dulu, berani kemudian, dan rapi sampai detail terakhir.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-ab-story">
        <div class="bca-wrap bca-split bca-split--wide-l">
            <div class="bca-stack-p">
                <span class="bca-label">Cerita kami</span>
                <h2 class="bca-statement" id="bca-ab-story">Nama kami dari bahan paling dasar warna: kecil, pekat, dan mengubah apa pun yang disentuhnya.</h2>
                @foreach($site['about']['story'] as $para)
                    <p class="bca-p">{{ $para }}</p>
                @endforeach
                <div class="bca-actions"><a class="bca-btn bca-btn--cobalt" href="{{ route($site['routes']['contact']) }}">Start a Project @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
            </div>
            <figure class="bca-about__img1 bca-reveal" style="box-shadow:10px 10px 0 var(--bca-coral)"><img src="{{ asset($site['asset_base'] . 'img/about-studio.jpg') }}" width="1100" height="1375" loading="lazy" alt="Meja kerja studio dengan buku sketsa, tablet, kipas palet warna, dan kopi"></figure>
        </div>
    </section>

    <section class="bca-section bca-tone-tint" aria-labelledby="bca-ab-tl">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Perjalanan</span><h2 class="bca-h2" id="bca-ab-tl">Dari ruang sewa kecil sampai 240 proyek.</h2></div>
            <ol class="bca-timeline">
                @foreach($site['about']['milestones'] as $m)
                    <li class="bca-tl bca-reveal"><b>{{ $m['year'] }}</b><p>{{ $m['text'] }}</p></li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="bca-section bca-tone-ink" aria-labelledby="bca-ab-vm">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Visi &amp; Misi</span><h2 class="bca-h2" id="bca-ab-vm">Arah yang kami pegang.</h2></div>
            <div class="bca-vm" style="grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr))">
                <div class="bca-vm__box bca-vm__box--cobalt" style="padding:clamp(24px,4vw,44px)"><h3 class="bca-h3">Visi</h3><p class="bca-statement" style="font-size:clamp(1.4rem,2.4vw,2rem)">{{ $site['about']['vision'] }}</p></div>
                <div class="bca-vm__box bca-vm__box--coral" style="padding:clamp(24px,4vw,44px)"><h3 class="bca-h3">Misi</h3><ul style="font-size:1.1rem">
                    @foreach($site['about']['mission'] as $m)<li>{{ $m }}</li>@endforeach
                </ul></div>
            </div>
        </div>
    </section>

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-ab-val">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Nilai kreatif</span><h2 class="bca-h2" id="bca-ab-val">Empat hal yang tidak kami tawar.</h2></div>
            <div class="bca-values">
                @foreach($site['about']['values'] as $v)
                    <article class="bca-value bca-reveal @if($loop->index === 0) bca-value--cobalt @endif @if($loop->index === 1) bca-value--yellow @endif @if($loop->index === 2) bca-value--coral @endif @if($loop->index === 3) bca-value--ink @endif" style="--bca-d:{{ $loop->index * 0.07 }}s">
                        <h3>{{ $v['title'] }}</h3>
                        <p>{{ $v['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bca-section bca-tone-yellow" aria-labelledby="bca-ab-adv">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Keunggulan</span><h2 class="bca-h2" id="bca-ab-adv">Mengapa klien bertahan bersama kami.</h2></div>
            <ul class="bca-adv">
                @foreach($site['about']['advantages'] as $a)
                    <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'check'])<h3>{{ $a['title'] }}</h3><p>{{ $a['text'] }}</p></li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="bca-section bca-tone-cobalt" aria-labelledby="bca-ab-ap">
        <div class="bca-wrap bca-approach">
            <figure class="bca-approach__img bca-reveal"><img src="{{ asset($site['asset_base'] . 'img/about-workshop.jpg') }}" width="1400" height="1000" loading="lazy" alt="Dinding moodboard berisi sketsa logo, palet warna, dan catatan brief"></figure>
            <div>
                <div class="bca-shead" style="margin-bottom:28px"><span class="bca-label">Pendekatan kerja</span><h2 class="bca-h2" id="bca-ab-ap">Tiga kebiasaan di setiap proyek.</h2></div>
                <ol>
                    @foreach($site['about']['approach'] as $a)
                        <li><h3>{{ $a['title'] }}</h3><p>{{ $a['text'] }}</p></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.pager', ['prev_route' => 'home', 'prev_label' => 'Home', 'next_route' => 'services', 'next_label' => 'Services'])
@endsection
