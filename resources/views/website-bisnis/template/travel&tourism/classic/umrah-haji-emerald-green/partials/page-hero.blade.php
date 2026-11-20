<section class="uh-pagehero uh-pagehero--{{ $key }}" style="--uh-focus: {{ $uh['pages'][$key]['focus'] }}" data-uh-parallax>
    <div class="uh-pagehero__bg" aria-hidden="true">
        <img class="uh-pagehero__photo" src="{{ $img('hero-kaaba.jpg') }}" alt="" width="1890" height="834">
        <span class="uh-pagehero__shade"></span>
        <span class="uh-pagehero__pattern"></span>
        <i class="uh-spark uh-spark--1"></i>
        <i class="uh-spark uh-spark--2"></i>
        <i class="uh-spark uh-spark--3"></i>
        <i class="uh-spark uh-spark--4"></i>
        <i class="uh-dust uh-dust--1"></i>
        <i class="uh-dust uh-dust--2"></i>
        <i class="uh-dust uh-dust--3"></i>
        <i class="uh-dust uh-dust--4"></i>
        @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.birds')
        <span class="uh-pagehero__flight">
            <span class="uh-pagehero__trail"></span>
            <svg class="uh-i" viewBox="0 0 24 24"><use href="#i-plane"/></svg>
        </span>
    </div>

    <div class="uh-container uh-pagehero__inner">
        <div class="uh-pagehero__copy">
            <nav class="uh-crumbs" aria-label="Breadcrumb">
                <a href="{{ $url('home') }}">Beranda</a>
                <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-right"/></svg>
                <span aria-current="page">{{ $uh['pages'][$key]['title'] }}</span>
            </nav>

            <div class="uh-pagehero__head">
                <span class="uh-pagehero__icon" aria-hidden="true">
                    <svg class="uh-i"><use href="#i-{{ $uh['pages'][$key]['icon'] }}"/></svg>
                </span>
                <div>
                    <p class="uh-pagehero__eyebrow">{{ $uh['brand']['name'] }}</p>
                    <h1 class="uh-pagehero__title" data-uh-words>{{ $uh['pages'][$key]['title'] }}</h1>
                </div>
            </div>
            <span class="uh-pagehero__rule" aria-hidden="true"><i></i></span>
            <p class="uh-pagehero__text">{{ $uh['pages'][$key]['text'] }}</p>

            <ul class="uh-pagehero__chips">
                @foreach ($uh['pages'][$key]['chips'] as $n => $chip)
                    <li style="--i: {{ $n }}"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $chip[0] }}"/></svg>{{ $chip[1] }}</li>
                @endforeach
            </ul>
        </div>

        <div class="uh-pagehero__art" aria-hidden="true">
            <span class="uh-pagehero__orbit"><i></i><i></i><i></i></span>
            <div class="uh-pagehero__arch">
                <div class="uh-pagehero__window">
                    <img src="{{ $img('hero-kaaba.jpg') }}" alt="" width="1890" height="834" loading="lazy">
                </div>
            </div>
            <img class="uh-pagehero__lantern" src="{{ $img('lentera.png') }}" alt="" width="57" height="165">
            <span class="uh-pagehero__crescent"></span>
        </div>
    </div>
    <span class="uh-pagehero__edge" aria-hidden="true"></span>
</section>
