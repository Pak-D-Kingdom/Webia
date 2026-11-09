@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Persyaratan Pendaftaran — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'PENDAFTARAN', 'title' => 'Persyaratan Pendaftaran', 'desc' => 'Siapkan dokumen yang dibutuhkan untuk kelancaran proses pendaftaran Anda.', 'bg' => 'hero.svg'])

<section class="uh-section">
    <div class="uh-container">
        <div class="uh-reqgrid">
            @foreach ($d['requirements'] as $i => $q)
                <article class="uh-req" data-reveal style="--d:{{ ($i % 3) * .07 }}s">
                    <span class="uh-req__ico"><svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $q[0] }}"/></svg></span>
                    <h3>{{ $q[1] }}</h3>
                    <p>{{ $q[2] }}</p>
                </article>
            @endforeach
        </div>

        <div class="uh-secthead" data-reveal>
            <h2>Langkah Pendaftaran</h2>
            <p>Empat langkah mudah menuju Tanah Suci.</p>
            <i class="uh-orn"></i>
        </div>
        <ol class="uh-steps uh-steps--4">
            @foreach ($d['register_steps'] as $i => $s)
                <li data-reveal style="--d:{{ $i * .07 }}s"><span class="uh-steps__n">{{ $i + 1 }}</span><h3>{{ $s[0] }}</h3><p>{{ $s[1] }}</p></li>
            @endforeach
        </ol>

        <div class="uh-card uh-card--dark uh-passcta" data-reveal>
            <img src="{{ $img('passport.svg') }}" alt="" loading="lazy">
            <div>
                <h2 class="uh-card__title">Dokumen sudah lengkap?</h2>
                <p class="uh-card__sub">Kirim dokumen Anda melalui WhatsApp dan tim kami akan membantu proses pendaftaran hingga visa.</p>
                <a class="uh-btn uh-btn--gold" href="{{ $wa($d['contact']['wa_daftar']) }}" target="_blank" rel="noopener">Daftar Sekarang <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
        </div>
    </div>
</section>
@endsection
