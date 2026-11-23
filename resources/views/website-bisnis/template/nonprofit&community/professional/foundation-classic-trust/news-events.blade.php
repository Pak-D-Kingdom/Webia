@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Berita & Acara — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Berita & Acara Terbaru', 'lead' => 'Ikuti kabar terbaru dan kegiatan kami di lapangan.', 'icon' => 'news', 'chips' => []])

<section class="fd-section">
    <div class="fd-wrap">
        <div class="fd-filters" data-fd-filter role="group" aria-label="Filter kategori">
            <button type="button" class="fd-chip is-active" data-cat="all" aria-pressed="true">Semua</button>
            <button type="button" class="fd-chip" data-cat="Berita" aria-pressed="false">Berita</button>
            <button type="button" class="fd-chip" data-cat="Acara" aria-pressed="false">Acara</button>
        </div>
        <div class="fd-grid fd-grid--2">
            @foreach ($fd['news'] as $n)
                <article id="{{ $n['slug'] }}" class="fd-hcard fd-ncard fd-reveal" data-cat="{{ $n['category'] }}">
                    <span class="fd-hcard__img fd-pbox" style="--pw:{{ str_starts_with($n['photo'], 'photo-') ? 190 : 150 }}px"><img class="fd-pbox__bg" src="{{ $i($n['photo']) }}" alt="" aria-hidden="true" loading="lazy"><img src="{{ $i($n['photo']) }}" alt="" loading="lazy" width="1200" height="900"><span class="fd-tag {{ $n['category'] === 'Acara' ? 'fd-tag--gold' : '' }}">{{ $n['category'] }}</span></span>
                    <div class="fd-hcard__body">
                        <small class="fd-hcard__date"><svg class="fd-ico"><use href="#fd-i-calendar"/></svg>{{ $n['date'] }}</small>
                        <h3>{{ $n['title'] }}</h3>
                        <p>{{ $n['excerpt'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@include($fdBase . '.partials.cta', ['heading' => 'Ingin ikut di kegiatan berikutnya?', 'text' => 'Daftar sebagai relawan dan dapatkan info acara lebih awal.', 'label' => 'Daftar Relawan', 'route' => 'volunteer'])
@endsection
