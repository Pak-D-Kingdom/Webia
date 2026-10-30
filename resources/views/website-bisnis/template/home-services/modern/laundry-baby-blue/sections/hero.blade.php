@php $h = $laundry['hero']; @endphp
<section class="lb-hero" aria-labelledby="lb-hero-title">
    <div class="lb-hero__decor" aria-hidden="true">
        <svg class="lb-leaf lb-leaf--1" viewBox="0 0 120 220"><path d="M60 215C58 150 50 90 20 20" fill="none" stroke="#6faa63" stroke-width="3" stroke-linecap="round"/><g fill="#8fc67f"><path d="M24 30c-18 4-24 20-22 36 16-2 26-14 22-36z"/><path d="M34 62c18-8 32-2 40 12-18 8-34 4-40-12z"/><path d="M28 100c-18 0-30 12-30 28 18 2 30-8 30-28z"/><path d="M42 132c18-6 34 2 40 16-18 6-34 2-40-16z"/><path d="M52 170c-14 2-22 12-22 24 14 0 22-8 22-24z"/></g></svg>
        <span class="lb-bubble lb-bubble--a"></span><span class="lb-bubble lb-bubble--b"></span><span class="lb-bubble lb-bubble--c"></span>
    </div>

    {{-- Desktop lebar (>=1400px): latar penuh persis desain, teks tetap HTML --}}
    <img class="lb-hero__bg" src="{{ asset($laundry['assets']['img'] . '/hero-bg.webp') }}" width="3072" height="532" alt="" aria-hidden="true" fetchpriority="high" decoding="async">

    {{-- Layar lebih kecil: gambar adegan di kanan / bawah --}}
    <div class="lb-hero__art">
        <img class="lb-hero__scene" src="{{ asset($laundry['assets']['img'] . '/hero-scene.webp') }}" width="1896" height="530" fetchpriority="high" decoding="async"
             alt="Petugas BlueLaundry yang ceria membawa tumpukan handuk bersih di samping mesin cuci">
    </div>
    <p class="lb-hero__script" aria-hidden="true">
        @foreach ($h['script'] as $line)<span>{{ $line }}</span>@endforeach
        <svg viewBox="0 0 120 26" fill="none"><path d="M4 20C34 6 74 4 116 8M30 24c30-8 56-10 84-9" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>
    </p>

    <div class="lb-container lb-hero__inner">
        <div class="lb-hero__copy">
            <p class="lb-hero__eyebrow">{{ $h['eyebrow'] }}</p>
            <h1 class="lb-hero__title" id="lb-hero-title">
                <span>{{ $h['title'][0] }}</span>
                <span>{{ $h['title'][1] }} <em class="lb-hero__em">{{ $h['title_em'] }}<svg viewBox="0 0 230 22" preserveAspectRatio="none" aria-hidden="true"><path d="M3 15C60 6 140 3 227 3" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"/></svg></em></span>
            </h1>
            <p class="lb-hero__text">{{ $h['text'] }}</p>
            <div class="lb-hero__cta">
                <a class="lb-btn lb-btn--primary lb-btn--lg" href="{{ route('webia.laundry-baby-blue.layanan') }}">Lihat Layanan <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="lb-btn lb-btn--outline lb-btn--lg" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}"><svg class="lb-i" aria-hidden="true"><use href="#i-cart"/></svg>Order Sekarang</a>
            </div>
        </div>
    </div>
</section>
