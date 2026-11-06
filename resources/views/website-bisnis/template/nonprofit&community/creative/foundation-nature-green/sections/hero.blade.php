{{-- Hero banner beranda --}}
<section class="fh-hero" aria-labelledby="fh-hero-title">
    <img class="fh-hero__leaves" src="{{ $img('hero-leaves.jpg') }}" alt="" aria-hidden="true" width="232" height="514">
    <div class="fh-hero__photo">
        <img src="{{ $img('hero-kids.jpg') }}" alt="Anak-anak tersenyum memegang bibit pohon di taman kota" width="1456" height="528" fetchpriority="high">
    </div>

    <p class="fh-hero__overlay fh-script" aria-hidden="true">
        <span>Untuk Dunia</span><span>yang Lebih Baik</span>
        {{ $icon('heart', 'fh-ic fh-hero__overlay-heart') }}
    </p>

    <span class="fh-drift fh-drift--1" aria-hidden="true">{{ $icon('leaf') }}</span>
    <span class="fh-drift fh-drift--2" aria-hidden="true">{{ $icon('leaf') }}</span>
    <span class="fh-drift fh-drift--3" aria-hidden="true">{{ $icon('leaf') }}</span>

    <div class="fh-wrap fh-hero__inner">
        <div class="fh-hero__copy">
            <p class="fh-script fh-hero__script">
                <span class="fh-spark" aria-hidden="true">{{ $icon('sparkle') }}</span>{{ $cfg['hero']['script'] }}<span class="fh-spark" aria-hidden="true">{{ $icon('sparkle') }}</span>
            </p>
            <h1 id="fh-hero-title">
                <span>{{ $cfg['hero']['title'] }}</span>
                <span>{{ $cfg['hero']['title_2'] }}</span>
                <svg class="fh-hero__doodle" viewBox="0 0 40 36" aria-hidden="true" focusable="false"><path d="M20 33S3 23 3 12C3 6 7 3 12 3c3.5 0 6 2 8 5 2-3 4.5-5 8-5 5 0 9 3 9 9 0 11-17 21-17 21Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </h1>
            <p class="fh-hero__text">{{ $cfg['hero']['text'] }}</p>
            <div class="fh-hero__cta">
                <a class="fh-btn fh-btn--dark" href="{{ $url('donasi') }}"><span class="fh-btn__heart">{{ $icon('heart', 'fh-ic fh-ic--gold') }}</span>{{ $cfg['hero']['cta'] }} {{ $icon('arrow') }}</a>
                <a class="fh-link-play" href="{{ $url('tentang-kami') }}">{{ $cfg['hero']['cta_2'] }} {{ $icon('play') }}</a>
            </div>
        </div>
    </div>
</section>
