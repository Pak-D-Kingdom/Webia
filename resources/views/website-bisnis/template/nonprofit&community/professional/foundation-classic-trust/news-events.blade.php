@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Berita & Acara — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Berita & Acara Terbaru', 'lead' => 'Ikuti kabar terbaru dan kegiatan kami di lapangan.'])

<section class="fd-section">
    <div class="fd-wrap">
        <div class="fd-filters" data-fd-filter role="group" aria-label="Filter kategori">
            <button type="button" class="fd-chip is-active" data-cat="all" aria-pressed="true">Semua</button>
            <button type="button" class="fd-chip" data-cat="Berita" aria-pressed="false">Berita</button>
            <button type="button" class="fd-chip" data-cat="Acara" aria-pressed="false">Acara</button>
        </div>
        <div class="fd-grid fd-grid--3">
            @foreach ($fd['news'] as $n)
                <article id="{{ $n['slug'] }}" class="fd-pcard fd-ncard fd-reveal" data-cat="{{ $n['category'] }}" style="scroll-margin-top:90px">
                    <img src="{{ $i($n['image']) }}" alt="" loading="lazy">
                    <div class="fd-pcard__body">
                        <div style="display:flex;justify-content:space-between;align-items:center;gap:8px"><span class="fd-tag {{ $n['category'] === 'Acara' ? 'fd-tag--gold' : '' }}">{{ $n['category'] }}</span><small class="fd-note" style="display:inline-flex;gap:5px;align-items:center"><svg class="fd-ico" style="width:13px;height:13px"><use href="#fd-i-calendar"/></svg>{{ $n['date'] }}</small></div>
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
