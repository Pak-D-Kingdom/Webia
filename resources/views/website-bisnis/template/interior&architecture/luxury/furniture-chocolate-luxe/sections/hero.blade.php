@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $h = $f['hero'];
@endphp
<section class="lf-hero" aria-labelledby="lf-hero-title">
    <div class="lf-hero__media" style="background-image:url('{{ $a($h['image']) }}')" role="img" aria-label="Ruang tamu premium dengan sofa dan furniture kayu"></div>
    <div class="lf-hero__shade" aria-hidden="true"></div>
    <svg class="lf-hero__leaf" viewBox="0 0 160 220" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.2">
        <path d="M20 215C30 150 60 90 130 20"/>
        <path d="M32 175c-18-6-26-22-24-40 20 4 30 18 24 40zM44 140c-14-12-16-30-8-46 18 10 22 28 8 46zM62 108c-10-16-8-34 4-46 14 14 12 32-4 46zM84 80c-4-18 2-34 18-42 6 18 0 34-18 42zM44 150c18-4 34 2 42 16-18 8-34 4-42-16zM64 118c16-6 32-2 42 10-16 10-32 8-42-10zM86 90c14-8 30-6 40 4-14 12-30 12-40-4z"/>
    </svg>

    <div class="lf-container lf-hero__inner">
        <div class="lf-hero__copy">
            <p class="lf-hero__eyebrow">{{ $h['eyebrow'] }}</p>
            <h1 id="lf-hero-title" class="lf-hero__title">{{ $h['title'] }} <span class="lf-script">{{ $h['script'] }}</span></h1>
            <p class="lf-hero__text">{{ $h['text'] }}</p>
            <div class="lf-hero__actions">
                <a class="lf-btn lf-btn--gold" href="{{ $r('catalog') }}">Jelajahi Katalog <svg class="ic"><use href="#i-arrow"/></svg></a>
                <button class="lf-video-btn" type="button" data-video-open aria-haspopup="dialog">
                    <span class="lf-video-btn__icon"><svg class="ic"><use href="#i-play"/></svg></span>
                    <span>Tonton Video</span>
                </button>
            </div>
        </div>

        <ul class="lf-hero__features">
            @foreach ($h['highlights'] as $item)
                <li>
                    <a href="{{ $r('hero') }}#{{ $item['id'] }}">
                        <span class="lf-hero__feature-icon"><svg class="ic"><use href="#i-{{ $item['icon'] }}"/></svg></span>
                        <span class="lf-hero__feature-text"><strong>{{ $item['title'] }}</strong><small>{{ $item['sub'] }}</small></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<div class="lf-modal" data-video-modal data-video-src="{{ $h['video'] }}" role="dialog" aria-modal="true" aria-label="Video profil {{ $f['brand']['name'] }}" hidden>
    <div class="lf-modal__box">
        <button class="lf-modal__close" type="button" data-video-close aria-label="Tutup video"><svg class="ic"><use href="#i-close"/></svg></button>
        <div class="lf-modal__stage" data-video-stage>
            <img src="{{ $a($h['image']) }}" alt="" loading="lazy">
            <p>Video profil {{ $f['brand']['name'] }} akan segera tersedia.</p>
        </div>
    </div>
</div>
