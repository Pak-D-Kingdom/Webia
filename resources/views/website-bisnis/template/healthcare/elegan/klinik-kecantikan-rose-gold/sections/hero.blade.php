{{-- Hero beranda: teks + foto + panel layanan --}}
@php $h = $c['hero']; @endphp
<section class="rg-hero" id="beranda" aria-labelledby="rgHeroTitle">
    <div class="rg-hero__media">
        <img src="{{ asset($c['images_dir'] . '/hero.jpg') }}" alt="{{ $h['image_alt'] }}" width="1908" height="822" fetchpriority="high">
    </div>

    <div class="rg-container rg-hero__inner">
        <div class="rg-hero__copy">
            <p class="rg-eyebrow">{{ $h['eyebrow'] }}</p>
            <h1 id="rgHeroTitle" class="rg-hero__title">{{ $h['title'] }}</h1>
            <p class="rg-hero__text">{{ $h['text'] }}</p>

            <div class="rg-hero__actions">
                <a class="rg-btn rg-btn--primary rg-btn--lg" href="{{ route($rp . 'appointment') }}">
                    <i class="bi bi-calendar2-check" aria-hidden="true"></i>Booking Appointment
                </a>
                <a class="rg-btn rg-btn--outline rg-btn--lg" href="{{ route($rp . 'services') }}">
                    Jelajahi Layanan <i class="bi bi-caret-right-fill" aria-hidden="true"></i>
                </a>
            </div>

            <ul class="rg-trust">
                @foreach ($h['trust'] as $t)
                    <li><i class="bi {{ $t['icon'] }}" aria-hidden="true"></i><span>{{ $t['label'] }}</span></li>
                @endforeach
            </ul>
        </div>

        <aside class="rg-hero__panel" aria-label="Kategori layanan">
            <ul>
                @foreach ($h['panel'] as $p)
                    <li>
                        <span class="rg-hero__picon"><i class="bi {{ $p['icon'] }}" aria-hidden="true"></i></span>
                        <span class="rg-hero__ptext">{{ $p['title'] }}<br>{{ $p['sub'] }}</span>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</section>
