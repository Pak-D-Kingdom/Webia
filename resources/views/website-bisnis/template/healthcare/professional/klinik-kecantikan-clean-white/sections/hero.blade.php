{{-- Hero beranda --}}
@php $h = $clinic['hero']; @endphp
<section class="gl-hero" aria-labelledby="gl-hero-title">
    <div class="gl-container gl-hero__inner">
        <div class="gl-hero__content">
            <p class="gl-eyebrow">{{ $h['eyebrow'] }}</p>
            <h1 class="gl-hero__title" id="gl-hero-title">
                @foreach ($h['title'] as $line){{ $line }}@if (! $loop->last)<br>@endif @endforeach
            </h1>
            <p class="gl-hero__text">{{ $h['text'] }}</p>

            <div class="gl-hero__actions">
                <a class="gl-btn gl-btn--primary gl-btn--lg" href="{{ route('klinik-kecantikan.appointment') }}">
                    <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-calendar"/></svg>
                    Booking Appointment
                </a>
                <a class="gl-btn gl-btn--ghost gl-btn--lg" href="{{ route('klinik-kecantikan.services') }}">
                    Pelajari Layanan
                    <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-play"/></svg>
                </a>
            </div>

            <ul class="gl-trust">
                @foreach ($h['trust'] as $t)
                    <li>
                        <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $t['icon'] }}"/></svg>
                        <span>{{ $t['label'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="gl-hero__visual">
            <img src="{{ $img($h['image']) }}" alt="{{ $h['alt'] }}" width="1580" height="572" fetchpriority="high" decoding="async">
        </div>
    </div>
</section>
