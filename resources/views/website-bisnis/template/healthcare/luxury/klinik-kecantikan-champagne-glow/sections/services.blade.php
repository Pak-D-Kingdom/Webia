{{--
    Services.  $full = false → preview beranda (6 kartu ringkas)
               $full = true  → halaman Services (detail + tombol booking)
--}}
@php $full = $full ?? false; @endphp

<section id="services" class="cg-section cg-services {{ $full ? 'cg-services--full' : 'cg-services--preview' }}" aria-labelledby="cg-services-title">
    @unless ($full)
        <header class="cg-sechead">
            <div>
                <h2 id="cg-services-title" class="cg-sechead__title">Our Services</h2>
                <p class="cg-sechead__sub">Solusi perawatan kecantikan lengkap untuk kulit yang lebih sehat dan bercahaya.</p>
            </div>
            <a class="cg-link" href="{{ route('glow.services') }}">Lihat Semua Layanan <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="cg-services-title" class="cg-sr">Daftar layanan {{ $c['brand']['name'] }}</h2>
    @endunless

    <div class="cg-grid {{ $full ? 'cg-grid--services-full' : 'cg-grid--services' }}">
        @foreach ($c['services'] as $s)
            <article class="cg-service" id="{{ $full ? $s['slug'] : 'svc-' . $s['slug'] }}">
                <span class="cg-service__icon" aria-hidden="true">
                    <svg><use href="#{{ $s['icon'] }}"/></svg>
                </span>
                <h3 class="cg-service__title">{{ $s['title'] }}</h3>

                @if ($full)
                    <p class="cg-service__desc">{{ $s['long'] }}</p>
                    <ul class="cg-checklist">
                        @foreach ($s['items'] as $item)
                            <li><i class="bi bi-check2-circle" aria-hidden="true"></i> {{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="cg-service__meta"><i class="bi bi-clock" aria-hidden="true"></i> Estimasi {{ $s['duration'] }}</p>
                    <a class="cg-btn cg-btn--primary cg-btn--sm" href="{{ route('glow.appointment') }}?layanan={{ $s['slug'] }}">
                        Booking Layanan <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                @else
                    <p class="cg-service__desc">{{ $s['short'] }}</p>
                    <a class="cg-service__more" href="{{ route('glow.services') }}#{{ $s['slug'] }}">
                        Selengkapnya <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                @endif
            </article>
        @endforeach
    </div>
</section>
