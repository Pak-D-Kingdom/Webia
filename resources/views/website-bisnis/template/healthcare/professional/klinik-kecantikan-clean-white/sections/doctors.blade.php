{{--
    Dokter & Staff
    $full = false → preview beranda (4 kartu + intro)
    $full = true  → halaman Dokter & Staff (kartu detail)
--}}
@php $full = $full ?? false; @endphp

@if (! $full)
    <section class="gl-section gl-doctors" id="dokter" aria-labelledby="gl-doctors-title">
        <div class="gl-container gl-split">
            <div class="gl-split__intro">
                <p class="gl-eyebrow">Dokter & Staff</p>
                <h2 class="gl-title" id="gl-doctors-title">Tim Profesional Kami</h2>
                <p class="gl-lead">Didukung oleh dokter spesialis dan tim terlatih yang siap memberikan pelayanan terbaik untuk Anda.</p>
                <a class="gl-btn gl-btn--outline" href="{{ route('klinik-kecantikan.doctors') }}">
                    Lihat Semua Dokter
                    <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-arrow-right"/></svg>
                </a>
            </div>

            <ul class="gl-cards gl-cards--doctors">
                @foreach ($clinic['doctors'] as $d)
                    <li>
                        <a class="gl-card gl-doctor" href="{{ route('klinik-kecantikan.doctors') }}#{{ $d['id'] }}">
                            <span class="gl-doctor__photo"><img src="{{ $img($d['photo']) }}" alt="Foto {{ $d['name'] }}" width="177" height="120" loading="lazy" decoding="async"></span>
                            <h3 class="gl-doctor__name">{{ $d['name'] }}</h3>
                            <p class="gl-doctor__role">{{ $d['role'] }}</p>
                            <span class="gl-badge">
                                <svg class="gl-ic gl-ic--xs" aria-hidden="true"><use href="#gl-i-badge-check"/></svg>
                                {{ $d['badge'] }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@else
    <section class="gl-section gl-doctors gl-doctors--full" aria-label="Daftar dokter dan staff">
        <div class="gl-container">
            <ul class="gl-grid gl-grid--2">
                @foreach ($clinic['doctors'] as $d)
                    <li>
                        <article class="gl-card gl-doctor-full" id="{{ $d['id'] }}">
                            <span class="gl-doctor-full__photo"><img src="{{ $img($d['photo']) }}" alt="Foto {{ $d['name'] }}" width="240" height="163" loading="lazy" decoding="async"></span>
                            <div class="gl-doctor-full__body">
                                <span class="gl-badge">
                                    <svg class="gl-ic gl-ic--xs" aria-hidden="true"><use href="#gl-i-badge-check"/></svg>
                                    {{ $d['badge'] }}
                                </span>
                                <h2 class="gl-card__title">{{ $d['name'] }}</h2>
                                <p class="gl-doctor__role">{{ $d['role'] }}</p>
                                <p class="gl-card__text">{{ $d['bio'] }}</p>
                                <ul class="gl-tags">
                                    @foreach ($d['focus'] as $f)<li>{{ $f }}</li>@endforeach
                                </ul>
                                <dl class="gl-meta">
                                    <div><dt>Pengalaman</dt><dd>{{ $d['experience'] }}</dd></div>
                                    <div><dt>Praktik</dt><dd>{{ $d['days'] }}</dd></div>
                                </dl>
                                <div class="gl-actions">
                                    <a class="gl-btn gl-btn--primary gl-btn--sm" href="{{ route('klinik-kecantikan.appointment', ['dokter' => $d['id']]) }}">Booking</a>
                                    <a class="gl-btn gl-btn--outline gl-btn--sm" href="{{ route('klinik-kecantikan.schedule') }}">Lihat Jadwal</a>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
