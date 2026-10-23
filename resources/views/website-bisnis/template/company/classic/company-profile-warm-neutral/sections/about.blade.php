{{-- TENTANG KAMI (halaman sendiri) --}}
<section class="cp-aboutpage" id="tentang-kami" aria-labelledby="cp-about-title">
    <div class="cp-container cp-aboutpage__grid">
        <div class="cp-aboutpage__text">
            <h2 class="cp-title" id="cp-about-title">{{ $about['title'] }}</h2>
            <p class="cp-about__lead">{{ $about['lead'] }}</p>
            @foreach ($about['paragraphs'] as $paragraph)
                <p class="cp-about__body">{{ $paragraph }}</p>
            @endforeach
            <div class="cp-aboutpage__actions">
                <button class="cp-btn cp-btn--primary" type="button" data-cp-video-open>{!! $icon('play') !!}Tonton Profil Kami</button>
                <a class="cp-btn cp-btn--outline" href="{{ $link('penawaran') }}" data-cp-focus-quote>Minta Penawaran {!! $icon('arrow') !!}</a>
            </div>
        </div>

        <button class="cp-video" type="button" data-cp-video-open aria-label="Putar video: Kisah Kami, Tentang Inovasi dan Kolaborasi, durasi 2 menit 45 detik">
            <img src="{{ $img('about-video.jpg') }}" alt="" width="969" height="495" loading="lazy">
        </button>
    </div>
</section>
