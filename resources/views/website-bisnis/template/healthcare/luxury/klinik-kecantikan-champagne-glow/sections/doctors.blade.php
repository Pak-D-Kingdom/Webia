{{--
    Doctors & Staff.  $full = false → preview beranda (kartu foto ringkas)
                      $full = true  → halaman Doctors (fokus + hari praktik + booking)
--}}
@php
    $full = $full ?? false;
    $dayNames = collect($c['schedule']['weekdays'])->mapWithKeys(fn ($d) => [$d[1] => $d[0]]);
@endphp

<section id="doctors" class="cg-section cg-doctors {{ $full ? 'cg-doctors--full' : 'cg-doctors--preview' }}" aria-labelledby="cg-doctors-title">
    @unless ($full)
        <header class="cg-sechead">
            <div>
                <h2 id="cg-doctors-title" class="cg-sechead__title">Our Doctors &amp; Staff</h2>
                <p class="cg-sechead__sub">Tim dokter dan tenaga profesional kami siap memberikan perawatan terbaik untuk Anda.</p>
            </div>
            <a class="cg-link" href="{{ route('glow.doctors') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="cg-doctors-title" class="cg-sr">Tim dokter dan staf {{ $c['brand']['name'] }}</h2>
    @endunless

    <div class="cg-grid {{ $full ? 'cg-grid--doctors-full' : 'cg-grid--doctors' }}">
        @foreach ($c['doctors'] as $d)
            <article class="cg-doctor" id="{{ $full ? $d['slug'] : 'dr-' . $d['slug'] }}">
                <a class="cg-doctor__photo" href="{{ route('glow.doctors') }}#{{ $d['slug'] }}" @unless ($full) tabindex="-1" aria-hidden="true" @endunless>
                    <img src="{{ $img }}/{{ $d['photo'] }}" alt="{{ $d['name'] }}" width="{{ $full ? 680 : 690 }}" height="{{ $full ? 435 : 435 }}" loading="lazy" decoding="async">
                </a>
                <div class="cg-doctor__body">
                    <div class="cg-doctor__id">
                        <h3 class="cg-doctor__name">{{ $d['name'] }}</h3>
                        <p class="cg-doctor__role">{{ $d['role'] }}</p>
                    </div>

                    @if ($full)
                        <ul class="cg-tags">
                            @foreach ($d['focus'] as $f)
                                <li>{{ $f }}</li>
                            @endforeach
                        </ul>
                        <p class="cg-doctor__days">
                            <i class="bi bi-calendar-check" aria-hidden="true"></i>
                            Praktik: {{ collect($d['days'])->sortBy(fn ($x) => $x === 0 ? 7 : $x)->map(fn ($x) => $dayNames[$x])->implode(', ') }}
                        </p>
                        <a class="cg-btn cg-btn--primary cg-btn--sm" href="{{ route('glow.appointment') }}?dokter={{ $d['slug'] }}">
                            Buat Janji <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    @else
                        <a class="cg-doctor__go" href="{{ route('glow.doctors') }}#{{ $d['slug'] }}" aria-label="Lihat profil {{ $d['name'] }}">
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</section>
