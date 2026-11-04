@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Sertifikasi - ' . $data['brand']['name'])
@section('page_key', 'sertifikasi')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'sertifikasi',
        'bannerTitle' => $data['certifications']['title'],
        'bannerText'  => $data['certifications']['text'],
    ])

    <section class="inner">
        <div class="inner__wrap">
            <ul class="cert-grid">
                @foreach ($data['certifications']['items'] as $c)
                    <li class="cert-card reveal">
                        <div class="cert-card__logo"><img src="{{ $img }}/{{ $c['image'] }}" alt="Logo {{ $c['name'] }}" loading="lazy"></div>
                        <h2>{{ $c['name'] }}</h2>
                        <p>{{ $c['text'] }}</p>
                        <p class="cert-card__scope"><svg class="ico"><use href="#i-check"></use></svg>{{ $c['scope'] }}</p>
                    </li>
                @endforeach
            </ul>

            <aside class="notice">
                <svg class="ico"><use href="#i-quality"></use></svg>
                <p>{{ $data['certifications']['note'] }}</p>
                <a class="btn btn--primary btn--sm" href="{{ $u['b2b'] }}">Minta Dokumen Sertifikat <svg class="ico"><use href="#i-arrow"></use></svg></a>
            </aside>
        </div>
    </section>

    @include($v . '.partials.explore', ['exploreKeys' => ['spesifikasi', 'b2b', 'chatbot']])
@endsection
