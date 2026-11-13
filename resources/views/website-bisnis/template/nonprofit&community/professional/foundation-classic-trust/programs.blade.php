@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'Program Kami — Harapan Untuk Negeri Foundation')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'Program Kami', 'lead' => 'Berbagai program untuk mewujudkan dampak nyata bagi pendidikan, kesehatan, ekonomi, dan lingkungan.'])

<section class="fd-section">
    <div class="fd-wrap" style="display:grid;gap:56px">
        @foreach ($fd['programs'] as $idx => $p)
            <article id="{{ $p['slug'] }}" class="fd-split fd-reveal {{ $idx % 2 ? 'fd-split--rev' : '' }}">
                <div class="fd-media"><img src="{{ $i($p['art']) }}" alt="Ilustrasi {{ $p['title'] }}" loading="lazy" width="800" height="500" style="aspect-ratio:16/10"></div>
                <div>
                    <span class="fd-tag fd-tag--gold">Program {{ $idx + 1 }} dari {{ count($fd['programs']) }}</span>
                    <h2 style="font-size:28px;font-weight:800;color:var(--fd-navy);margin:10px 0">{{ $p['title'] }}</h2>
                    <p style="color:var(--fd-muted)">{{ $p['desc'] }}</p>
                    <ul class="fd-list">
                        @foreach ($p['points'] as $pt)
                            <li><span class="fd-tick"><svg class="fd-ico"><use href="#fd-i-check"/></svg></span><span>{{ $pt }}</span></li>
                        @endforeach
                    </ul>
                    <div class="fd-pcard__stat" style="margin-top:18px"><span>{{ $p['stat'][0] }}</span><small>{{ $p['stat'][1] }}</small></div>
                    <div class="fd-pill-row" style="margin-top:18px">
                        <a class="fd-btn fd-btn--gold" href="{{ route('foundation-classic-trust.donation', ['jenis' => 'program']) }}">Dukung Program Ini <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                        <button type="button" class="fd-btn fd-btn--outline" data-fd-chat-ask="Program apa saja yang tersedia?">Tanya HarapanBot</button>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>
@include($fdBase . '.partials.cta', ['heading' => 'Ingin ikut mewujudkan program ini?', 'text' => 'Berdonasi atau bergabung sebagai relawan — setiap bantuan berarti.', 'label' => 'Pilihan Donasi', 'route' => 'donation'])
@endsection
