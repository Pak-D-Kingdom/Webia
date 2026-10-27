{{--
    Layanan
    $full = false → preview beranda (6 kartu ringkas + intro)
    $full = true  → halaman Layanan (kartu detail)
--}}
@php $full = $full ?? false; @endphp

@if (! $full)
    <section class="gl-section gl-services" id="layanan" aria-labelledby="gl-services-title">
        <div class="gl-container gl-split">
            <div class="gl-split__intro">
                <p class="gl-eyebrow">Layanan Kami</p>
                <h2 class="gl-title" id="gl-services-title">Perawatan Terbaik untuk Kecantikan Anda</h2>
                <p class="gl-lead">Kami menyediakan berbagai layanan perawatan kulit dan aesthetic dengan standar keamanan tinggi.</p>
                <a class="gl-btn gl-btn--primary" href="{{ route('klinik-kecantikan.services') }}">
                    Lihat Semua Layanan
                    <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-arrow-right"/></svg>
                </a>
            </div>

            <ul class="gl-cards gl-cards--services">
                @foreach ($clinic['services'] as $s)
                    <li>
                        <a class="gl-card gl-service" href="{{ route('klinik-kecantikan.services') }}#{{ $s['slug'] }}">
                            <img class="gl-service__icon" src="{{ $img($s['image']) }}" alt="" width="64" height="64" loading="lazy" decoding="async">
                            <h3 class="gl-service__name">{{ $s['name'] }}</h3>
                            <p class="gl-service__short">{{ $s['short'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@else
    <section class="gl-section gl-services gl-services--full" aria-label="Daftar layanan">
        <div class="gl-container">
            <ul class="gl-grid gl-grid--3">
                @foreach ($clinic['services'] as $s)
                    <li>
                        <article class="gl-card gl-service-full" id="{{ $s['slug'] }}">
                            <header class="gl-service-full__head">
                                <img src="{{ $img($s['image']) }}" alt="" width="64" height="64" loading="lazy" decoding="async">
                                <div>
                                    <h2 class="gl-card__title">{{ $s['name'] }}</h2>
                                    <p class="gl-service-full__short">{{ $s['short'] }}</p>
                                </div>
                            </header>
                            <p class="gl-card__text">{{ $s['desc'] }}</p>
                            <ul class="gl-checklist">
                                @foreach ($s['treatments'] as $t)
                                    <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-check"/></svg>{{ $t }}</li>
                                @endforeach
                            </ul>
                            <dl class="gl-meta">
                                <div><dt>Harga</dt><dd>{{ $s['price'] }}</dd></div>
                                <div><dt>Durasi</dt><dd>{{ $s['duration'] }}</dd></div>
                            </dl>
                            <a class="gl-btn gl-btn--primary gl-btn--block" href="{{ route('klinik-kecantikan.appointment', ['layanan' => $s['slug']]) }}">
                                Booking Layanan Ini
                            </a>
                        </article>
                    </li>
                @endforeach
            </ul>
            <p class="gl-note">Harga bersifat perkiraan dan dapat berubah. Dokter akan menentukan perawatan setelah konsultasi.</p>
        </div>
    </section>
@endif
