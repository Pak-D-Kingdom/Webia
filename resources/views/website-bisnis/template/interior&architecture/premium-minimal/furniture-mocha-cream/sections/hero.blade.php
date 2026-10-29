{{-- HERO BANNER. $preview = true  -> versi beranda; false -> halaman Hero Banner --}}
@php $preview = $preview ?? false; $h = $cfg['hero']; $total = count($h['slides']); @endphp

<section class="fm-hero {{ $preview ? 'fm-hero--home' : 'fm-hero--page' }}" data-fm-hero aria-roledescription="carousel" aria-label="Banner utama">
    <div class="fm-hero__slides">
        @foreach ($h['slides'] as $i => $s)
            <article class="fm-hero__slide {{ $i === 0 ? 'is-active' : '' }}" data-fm-slide aria-roledescription="slide"
                     aria-label="{{ $i + 1 }} dari {{ $total }}" @if ($i) aria-hidden="true" @endif
                     style="--pos: {{ $s['pos'] }}; --zoom: {{ $s['zoom'] }}">
                <div class="fm-hero__media">
                    <img src="{{ $img($s['image']) }}" alt="Ruang tamu hangat dengan sofa linen dan furniture kayu WoodenLane"
                         @if ($i) loading="lazy" @endif decoding="async" @if (!$i) fetchpriority="high" @endif>
                </div>
                <div class="fm-container fm-hero__content">
                    <p class="fm-hero__eyebrow">{{ $s['eyebrow'] }}</p>
                    @if ($i === 0)<h1 class="fm-hero__title">{!! $s['title'] !!}</h1>@else<h2 class="fm-hero__title">{!! $s['title'] !!}</h2>@endif
                    <p class="fm-hero__text">{{ $s['text'] }}</p>
                    <div class="fm-hero__actions">
                        <a class="fm-btn fm-btn--dark fm-btn--lg" href="{{ $route($s['cta'][1]) }}">{{ $s['cta'][0] }}
                            <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        @if ($s['video'])
                            <button type="button" class="fm-hero__video" data-fm-video-open>
                                <span class="fm-hero__play"><svg class="fm-i" aria-hidden="true"><use href="#i-play"/></svg></span>
                                <span>Tonton Video</span>
                            </button>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <p class="fm-hero__tagline" aria-hidden="true">{!! $h['tagline'] !!}<i></i></p>

    <div class="fm-container fm-hero__ctrl">
        <div class="fm-hero__dots" role="group" aria-label="Pilih slide">
            @foreach ($h['slides'] as $i => $s)
                <button type="button" class="{{ $i === 0 ? 'is-active' : '' }}" data-fm-dot="{{ $i }}" aria-label="Slide {{ $i + 1 }}" @if ($i === 0) aria-current="true" @endif>{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</button>
            @endforeach
        </div>
    </div>

    {{-- Modal video --}}
    <div class="fm-modal" data-fm-video-modal data-src="{{ $h['video_url'] ?? '' }}" hidden>
        <div class="fm-modal__backdrop" data-fm-modal-close></div>
        <div class="fm-modal__box fm-modal__box--video" role="dialog" aria-modal="true" aria-label="Video profil WoodenLane">
            <button type="button" class="fm-iconbtn fm-modal__x" data-fm-modal-close aria-label="Tutup video"><svg class="fm-i" aria-hidden="true"><use href="#i-x"/></svg></button>
            <div class="fm-video" data-fm-video-stage>
                <img src="{{ $img('hero-living.jpg') }}" alt="" loading="lazy">
                <p class="fm-video__note">Video profil {{ $cfg['brand']['name'] }} akan segera tersedia.</p>
            </div>
        </div>
    </div>
</section>

{{-- Strip keunggulan --}}
<section class="fm-features" aria-label="Keunggulan {{ $cfg['brand']['name'] }}">
    <div class="fm-container">
        <ul class="fm-features__list">
            @foreach ($h['features'] as $f)
                <li class="fm-features__item">
                    <span class="fm-features__ico"><svg class="fm-i" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                    <span><strong>{{ $f['title'] }}</strong><small>{{ $f['text'] }}</small></span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@unless ($preview)
    <section class="fm-section">
        <div class="fm-container">
            <header class="fm-sechead">
                <p class="fm-eyebrow">KEUNGGULAN KAMI</p>
                <h2 class="fm-h2">Mengapa memilih {{ $cfg['brand']['name'] }}</h2>
            </header>
            <ul class="fm-featgrid">
                @foreach ($h['features'] as $f)
                    <li class="fm-card fm-featcard" data-fm-reveal>
                        <span class="fm-features__ico fm-features__ico--lg"><svg class="fm-i" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                        <h3>{{ $f['title'] }}</h3>
                        <p class="fm-featcard__sub">{{ $f['text'] }}</p>
                        <p>{{ $f['detail'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @include($ns.'.partials.cta-band')
@endunless
