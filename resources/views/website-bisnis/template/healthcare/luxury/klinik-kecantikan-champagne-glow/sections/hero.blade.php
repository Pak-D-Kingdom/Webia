{{-- Hero beranda: teks, badge kepercayaan, model, kartu fasilitas --}}
<section class="cg-hero" id="home" aria-labelledby="cg-hero-title">
    <img class="cg-hero__leaf" src="{{ $img }}/hero-leaf-left.jpg" alt="" width="336" height="738" fetchpriority="low" decoding="async">
    <img class="cg-hero__bloom" src="{{ $img }}/hero-flower-right.jpg" alt="" width="252" height="738" loading="lazy" decoding="async">

    <div class="cg-container cg-hero__inner">
        <div class="cg-hero__copy">
            <p class="cg-hero__eyebrow">{{ $c['hero']['eyebrow'] }}</p>
            <h1 id="cg-hero-title" class="cg-hero__title">
                @foreach ($c['hero']['title_lines'] as $line)<span>{{ $line }}</span>@endforeach
            </h1>
            <p class="cg-hero__text">{{ $c['hero']['text'] }}</p>

            <ul class="cg-badges">
                @foreach ($c['hero']['badges'] as $b)
                    <li>
                        <i class="bi {{ $b['icon'] }}" aria-hidden="true"></i>
                        <span>{{ $b['label'] }}</span>
                    </li>
                @endforeach
            </ul>

            <a class="cg-btn cg-btn--primary" href="{{ route('glow.appointment') }}">
                Book Appointment <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </a>
        </div>

        <div class="cg-hero__model">
            <img src="{{ $img }}/hero-model.jpg" alt="Perawatan kulit wajah bersama {{ $c['brand']['name'] }}" width="1620" height="738" fetchpriority="high" decoding="async">
            <p class="cg-hero__script" aria-hidden="true">{{ $c['hero']['script'] }} <i class="bi bi-heart"></i></p>
        </div>

        <aside class="cg-facility" aria-label="Fasilitas klinik">
            <img class="cg-facility__img" src="{{ $img }}/clinic-facility.jpg" alt="Ruang tunggu klinik modern {{ $c['brand']['name'] }}" width="512" height="656" loading="lazy" decoding="async">
            <div class="cg-facility__body">
                <h2>{{ $c['hero']['facility']['title'] }}</h2>
                <p>{{ $c['hero']['facility']['text'] }}</p>
                <a class="cg-btn cg-btn--ghost cg-btn--sm" href="{{ route('glow.home') }}#location">
                    {{ $c['hero']['facility']['cta'] }} <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </aside>
    </div>
</section>
