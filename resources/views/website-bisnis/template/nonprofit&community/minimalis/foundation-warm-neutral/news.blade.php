@extends($v.'.layouts.app')

@section('title', 'Berita & Acara - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-news')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Berita & Acara', 'title' => 'Berita & Acara', 'lead' => $f['news']['subtitle'], 'eyebrow' => 'Kabar terbaru', 'image' => 'kids-center.jpg', 'alt' => 'Anak-anak tersenyum bersama', 'cta_label' => 'Lihat Acara', 'cta_href' => '#acara', 'chip_a_value' => '3', 'chip_a_label' => 'Acara mendatang', 'chip_b_value' => '6', 'chip_b_label' => 'Berita terbaru'])

    <div class="hf-container hf-page">
        <div class="hf-filter" role="group" aria-label="Filter berita dan acara">
            <button class="hf-chip is-active" type="button" data-filter="all">Semua</button>
            <button class="hf-chip" type="button" data-filter="Berita">Berita</button>
            <button class="hf-chip" type="button" data-filter="Acara">Acara</button>
        </div>

        <ul class="hf-grid hf-grid--3 hf-newsgrid" id="acara" data-filter-list data-stagger>
            @foreach($f['news']['events'] as $e)
                <li class="hf-card hf-eventcard" data-cat="Acara" data-reveal>
                    <div class="hf-eventcard__date"><strong>{{ $e['day'] }}</strong><span>{{ $e['month'] }} {{ $e['year'] }}</span></div>
                    <span class="hf-eyebrow">Acara</span>
                    <h2 class="hf-h3">{{ $e['title'] }}</h2>
                    <p>{{ $e['text'] }}</p>
                    <ul class="hf-meta">
                        <li><svg class="hf-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $e['place'] }}</li>
                        <li><svg class="hf-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $e['time'] }}</li>
                    </ul>
                    <a class="hf-linkmini" href="https://wa.me/{{ $f['contact']['whatsapp'] }}?text={{ rawurlencode('Halo, saya ingin ikut acara: '.$e['title']) }}" target="_blank" rel="noopener">Daftar via WhatsApp <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </li>
            @endforeach
            @foreach($f['news']['items'] as $n)
                <li class="hf-card hf-newscard" data-cat="Berita" data-reveal>
                    <img src="{{ asset($img.'/'.$n['image']) }}" width="890" height="400" alt="{{ $n['title'] }}" loading="lazy">
                    <div class="hf-newscard__body">
                        <span class="hf-eyebrow">{{ $n['category'] }} &middot; {{ $n['date'] }}</span>
                        <h2 class="hf-h3">{{ $n['title'] }}</h2>
                        <p>{{ $n['text'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
