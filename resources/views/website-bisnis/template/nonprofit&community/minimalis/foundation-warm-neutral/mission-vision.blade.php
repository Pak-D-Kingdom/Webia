@extends($v.'.layouts.app')

@section('title', 'Misi & Visi - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-mission')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Misi & Visi', 'title' => 'Misi & Visi Kami', 'lead' => $f['mission']['summary']])

    <div class="hf-container hf-page">
        <section class="hf-split" id="visi" data-reveal>
            <div class="hf-card hf-card--pad hf-vision">
                <span class="hf-eyebrow"><svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-target"/></svg> Visi</span>
                <p class="hf-vision__text">{{ $f['mission']['vision'] }}</p>
                <p class="hf-script hf-vision__sign">Bersama, Kita Bisa</p>
            </div>
            <div class="hf-media">
                <img src="{{ asset($img.'/mission-plant.jpg') }}" width="588" height="501" alt="Dua tangan menopang tunas tanaman muda" loading="lazy">
            </div>
        </section>

        <section class="hf-section" id="misi" data-reveal>
            <header class="hf-section__head">
                <span class="hf-eyebrow">Misi</span>
                <h2 class="hf-h2">Lima langkah yang kami jalani</h2>
            </header>
            <ol class="hf-steps hf-steps--grid">
                @foreach($f['mission']['missions'] as $m)
                    <li class="hf-card hf-card--pad">
                        <span class="hf-steps__num">{{ $loop->iteration }}</span>
                        <h3 class="hf-h3">{{ $m['title'] }}</h3>
                        <p>{{ $m['text'] }}</p>
                    </li>
                @endforeach
            </ol>
        </section>

        <section class="hf-section" id="nilai" data-reveal>
            <header class="hf-section__head">
                <span class="hf-eyebrow">Nilai</span>
                <h2 class="hf-h2">Yang membuat kami tetap di jalur</h2>
            </header>
            <ul class="hf-grid hf-grid--4">
                @foreach($f['mission']['values'] as $v2)
                    <li class="hf-card hf-card--pad hf-value">
                        <svg class="hf-i hf-value__icon" aria-hidden="true"><use href="#i-heart"/></svg>
                        <h3 class="hf-h3">{{ $v2['title'] }}</h3>
                        <p>{{ $v2['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="hf-cta" data-reveal>
            <div>
                <h2 class="hf-h2">Mari wujudkan harapan itu bersama</h2>
                <p>Dukung program kami atau bergabung sebagai relawan.</p>
            </div>
            <div class="hf-cta__actions">
                <a class="hf-btn hf-btn--dark" href="{{ route($rp.'donation') }}">Dukung Sekarang <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="hf-btn hf-btn--ghost" href="{{ route($rp.'volunteer') }}">Jadi Relawan</a>
            </div>
        </section>
    </div>
@endsection
