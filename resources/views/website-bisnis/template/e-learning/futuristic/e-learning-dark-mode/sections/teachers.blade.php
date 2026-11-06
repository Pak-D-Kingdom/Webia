@php($r = $e['route'])
@php($full = $full ?? false)
@php($progBy = collect($e['programs'])->keyBy('slug'))
<section @class(['nl-sec nl-sec--teachers', 'nl-card' => ! $full]) id="teachers" aria-labelledby="teachers-title">
    @if(! $full)
        <div class="nl-head">
            <h2 id="teachers-title">Teacher Terbaik</h2>
            <a class="nl-link" href="{{ route($r.'teachers') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>

        <ul class="nl-teachers">
            @foreach($e['teachers'] as $key => $t)
                <li>
                    <a class="nl-teacher" href="{{ route($r.'teachers') }}#teacher-{{ $key }}">
                        <span class="nl-teacher__photo"><img src="{{ asset($e['img'].'/'.$t['img']) }}" alt="Foto {{ $t['name'] }}" loading="lazy" width="96" height="96"></span>
                        <span class="nl-teacher__info">
                            <strong>{{ $t['name'] }}</strong>
                            <small>{{ $t['role'] }}</small>
                            <span class="nl-rate" aria-label="Rating {{ $t['rating'] }} dari {{ $t['reviews'] }} ulasan"><svg class="ic"><use href="#i-star"/></svg>{{ $t['rating'] }} <em>({{ $t['reviews'] }})</em></span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <h2 class="nl-sr" id="teachers-title">Daftar pengajar</h2>
        <div class="nl-tcards">
            @foreach($e['teachers'] as $key => $t)
                <article class="nl-tcard" id="teacher-{{ $key }}" aria-labelledby="tname-{{ $key }}">
                    <header class="nl-tcard__head">
                        <span class="nl-teacher__photo"><img src="{{ asset($e['img'].'/'.$t['img']) }}" alt="Foto {{ $t['name'] }}" loading="lazy" width="96" height="96"></span>
                        <div>
                            <h3 id="tname-{{ $key }}">{{ $t['name'] }}</h3>
                            <p class="nl-tcard__role">{{ $t['role'] }}</p>
                            <span class="nl-rate" aria-label="Rating {{ $t['rating'] }} dari {{ $t['reviews'] }} ulasan"><svg class="ic"><use href="#i-star"/></svg>{{ $t['rating'] }} <em>({{ $t['reviews'] }} ulasan)</em></span>
                        </div>
                        <span class="nl-status nl-tcard__next"><i aria-hidden="true"></i>{{ $t['next'] }}</span>
                    </header>

                    <p class="nl-tcard__bio">{{ $t['bio'] }}</p>

                    <dl class="nl-tcard__stats">
                        <div><dt>Pengalaman</dt><dd>{{ $t['experience'] }}</dd></div>
                        <div><dt>Siswa</dt><dd>{{ $t['students'] }}</dd></div>
                        <div><dt>Kelas</dt><dd>{{ $t['classes'] }}</dd></div>
                    </dl>

                    <div class="nl-tcard__block">
                        <h4>Keahlian</h4>
                        <ul class="nl-tags">@foreach($t['skills'] as $sk)<li>{{ $sk }}</li>@endforeach</ul>
                    </div>

                    <div class="nl-tcard__block">
                        <h4>Program yang diampu</h4>
                        <ul class="nl-tcard__progs">
                            @foreach($t['programs'] as $slug)
                                @php($pg = $progBy[$slug])
                                <li>
                                    <a href="{{ route($r.'registration', ['program' => $slug]) }}">
                                        <span><strong>{{ $pg['title'] }}</strong><small>{{ $pg['level'] }} · {{ $pg['modules'] }} Modul · {{ $pg['hours'] }} Jam</small></span>
                                        <svg class="ic"><use href="#i-arrow"/></svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <footer class="nl-tcard__foot">
                        <a class="nl-btn nl-btn--ghost" href="{{ route($r.'schedules') }}"><svg class="ic"><use href="#i-calendar"/></svg>Lihat Jadwal</a>
                        <a class="nl-btn nl-btn--primary" href="{{ route($r.'registration', ['program' => $t['programs'][0]]) }}">Daftar Kelas <svg class="ic"><use href="#i-arrow"/></svg></a>
                    </footer>
                </article>
            @endforeach
        </div>
    @endif
</section>
