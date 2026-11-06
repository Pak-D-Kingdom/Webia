<section class="el-hero" aria-labelledby="heroTitle">
    <div class="el-hero__bg" aria-hidden="true">
        <img class="el-hero__plant" src="{{ $img('hero-plant.jpg') }}" alt="" width="340" height="614">
    </div>
    <div class="el-container el-hero__inner">
        <div class="el-hero__copy">
            <span class="el-pill"><svg class="el-ico" aria-hidden="true"><use href="#i-play"/></svg>{{ $e['hero']['pill'] }}</span>
            <h1 id="heroTitle">{{ $e['hero']['title'][0] }}<br>{{ $e['hero']['title'][1] }}</h1>
            <p>{{ $e['hero']['text'] }}</p>
            <div class="el-hero__cta">
                <a class="el-btn el-btn--primary el-btn--lg" href="{{ route('elearning.programs') }}">{{ $e['hero']['cta'] }}<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <button type="button" class="el-btn el-btn--outline el-btn--lg" data-modal-open="elTrailer">
                    <svg class="el-ico" aria-hidden="true"><use href="#i-play"/></svg>{{ $e['hero']['trailer'] }}
                </button>
            </div>
        </div>
    </div>
    <div class="el-hero__media">
        <img src="{{ $img('hero-photo.jpg') }}" alt="Pelajar tersenyum belajar online dengan laptop dan headphone" width="1401" height="491" fetchpriority="high">
    </div>
</section>

<div class="el-modal" id="elTrailer" role="dialog" aria-modal="true" aria-label="Trailer E-learna" hidden data-modal>
    <div class="el-modal__box">
        <button type="button" class="el-modal__close" aria-label="Tutup trailer" data-modal-close><svg class="el-ico" aria-hidden="true"><use href="#i-close"/></svg></button>
        @if ($e['hero']['trailer_url'])
            <div class="el-modal__video"><iframe data-src="{{ $e['hero']['trailer_url'] }}" title="Trailer E-learna" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe></div>
        @else
            <div class="el-modal__empty">
                <img src="{{ $img('hero-photo.jpg') }}" alt="" loading="lazy">
                <p>Trailer akan segera hadir. Sementara itu, jelajahi program dan jadwal kelas kami.</p>
                <a class="el-btn el-btn--primary" href="{{ route('elearning.programs') }}">Jelajahi Program</a>
            </div>
        @endif
    </div>
</div>
