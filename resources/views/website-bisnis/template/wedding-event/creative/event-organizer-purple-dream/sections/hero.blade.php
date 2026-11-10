<section class="eo-hero" id="beranda" aria-labelledby="eo-hero-title">
    <div class="eo-hero__bg" aria-hidden="true">
        <img class="eo-hero__photo" src="{{ asset($eo['assets']['img']) }}/hero-venue.jpg" alt="" width="1800" height="1000" fetchpriority="high">
        <span class="eo-hero__shade"></span>
        <span class="eo-hero__beam eo-hero__beam--a"></span>
        <span class="eo-hero__beam eo-hero__beam--b"></span>
        <span class="eo-hero__dust" data-eo-dust></span>
        <i class="eo-hero__spark" style="--x: 41%; --y: 22%; --s: 14px; --d: 0s" aria-hidden="true"></i>
        <i class="eo-hero__spark" style="--x: 57%; --y: 66%; --s: 10px; --d: 1.1s" aria-hidden="true"></i>
        <i class="eo-hero__spark" style="--x: 71%; --y: 18%; --s: 12px; --d: 2s" aria-hidden="true"></i>
        <i class="eo-hero__spark" style="--x: 84%; --y: 58%; --s: 16px; --d: 0.6s" aria-hidden="true"></i>
        <i class="eo-hero__spark" style="--x: 27%; --y: 78%; --s: 9px; --d: 1.6s" aria-hidden="true"></i>
    </div>
    <img class="eo-hero__flora" src="{{ asset($eo['assets']['img']) }}/flora-hero.svg" alt="" aria-hidden="true">

    <div class="eo-container eo-hero__inner">
        <div class="eo-hero__copy">
            <p class="eo-hero__eyebrow">{{ $eo['hero']['eyebrow'] }}</p>
            <h1 class="eo-hero__title" id="eo-hero-title">
                <span class="eo-line"><span>{{ $eo['hero']['line1'] }}</span></span>
                <span class="eo-line"><span>{{ $eo['hero']['line2'] }} <em class="eo-grad">{{ $eo['hero']['accent'] }}</em></span></span>
            </h1>
            <p class="eo-hero__text">{!! $eo['hero']['text'] !!}</p>
            <div class="eo-hero__cta">
                <a class="eo-btn eo-btn--lilac" href="{{ url($eo['base'].'/layanan') }}">{{ $eo['hero']['cta1'] }} <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="eo-btn eo-btn--ghost" href="{{ url($eo['base'].'/portofolio') }}"><span class="eo-btn__play"><svg class="eo-i" aria-hidden="true"><use href="#i-play"/></svg></span>{{ $eo['hero']['cta2'] }}</a>
            </div>
        </div>

        @include($eo['view'].'sections.assistant-card')
    </div>

    <svg class="eo-hero__wave" viewBox="0 0 1440 70" preserveAspectRatio="none" aria-hidden="true"><path d="M0 70V38C170 78 380 62 620 40S1010 8 1180 36s190 6 260-20v54Z"/></svg>
</section>
